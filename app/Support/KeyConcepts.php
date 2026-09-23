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
            4 => [
                'module' => 4,
                'title' => 'Key Concepts: Operability',
                'concepts' => [
                    [
                        'slug' => 'everything-interactive-needs-a-keyboard-path',
                        'title' => 'Everything Interactive Needs a Keyboard Path',
                        'summary' => 'If you can do it with a mouse, there should be a keyboard-accessible way to do the same thing.',
                        'examples' => [
                            'Links, buttons, menus, form controls, and custom interactive widgets all need a way to complete their task without a mouse.',
                        ],
                        'quick_test' => 'Put the mouse away. Can you still complete the task?',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 2.1.1 Keyboard',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/keyboard.html',
                                'description' => 'Functionality should be operable through a keyboard interface where applicable.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'focus-has-to-be-visible',
                        'title' => 'Focus Has to Be Visible',
                        'summary' => 'Keyboard users need to know where they are before they can act.',
                        'examples' => [
                            'A clear outline or other effective change shows the element currently receiving keyboard input. A control can have focus and still be impossible to see.',
                            'Removing the browser focus outline without providing an effective replacement creates a problem.',
                        ],
                        'quick_test' => 'When you press Tab, can you always tell where you landed?',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 2.4.7 Focus Visible',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/focus-visible.html',
                                'description' => 'Keyboard-operable user interfaces need a visible focus indicator.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'focus-order-should-follow-the-experience',
                        'title' => 'Focus Order Should Follow the Experience',
                        'summary' => 'Keyboard focus should move through the interface in an order that preserves meaning and usability.',
                        'examples' => [
                            'Normal keyboard navigation generally follows document and DOM order. A visual layout that says one thing while focus jumps around says another.',
                            '`tabindex="0"` places an element in the normal sequential focus order according to its document position. `tabindex="-1"` removes it from normal Tab navigation but still allows programmatic focus. Positive values such as `tabindex="1"` or `tabindex="5"` create a custom order and should generally be avoided.',
                        ],
                        'quick_test' => 'Fix the document order before you fix the tab order.',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 2.4.3 Focus Order',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/focus-order.html',
                                'description' => 'Focus order should preserve meaning and operability as users move through the content.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'focusable-does-not-mean-usable',
                        'title' => 'Focusable Does Not Mean Usable',
                        'summary' => 'Adding `tabindex="0"` does not turn a generic element into a button.',
                        'examples' => [
                            'A `div` with a click handler might work with a mouse. Adding `tabindex="0"` may allow keyboard focus to reach it, but it does not automatically provide expected activation behavior.',
                            'A native `button` already supports the interaction behavior users expect. Start with the native control when it fits the task.',
                        ],
                        'quick_test' => 'Can you focus it, activate it, and continue the task using the expected keys?',
                        'emphasis' => 'Native controls already know how to behave.',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 2.1.1 Keyboard',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/keyboard.html',
                                'description' => 'Keyboard access applies to functionality, not only to whether an element can receive focus.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'you-have-to-be-able-to-get-back-out',
                        'title' => 'You Have to Be Able to Get Back Out',
                        'summary' => 'If keyboard focus can enter an interaction, keyboard users need a predictable way to leave it.',
                        'examples' => [
                            'Dialogs, custom widgets, and embedded interactions can become traps if keyboard focus cannot leave normally or the user is not told how to leave.',
                        ],
                        'quick_test' => 'Tab into it. Use it. Can you keep going?',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 2.1.2 No Keyboard Trap',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/no-keyboard-trap.html',
                                'description' => 'Users need a way to move focus away from every component using only the keyboard.',
                            ],
                        ],
                    ],
                    [
                        'slug' => 'do-not-require-one-particular-input-method',
                        'title' => 'Do Not Require One Particular Input Method',
                        'summary' => 'Dragging, hovering, swiping, and precise pointing should not be the only route to success.',
                        'examples' => [
                            'Drag and drop with no Move Up or Move Down alternative.',
                            'Important controls visible only on hover.',
                            'Swipe-only navigation and very small or tightly packed targets.',
                            'Interactions that require precise pointer movement when a simpler method could work.',
                        ],
                        'quick_test' => 'What other input method could complete the same task?',
                        'references' => [
                            [
                                'label' => 'Understanding WCAG 2.2: 2.5.1 Pointer Gestures',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/pointer-gestures.html',
                                'description' => 'Pointer gesture functionality should have a simpler single-pointer alternative unless the gesture is essential.',
                            ],
                            [
                                'label' => 'Understanding WCAG 2.2: 2.5.7 Dragging Movements',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/dragging-movements.html',
                                'description' => 'Dragging functionality should have an alternative pointer method unless dragging is essential.',
                            ],
                            [
                                'label' => 'Understanding WCAG 2.2: 2.5.8 Target Size (Minimum)',
                                'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/target-size-minimum.html',
                                'description' => 'Targets should be large enough or spaced well enough to operate reliably, subject to the criterion exceptions.',
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
