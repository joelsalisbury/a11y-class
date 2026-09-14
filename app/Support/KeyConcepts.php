<?php

namespace App\Support;

class KeyConcepts
{
    /**
     * Canonical course content for key-concept teaching sequences.
     */
    public static function collections(): array
    {
        return [
            3 => [
                'module' => 3,
                'title' => 'Key Concepts: Media Accessibility',
                'concepts' => [
                    [
                        'slug' => 'media-has-a-purpose',
                        'title' => 'Media Has a Purpose',
                        'summary' => 'The right accessible alternative depends on what the media contributes in context, not just on what it looks or sounds like.',
                        'references' => [
                            [
                                'label' => 'W3C Images Tutorial',
                                'href' => 'https://www.w3.org/WAI/tutorials/images/',
                                'description' => 'Practical guidance on choosing accessible alternatives based on the purpose and context of an image.',
                            ],
                            [
                                'label' => 'W3C Alt Decision Tree',
                                'href' => 'https://www.w3.org/WAI/tutorials/images/decision-tree/',
                                'description' => 'A decision aid for determining whether an image needs alternative text and what that alternative should communicate.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'not-every-image-needs-a-description',
                        'title' => 'Not Every Image Needs a Description',
                        'summary' => 'Some images communicate information or function. Others are decorative and should not create unnecessary noise for someone using assistive technology.',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 1.1.1 Non-text Content',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-content.html',
                                'description' => 'WCAG guidance on providing equivalent alternatives for non-text content, including the exception for pure decoration.',
                            ],
                            [
                                'label' => 'W3C Decorative Images Tutorial',
                                'href' => 'https://www.w3.org/WAI/tutorials/images/decorative/',
                                'description' => 'Practical guidance for images that do not add meaningful information to the page.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'describe-the-meaning-not-every-pixel',
                        'title' => 'Describe the Meaning, Not Every Pixel',
                        'summary' => 'Useful alternative text communicates the information or function that matters in context. It does not need to list every visible detail.',
                        'references' => [
                            [
                                'label' => 'W3C Informative Images Tutorial',
                                'href' => 'https://www.w3.org/WAI/tutorials/images/informative/',
                                'description' => 'Guidance for writing alternatives that convey the essential information represented by an image.',
                            ],
                            [
                                'label' => 'W3C Alt Decision Tree',
                                'href' => 'https://www.w3.org/WAI/tutorials/images/decision-tree/',
                                'description' => 'Use context and purpose to decide what the alternative should communicate.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'complex-visuals-need-an-equivalent',
                        'title' => 'Complex Visuals Need an Equivalent',
                        'summary' => 'Charts, diagrams, maps, and infographics may require the important takeaway, the data relationships, or a longer description instead of one short label.',
                        'references' => [
                            [
                                'label' => 'W3C Complex Images Tutorial',
                                'href' => 'https://www.w3.org/WAI/tutorials/images/complex/',
                                'description' => 'Guidance for graphs, charts, diagrams, maps, and other visuals that contain more information than can usually fit in a short text alternative.',
                            ],
                            [
                                'label' => 'Understanding WCAG 2.2: 1.1.1 Non-text Content',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-content.html',
                                'description' => "WCAG's requirement that non-text content have an alternative serving the equivalent purpose.",
                            ],
                        ],
                    ],
                    [
                        'slug' => 'audio-and-video-carry-different-information',
                        'title' => 'Audio and Video Carry Different Information',
                        'summary' => 'Captions, transcripts, and descriptions of meaningful visual information address different parts of the media experience.',
                        'references' => [
                            [
                                'label' => 'Making Audio and Video Media Accessible',
                                'href' => 'https://www.w3.org/WAI/media/av/',
                                'description' => 'W3C guidance for determining which accessibility features audio and video content needs.',
                            ],
                            [
                                'label' => 'Understanding WCAG 2.2: 1.2.2 Captions (Prerecorded)',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/captions-prerecorded',
                                'description' => 'Captions provide synchronized text for speech and meaningful non-speech audio in prerecorded synchronized media.',
                            ],
                            [
                                'label' => 'Understanding WCAG 2.2: 1.2.3 Audio Description or Media Alternative (Prerecorded)',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/audio-description-or-media-alternative-prerecorded',
                                'description' => 'Guidance on providing access to important visual information in prerecorded synchronized media.',
                            ],
                            [
                                'label' => 'Understanding WCAG 2.2: 1.2.5 Audio Description (Prerecorded)',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/audio-description-prerecorded.html',
                                'description' => 'Level AA guidance for providing spoken description of important visual content in prerecorded synchronized media.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public static function collection(int $module): array
    {
        $collection = static::collections()[$module] ?? null;

        abort_unless($collection !== null, 404);

        return $collection;
    }

    public static function concept(int $module, string $slug): array
    {
        $collection = static::collection($module);
        $concepts = $collection['concepts'];

        foreach ($concepts as $index => $concept) {
            if (($concept['slug'] ?? null) !== $slug) {
                continue;
            }

            return [
                'module' => $module,
                'collection' => $collection,
                'concept' => $concept,
                'index' => $index + 1,
                'total' => count($concepts),
                'previous' => $concepts[$index - 1] ?? null,
                'next' => $concepts[$index + 1] ?? null,
            ];
        }

        abort(404);
    }
}
