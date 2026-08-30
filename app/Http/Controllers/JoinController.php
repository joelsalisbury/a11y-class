<?php

namespace App\Http\Controllers;

use App\Models\TeamAssignment;
use App\Support\TeamAssigner;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\SvgWriter;
use Illuminate\Http\Request;

class JoinController extends Controller
{
    const COOKIE_NAME = 'course_team_token';

    /**
     * Anonymous student join flow: validates the classroom code, returns an
     * existing assignment for a known browser, or creates a new balanced one.
     */
    public function show(Request $request, string $code)
    {
        if (! config('course-join.open')) {
            return view('course.join.unavailable', ['reason' => 'closed']);
        }

        $configuredCode = (string) config('course-join.code');

        if ($configuredCode === '' || ! hash_equals($configuredCode, $code)) {
            return view('course.join.unavailable', ['reason' => 'invalid']);
        }

        $token = $request->cookie(self::COOKIE_NAME);

        $assignment = $token
            ? TeamAssignment::query()->where('token', $token)->first()
            : null;

        if (! $assignment) {
            $assignment = app(TeamAssigner::class)->assign();
        }

        if (! $assignment) {
            return view('course.join.unavailable', ['reason' => 'full']);
        }

        return response()
            ->view('course.join.reveal', ['team' => $assignment->team])
            ->cookie(cookie(
                name: self::COOKIE_NAME,
                value: $assignment->token,
                minutes: 60 * 24 * 180,
                path: '/',
                domain: null,
                secure: $request->secure(),
                httpOnly: true,
                sameSite: 'lax',
            ));
    }

    /**
     * Instructor-facing presentation page: shows only the join QR code and
     * classroom instructions, nothing administrative.
     */
    public function qr()
    {
        $configuredCode = (string) config('course-join.code');

        $joinUrl = $configuredCode !== ''
            ? route('join.show', ['code' => $configuredCode])
            : null;

        $qrSvg = $joinUrl
            ? (new Builder(
                writer: new SvgWriter,
                data: $joinUrl,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 480,
                margin: 16,
            ))->build()->getString()
            : null;

        return view('course.join.qr', ['qrSvg' => $qrSvg]);
    }
}
