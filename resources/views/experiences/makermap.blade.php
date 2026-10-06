<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MakerMap | Campus Creative Spaces</title>
        @vite(['resources/css/makermap.css', 'resources/js/makermap.js'])
    </head>
    <body class="makermap-page">
        <a class="maker-skip-link" href="#maker-main">Skip to main content</a>

        <header class="maker-header">
            <div class="maker-header-inner">
                <a class="maker-brand" href="#top" aria-label="MakerMap home">
                    <span class="maker-brand-mark" aria-hidden="true">M</span>
                    <span>MakerMap</span>
                </a>
                <nav class="maker-nav" aria-label="On this page">
                    <a href="#find-space">Find a Space</a>
                    <a href="#spaces">Spaces</a>
                    <a href="#compare">Compare</a>
                    <a href="#getting-there">Getting There</a>
                    <a href="#before-visit">Before You Visit</a>
                    <a href="#orientation">Orientation</a>
                </nav>
                <a class="maker-course-link" href="{{ route('modules.challenge', ['module' => 5]) }}">Return to Challenge 05</a>
            </div>
        </header>

        <main id="maker-main">
            <section class="maker-intro" id="top" aria-labelledby="maker-title">
                <div class="maker-intro-inner">
                    <p class="maker-eyebrow">Campus creative spaces</p>
                    <h1 id="maker-title">MakerMap</h1>
                    <p class="maker-intro-copy">Find the right campus creative space for your project.</p>
                    <p class="maker-intro-detail">Explore equipment, hours, availability, and visit requirements across four places to make, record, test, and prototype.</p>
                    <a class="maker-primary-link" href="#find-space">Find a space <span aria-hidden="true">↓</span></a>
                </div>
            </section>

            <div class="maker-content">
                <section class="maker-section" id="find-space" aria-labelledby="find-space-title">
                    <div class="maker-section-heading">
                        <p class="maker-eyebrow">Start with your project</p>
                        <h2 id="find-space-title">Find a Space</h2>
                        <p>Choose what you need. You can select more than one.</p>
                    </div>
                    <div class="maker-filter-row" role="group" aria-label="Filter spaces by capability or hours">
                        <span class="maker-filter-chip" role="button" aria-pressed="false" data-filter="printing">3D Printing</span>
                        <span class="maker-filter-chip" role="button" aria-pressed="false" data-filter="video">Video / Audio</span>
                        <span class="maker-filter-chip" role="button" aria-pressed="false" data-filter="laser">Laser Cutting</span>
                        <span class="maker-filter-chip" role="button" aria-pressed="false" data-filter="electronics">Electronics</span>
                        <span class="maker-filter-chip" role="button" aria-pressed="false" data-filter="textiles">Textiles</span>
                        <span class="maker-filter-chip" role="button" aria-pressed="false" data-filter="evenings">Open Evenings</span>
                    </div>
                    <p class="maker-filter-note" aria-live="polite">Showing all four creative spaces.</p>
                </section>

                <section class="maker-section" id="spaces" aria-label="Available Spaces">
                    <div class="maker-section-heading">
                        <p class="maker-eyebrow">Explore the studios</p>
                        <div class="maker-section-title" id="available-spaces-title">Available Spaces</div>
                        <p class="maker-availability-legend">
                            Current availability:
                            <span><i class="availability-dot availability-green" aria-hidden="true"></i>Available</span>
                            <span><i class="availability-dot availability-amber" aria-hidden="true"></i>Limited</span>
                            <span><i class="availability-dot availability-red" aria-hidden="true"></i>Busy</span>
                        </p>
                    </div>

                    <div class="maker-space-grid" id="space-results">
                        <article class="maker-space-card" data-space-card data-capabilities="printing laser evenings">
                            <div class="maker-card-topline">
                                <p class="maker-card-type">Build · prototype</p>
                                <span class="availability-dot availability-green" aria-hidden="true"></span>
                            </div>
                            <img class="maker-space-image" src="{{ asset('images/makermap-fabrication.svg') }}">
                            <h3>Digital Fabrication Lab</h3>
                            <p class="maker-location">Foundry Commons · Level 1</p>
                            <p class="maker-hours">Mon–Thu, 9 am–9 pm · Fri, 9 am–5 pm</p>
                            <p class="maker-description">Turn a digital model into a physical prototype with staff nearby for setup and material questions.</p>
                            <details class="maker-disclosure">
                                <summary>Equipment &amp; requirements</summary>
                                <div class="maker-disclosure-content">
                                    <div class="maker-fixed-height">
                                        <p><strong>Equipment</strong></p>
                                        <ul>
                                            <li>FDM and resin 3D printers</li>
                                            <li>Laser cutter and desktop CNC</li>
                                            <li>Hand tools and prototyping materials</li>
                                        </ul>
                                        <p><strong>Before you start</strong><br>Complete a general lab orientation. Bring a project file in STL, SVG, or DXF format.</p>
                                    </div>
                                    <p class="maker-hover-wrap"><strong>Laser cutter</strong><span class="maker-hover-note">Safety orientation certification required.</span></p>
                                </div>
                            </details>
                            <div class="maker-card-bottom">
                                <p class="maker-prerequisite">General lab orientation required</p>
                                <button class="maker-save" type="button" data-save-space="fabrication" aria-pressed="false">Save Digital Fabrication Lab</button>
                            </div>
                        </article>

                        <article class="maker-space-card" data-space-card data-capabilities="video evenings">
                            <div class="maker-card-topline">
                                <p class="maker-card-type">Record · edit</p>
                                <span class="availability-dot availability-amber" aria-hidden="true"></span>
                            </div>
                            <img class="maker-space-image" src="{{ asset('images/makermap-media-studio.svg') }}" alt="Lab photo">
                            <h3>Media Production Studio</h3>
                            <p class="maker-location">Northlight Center · Level 2</p>
                            <p class="maker-hours">Tue–Fri, 10 am–8 pm · Sat, 10 am–4 pm</p>
                            <p class="maker-description">A quiet, flexible room for recording interviews, producing short video, and finishing an edit.</p>
                            <details class="maker-disclosure">
                                <summary>Equipment &amp; requirements</summary>
                                <div class="maker-disclosure-content">
                                    <p><strong>Equipment</strong></p>
                                    <ul>
                                        <li>Two-camera video kit and tripods</li>
                                        <li>Podcast microphones and audio interface</li>
                                        <li>LED lighting, backdrop, and editing workstations</li>
                                    </ul>
                                    <p><strong>Before you start</strong><br>Book a short room orientation before your first independent recording session.</p>
                                </div>
                            </details>
                            <div class="maker-card-bottom">
                                <p class="maker-prerequisite">Room orientation required</p>
                                <button class="maker-save" type="button" data-save-space="media" aria-pressed="false">Save Media Production Studio</button>
                            </div>
                        </article>

                        <article class="maker-space-card" data-space-card data-capabilities="electronics evenings">
                            <div class="maker-card-topline">
                                <p class="maker-card-type">Wire · test</p>
                                <span class="availability-dot availability-red" aria-hidden="true"></span>
                            </div>
                            <img class="maker-space-image" src="{{ asset('images/makermap-electronics.svg') }}" alt="Electronics testing bench with a microcontroller, multimeter, and soldering station">
                            <h3>Electronics Workshop</h3>
                            <p class="maker-location">Signal House · Ground floor</p>
                            <p class="maker-hours">Mon–Fri, 11 am–10 pm</p>
                            <p class="maker-description">Build and troubleshoot interactive objects at a shared bench with common components close at hand.</p>
                            <button class="maker-disclosure-button" type="button" data-disclosure="electronics-details" aria-controls="electronics-details">
                                Equipment &amp; requirements <span aria-hidden="true"></span>
                            </button>
                            <div class="maker-disclosure-content" id="electronics-details" hidden>
                                <p><strong>Equipment</strong></p>
                                <ul>
                                    <li>Soldering stations with fume extraction</li>
                                    <li>Microcontroller kits and electronics benches</li>
                                    <li>Multimeters, oscilloscopes, and bench supplies</li>
                                </ul>
                                <p><strong>Before you start</strong><br>Complete the bench safety briefing. Staff can help you select a power supply for your project.</p>
                            </div>
                            <div class="maker-card-bottom">
                                <p class="maker-prerequisite">Bench safety briefing required</p>
                                <button class="maker-save" type="button" data-save-space="electronics" aria-pressed="false">Save Electronics Workshop</button>
                            </div>
                        </article>

                        <article class="maker-space-card" data-space-card data-capabilities="textiles">
                            <div class="maker-card-topline">
                                <p class="maker-card-type">Sew · shape</p>
                                <span class="availability-dot availability-green" aria-hidden="true"></span>
                            </div>
                            <h3>Textiles &amp; Prototyping Lab</h3>
                            <p class="maker-location">Willow Design House · Level 1</p>
                            <p class="maker-hours">Mon–Thu, 9 am–5 pm · Fri, 9 am–4 pm</p>
                            <p class="maker-description">Explore soft materials, wearable ideas, and fast physical mockups in a shared studio.</p>
                            <details class="maker-disclosure">
                                <summary>Equipment &amp; requirements</summary>
                                <div class="maker-disclosure-content">
                                    <p><strong>Equipment</strong></p>
                                    <ul>
                                        <li>Sewing and embroidery machines</li>
                                        <li>Vinyl cutter and heat press</li>
                                        <li>Dress forms, cutting mats, and soft goods</li>
                                    </ul>
                                    <p><strong>Before you start</strong><br>Attend the shared-studio orientation. Starter fabric and thread are available at the materials desk.</p>
                                </div>
                            </details>
                            <div class="maker-card-bottom">
                                <p class="maker-prerequisite">Shared-studio orientation required</p>
                                <button class="maker-save" type="button" data-save-space="textiles" aria-pressed="false">
                                    <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                        <path d="M6 4.75h12v15l-6-3.75-6 3.75z"></path>
                                    </svg>
                                </button>
                            </div>
                        </article>
                    </div>
                </section>

                <section class="maker-section" id="compare" aria-labelledby="compare-title">
                    <div class="maker-section-heading">
                        <p class="maker-eyebrow">At a glance</p>
                        <h2 id="compare-title">Compare Equipment</h2>
                        <p>Compare the kinds of tools and preparation each space offers.</p>
                    </div>
                    <div class="maker-table-wrap" role="region" aria-label="Equipment comparison table" tabindex="0">
                        <table class="maker-table">
                            <thead>
                                <tr>
                                    <th scope="col">Space</th>
                                    <th scope="col">3D Printing</th>
                                    <th scope="col">Laser Cutting</th>
                                    <th scope="col">Video / Audio</th>
                                    <th scope="col">Electronics</th>
                                    <th scope="col">Textiles</th>
                                    <th scope="col">Orientation Required</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Digital Fabrication Lab</th>
                                    <td>Yes</td><td>Yes</td><td>No</td><td>Basic</td><td>No</td><td>Yes</td>
                                </tr>
                                <tr>
                                    <th scope="row">Media Production Studio</th>
                                    <td>No</td><td>No</td><td>Yes</td><td>No</td><td>No</td><td>Yes</td>
                                </tr>
                                <tr>
                                    <th scope="row">Electronics Workshop</th>
                                    <td>No</td><td>No</td><td>No</td><td>Yes</td><td>No</td><td>Yes</td>
                                </tr>
                                <tr>
                                    <th scope="row">Textiles &amp; Prototyping Lab</th>
                                    <td>No</td><td>Vinyl</td><td>No</td><td>No</td><td>Yes</td><td>Yes</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="maker-section" id="getting-there" aria-labelledby="getting-there-title">
                    <div class="maker-section-heading">
                        <p class="maker-eyebrow">Plan your visit</p>
                        <h2 id="getting-there-title">Getting There</h2>
                        <p>Four studios sit along the central pedestrian route through the creative district.</p>
                    </div>
                    <figure class="maker-map-figure">
                        <img src="{{ asset('images/makermap-campus-map.svg') }}" alt="Campus makerspace map">
                        <figcaption>Campus Creative District · Visitor map</figcaption>
                    </figure>
                </section>

                <section class="maker-section" id="before-visit" aria-labelledby="before-visit-title">
                    <div class="maker-section-heading">
                        <p class="maker-eyebrow">A few things to know</p>
                        <h2 id="before-visit-title">Before You Visit</h2>
                        <p>Take a few minutes to get oriented before your first visit.</p>
                    </div>
                    <div class="maker-video-layout">
                        <div>
                            <h3>Featured video</h3>
                            <p>A short introduction to web accessibility and W3C standards.</p>
                            <video class="maker-video" controls preload="metadata" aria-label="Video Introduction to Web Accessibility and W3C Standards">
                                <source src="https://media.w3.org/wai/accessibility-intro/intro.mp4" type="video/mp4">
                                Your browser does not support the video element.
                            </video>
                            <p class="maker-video-attribution">Video: W3C Web Accessibility Initiative. Used with <a href="https://www.w3.org/WAI/videos/standards-and-benefits/" target="_blank" rel="noopener noreferrer">attribution</a>.</p>
                        </div>
                        <div class="maker-transcript">
                            <h3>W3C transcript with description of visuals</h3>
                            <div class="maker-transcript-scroll" role="region" aria-label="Video transcript" tabindex="0">
                                <table>
                                    <thead><tr><th scope="col">Spoken text</th><th scope="col">Description of visuals</th></tr></thead>
                                    <tbody>
                                        <tr><td>Hi! My name is Shadi Abou-Zahra. I'm the Accessibility Strategy and Technology Specialist at W3C, the World Wide Web Consortium, and today I'd like to tell you about web accessibility.</td><td>Web Accessibility; Shadi speaking.</td></tr>
                                        <tr><td>The Web is for many people an essential part of daily life. At work. At home. And on the road.</td><td>People in an Internet cafe; someone in an office using a computer; someone sitting on a sofa using a laptop; someone using a mobile phone while walking.</td></tr>
                                        <tr><td>Web accessibility means that people with disabilities can use the Web equally. For example, somebody who cannot use their arms, and uses a mouthstick to type. Or someone who cannot hear well, and uses captions to watch videos. Or someone who cannot see well, and uses a screen reader to read aloud what's on the screen.</td><td>Shadi speaking; someone using a mouthstick to type; someone using a hearing aid; someone using a screen reader.</td></tr>
                                        <tr><td>Accessibility has many benefits. For example, captions benefit anyone in a loud or in a quiet environment. And good color contrast works better when there is glare. Also people with age-related impairments, such as reduced dexterity, benefit. In fact, everyone has a better user experience with an improved layout and design.</td><td>Someone watching a video with captions in an office; someone looking at a mobile phone with glare on the screen; someone with tremors using a mouse with difficulty; two people smiling at a well-designed website.</td></tr>
                                        <tr><td>A lot of accessibility can be built into the underlying code of websites and applications. Web technologies from W3C, such as HTML, provide many accessibility features. For example, to provide textual descriptions for images, which are read aloud by screen readers and also used by search engines. Also headings, labels, and other code supports accessibility and improves the quality overall.</td><td>Shadi speaking; HTML code; example code for image descriptions, headings, and labels.</td></tr>
                                        <tr><td>Good authoring tools, such as wikis, content management systems, and code editors, help create accessible code, either automatically or with input from the author. Also web browsers, media players, and apps need to support accessibility features.</td><td>An authoring tool used to create web content; a web browser displaying web content.</td></tr>
                                        <tr><td>W3C provides standards to help make the Web accessible, which are internationally recognized by governments and businesses. Most well-known is the Web Content Accessibility Guidelines - WCAG. WCAG is also ISO 40500, and adopted in the European standard called EN 301 549. It is built around four core principles:</td><td>Shadi speaking; Web Content Accessibility Guidelines, WCAG, ISO 40500, and EN 301 549.</td></tr>
                                        <tr><td>First, Perceivable, for example, so people can see the content, or hear it. Operable, for example, so people can use the computer by typing, or by voice. Understandable, for example, so people get clear and simple language. And Robust, so people can use different assistive technologies.</td><td>Someone typing on a tablet and listening with headphones; someone speaking to a computer; two people looking at a dense website; someone using screen magnification.</td></tr>
                                        <tr><td>Besides WCAG, W3C also provides the Authoring Tool Accessibility Guidelines - ATAG, which defines requirements for content management systems, code editors, and other software. And the User Agent Accessibility Guidelines - UAAG, defines requirements for web browsers and media players.</td><td>Authoring Tool Accessibility Guidelines - ATAG; User Agent Accessibility Guidelines - UAAG.</td></tr>
                                        <tr><td>There are over one billion people with disabilities, or about 15-20% of the population. The UN Convention on the Rights of Persons with Disabilities defines that access to information, including the Web, is a human right. Most countries around the world have ratified this UN convention, and several have adopted binding policies too. Yet regardless of any laws and regulations, implementing the accessibility standards is essential for people with disabilities, and useful for all.</td><td>Shadi speaking.</td></tr>
                                        <tr><td>For more information on web accessibility, visit w3.org/WAI.</td><td>W3C Web Accessibility Initiative, w3.org/WAI.</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="maker-visitor-expectations">
                        <h3>General visitor expectations</h3>
                        <ul>
                            <li>Check in with the studio host when you arrive.</li>
                            <li>Use equipment only after the relevant orientation.</li>
                            <li>Keep shared work areas clear and return borrowed tools.</li>
                            <li>Ask a staff member before changing equipment settings.</li>
                        </ul>
                    </div>
                </section>

                <section class="maker-section" id="orientation" aria-labelledby="orientation-title">
                    <div class="maker-section-heading">
                        <p class="maker-eyebrow">Start with a conversation</p>
                        <h2 id="orientation-title">Request an Orientation</h2>
                        <p>Tell the studio team a little about your project and when you can visit.</p>
                    </div>
                    <form class="maker-form" id="orientation-form" novalidate onsubmit="return false;">
                        <p class="maker-form-note">This request is simulated. Your information stays in this browser.</p>
                        <div class="maker-error-summary" id="form-error-summary" tabindex="-1" hidden>
                            <h3>There was a problem with your request</h3>
                            <p>Please check the highlighted fields.</p>
                            <ul id="form-error-list"></ul>
                        </div>

                        <div class="maker-form-grid">
                            <div class="maker-field">
                                <label for="full-name">Full name <span>(required)</span></label>
                                <input id="full-name" name="fullName" type="text" autocomplete="name" required aria-describedby="full-name-error">
                                <p class="maker-field-error" id="full-name-error" hidden>Enter your full name.</p>
                            </div>
                            <div class="maker-field">
                                <label for="university-email">University email <span>(required)</span></label>
                                <input id="university-email" name="email" type="email" autocomplete="email" required aria-label="Username" aria-describedby="university-email-error">
                                <p class="maker-field-error" id="university-email-error" hidden>Enter a valid university email address.</p>
                            </div>
                        </div>

                        <div class="maker-field">
                            <input id="project-title" name="projectTitle" type="text" placeholder="Project title">
                        </div>

                        <fieldset class="maker-choice-group" id="preferred-space-group">
                            <legend>Preferred space <span>(required)</span></legend>
                            <p class="maker-field-error" id="preferred-space-error" hidden></p>
                            <div class="maker-radio-grid">
                                <label><input type="radio" name="preferredSpace" value="fabrication" required> Digital Fabrication Lab</label>
                                <label><input type="radio" name="preferredSpace" value="media" required> Media Production Studio</label>
                                <label><input type="radio" name="preferredSpace" value="electronics" required> Electronics Workshop</label>
                                <label><input type="radio" name="preferredSpace" value="textiles" required> Textiles &amp; Prototyping Lab</label>
                            </div>
                        </fieldset>

                        <div class="maker-choice-group" id="experience-group">
                            <p class="maker-group-question">Experience level <span>(required)</span></p>
                            <p class="maker-field-error" id="experience-error" hidden>Choose your experience level.</p>
                            <div class="maker-radio-grid maker-radio-grid-three">
                                <label><input id="experience-new" type="radio" name="experienceLevel" value="new" required aria-describedby="experience-error"> New to this equipment</label>
                                <label><input type="radio" name="experienceLevel" value="some" required aria-describedby="experience-error"> Some experience</label>
                                <label><input type="radio" name="experienceLevel" value="confident" required aria-describedby="experience-error"> Experienced</label>
                            </div>
                        </div>

                        <div class="maker-form-grid">
                            <div class="maker-field">
                                <label for="orientation-time">Preferred orientation time <span>(required)</span></label>
                                <select id="orientation-time" name="orientationTime" required aria-describedby="orientation-time-error">
                                    <option value="">Choose a time</option>
                                    <option value="weekday-morning">Weekday morning</option>
                                    <option value="weekday-afternoon">Weekday afternoon</option>
                                    <option value="weekday-evening">Weekday evening</option>
                                    <option value="weekend">Weekend</option>
                                </select>
                                <p class="maker-field-error" id="orientation-time-error" hidden>Select a preferred orientation time.</p>
                            </div>
                        </div>

                        <div class="maker-field">
                            <label for="accessibility-needs">Accessibility or accommodation needs</label>
                            <p id="accessibility-needs-help">Share only the details that would help the studio plan your visit. You can leave this blank.</p>
                            <textarea id="accessibility-needs" name="accessibilityNeeds" rows="4" aria-describedby="accessibility-needs-help"></textarea>
                        </div>

                        <div class="maker-form-actions">
                            <button class="maker-submit" type="submit">Submit request</button>
                            <button class="maker-reset" id="reset-maker-map" type="button">Reset MakerMap</button>
                        </div>
                        <p class="maker-success" id="form-success" hidden>Orientation request sent.</p>
                    </form>
                </section>
            </div>
        </main>

        <footer class="maker-footer" id="about">
            <div class="maker-footer-inner">
                <div>
                    <a class="maker-brand" href="#top">
                        <span class="maker-brand-mark" aria-hidden="true">M</span>
                        <span>MakerMap</span>
                    </a>
                    <p>Creative spaces for ideas in progress.</p>
                </div>
                <section aria-labelledby="about-maker-title">
                    <h2 id="about-maker-title">About MakerMap / Accessibility</h2>
                    <p>MakerMap helps students plan a visit to the campus creative district. Space details are maintained by the studio services team.</p>
                    <p class="maker-compliance-claim">MakerMap passed WAVE with no errors and meets WCAG 2.1 AA and Section 508 accessibility requirements.</p>
                </section>
                <div class="maker-footer-actions">
                    <a href="#orientation">Request an orientation</a>
                    <a href="{{ route('modules.challenge', ['module' => 5]) }}">Return to Challenge 05</a>
                </div>
            </div>
            <p class="maker-footer-copyright">Campus Creative Services · Student resource directory</p>
        </footer>
    </body>
</html>