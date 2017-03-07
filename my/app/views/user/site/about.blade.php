@extends('user/layout/default_layout')
@section('content')
<section class="best-sellers" style="min-height: 500px;">
    <div class="container" style="position: relative;">
        <div class="row" style="position: relative;">
            <div class="col-md-3" style="position: relative;">
                <ul id="nav" class="left-fix-menu">
                    <li><a href="javascript:void(0)" id="#about-us" class="about-us" data-url="aboutUs">About Us</a></li>
                    <li><a href="javascript:void(0)" id="#yolove-tool" class="yolove-tool" data-url="yoloveTool">Yolove Tool </a></li>
                    <li><a href="javascript:void(0)" id="#privacy" class="privacy" data-url="privacy">Privacy</a></li>
                    <li><a href="javascript:void(0)" id="#term-of-services" class="term-of-services" data-url="terms-n-conditions">Terms of Services</a></li>
                    <li><a href="javascript:void(0)" id="#contact" class="contact" data-url="contact">Contact</a></li>
                    <li><a href="javascript:void(0)" id="#customer" class="customer" data-url="customer">Customer Service Overview</a></li>
                    <li><a href="javascript:void(0)" id="#shipping" class="shipping" data-url="shipping">Shipping Info</a></li>
                    <li><a href="javascript:void(0)" id="#returns" class="returns" data-url="returns">Returns & Exchanges</a></li>
                </ul>
            </div>
            <div class="col-md-9" style="max-height: 600px;overflow: auto;">
                <div class="section" id="about-us">
                    <h1>About Us</h1>
                    <p>
                        Pinkals (Pin-kals”) is built by a group of young people who are passion in fashion. We started Pinkals in 2013 and we are all 
                        around the world and bring together all fashion stores, products and people into a simple platform.
                    </p>
                    <p>
                        In other words, Pinkals is an online community for all fashion lovers. We gather latest fashion information and work hard to bring 
                        you more new trends from different stores. You can use Pinkals to find any outfits that you love and help you tailor more new 
                        style everyday!
                    </p>
                    <p>
                        Starting today with Pinkals, you may stop juggling to squeeze in shopping mall crowd on weekend and you may save a lot of time to 
                        find special boutique. Every fashion that you wish to find, you will find it at Pinkals!
                    </p>
                    <p>
                        Lots of people use Pinkals to discover and find clothing that they love, and we want to be sure that we have given you the best 
                        platform for fashion and that will be here to stay. Join us now in Pinkals and we will assure you that you will love to be one of us. 
                        Thanks for everything you do to make Pinkals a better place.
                    </p>
                </div>

                <div class="section" id="yolove-tool">
                    <h2>Yolove.it Tool - Collect tool Drag this button to your bookmark bar
                        <a id="fav-tool-btn" class="fav_tool bookmarklet" href="javascript:void(function(g,d,m,s){g[m]?(g[m].c=1,g[m]()):!d[m]&&(d.getElementsByTagName('head')[0]||d.body).appendChild((d[m]=1,s=d.createElement('script'),s.setAttribute('charset','utf-8'),s.id='pinit-script',s.src='<?php echo URL::asset('assets/js/pincollect.js'); ?>?'+Math.floor(+new Date/10000000),s))}(window,document,'__pinit'))" title="Yolove.it Tool">Post To Yolove.it</a>
                    </h2>
                    <p>
                        <strong>1.Open your browser bookmarks bar :</strong>
                        <br />
                        <br />
                        <strong>2.Add Yolove.it Tool<br />
                            <div class="form-sub-2"><a id="fav-tool-btn" class="fav_tool bookmarklet btn"
                                                       href="javascript:void(function(g,d,m,s){g[m]?(g[m].c=1,g[m]()):!d[m]&&(d.getElementsByTagName('head')[0]||d.body).appendChild((d[m]=1,s=d.createElement('script'),s.setAttribute('charset','utf-8'),s.id='pinit-script',s.src='<?php echo URL::asset('assets/js/pincollect.js'); ?>?'+Math.floor(+new Date/10000000),s))}(window,document,'__pinit'))"
                                                       title="Yolove.it Tool">Post To Yolove.it</a></div> ←Drag this button to your bookmark bar</strong>
                        <br />
                        <br />
                        <br />
                        <strong>
                            3.Browse any web page , only need to click the button collection! So get started quickly .
                        </strong>
                    </p>
                </div>
                <div class="section" id="privacy">
                    <h1>Privacy Policy</h1>
                    <p>
                        We at Pinkals LLP (“Pinkals,” “company,” “we,” “us,” “our,”) know that our users (“user,” “you,” “your,”) care about your Personal Identification Information (“personal information”) is used and shared. Please read the following Privacy Policy before using our website at www.pinkals.com. This Privacy Policy governs the manner in which Pinkals collects, uses, maintains and discloses information collected from users of the Pinkals website (“website,” “site,”). This Privacy Policy also applies to the site and all products and services offered by Pinkals.
                    </p>
                    <strong>What does this Privacy Policy cover?</strong>
                    <p>
                        This Privacy Policy covers your personal information that we collect from you when you are accessing or using our website. This policy does not cover for companies that we do not own or control, or to individuals that we do not employ or manage. This policy also does not cover any information that you choose to publish or disclose on the website, which we will not considered as personal information.
                    </p>
                    <strong>Personal Identification Information</strong>
                    <p>
                        We may collect personal information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, real name, username, email address, IP address, location, browser information, browsing history, transactions, listing created, comments and reviews posted and any other information necessary for us to provide our service to link your Pinkals accounts with third party services, such as facebook and twitter. If you choose to provide your third party account information with us, you should understand that some information in those account may be transferred into your Pinkals account and that information that transferred to our website or account is covered by this policy. We will only collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site and related activities.
                    </p>
                    <strong>Non-personal Identification Information</strong>
                    <p>We may collect non-personal identification information about users automatically whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers’ utilized and other similar information.</p>
                    <strong>	Web Browser Cookies</strong>

                    <p>Our Site may use "cookies" to enhance User experience. “Cookies” are identifiers we transfer to your computer through your browser that allow us to recognize your browser or mobile device and let us know how and when pages in our site are visited and by how many people. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>

                    <strong>How we use collected information</strong>

                    <p>When you register for Pinkals account, you will be automatically opted to receive email notices, which may also include notification of someone send you a message to invites you as follower or join Pinkals group. If you opted to become a follower or friend for a Brankd profile or store, the administrator of the brand or store may send you message containing commercial and promotional messages. Pinkals may collect and use Users personal information for the following purposes: •	You may receive communication from us, whether by emails or other method. •	We may send offers to certain users on behalf of other businesses. • To run a contest, survey or other site features. •	To send users information they agreed to receive about topics we think will be of interest to them. •	We may use the email address to respond to their inquiries, questions, and/or other requests. •	We may choose to buy or sell assets. In that situation, customer information is typically one of the business assets that is transferable.</p>

                    <strong>How we protect your information</strong>

                    <p>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.</p>

                    <strong>Sharing your personal information</strong>

                    <p>We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above. We share your personal information in personally identifiable form only as described below:-</p>

                    <strong>1.	Advertisers</strong>

                    <p>We may allow advertisers (“Advertisers”) to choose the demographic information of users for advertisements or promotional offers and you agree that we may provide any of the information we have gathered from you in non-personally identifiable form to and Advertiser.</p>

                    <strong>2.	Affiliated Business and Third Party Websites</strong>

                    <p>Businesses or third party websites we’re affiliated with may sell items to you through our website. You can identify when an affiliated business is associated with such a transaction, and business and third party websites to the extent that it is related to the particular transaction only. For your understanding, we have no control over the third party websites, so if you choose to allow the transaction, please review all the third party websites’ policies.</p>

                    <strong>3.	Agents</strong>

                    <p>We may employ other companies and people to perform tasks on our behalf and need to share your personal information with them to provide better products and services to you. Agents that we hired do not have any right to use the Personal Information beyond that is necessary to assist us.</p>

                    <strong>Changes to this privacy policy</strong>

                    <p>Pinkals has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.</p>

                    <strong>Your acceptance of these terms</strong>

                    <p>By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.</p>

                    <strong>Contacting us</strong>

                    <p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at info@pinkals.com.</p>
                </div>
                <div class="section" id="term-of-services">
                    <h1>Terms of Services</h1>
                    <p></p>
                    <strong>ACCEPTANCE OF TERMS</strong>
                    <p>Thank you for using Pinkals! This Agreement (“agreement”) contains the complete terms and conditions that apply to your participation in Pinkals site (“site,” “website”). If you wish to use the site including its tools and services please read these terms of use carefully. By accessing this site or using any part of the site or any content or services hereof, you agree to become bound by these terms and conditions. If you do not agree to all the terms and conditions, then you may not access the site or use the content or any services in the site.</p>
                    <strong>MODIFICATIONS OF TERMS OF USE</strong>
                    <p>Amendments to this agreement can be made and effected by us from time to time without specific notice to your end. Agreement posted on the Site reflects the latest agreement and you should carefully review the same before you use our site.</p>
                    <strong>USE OF THE SITE</strong>
                    <p>You are prohibited to do the following acts, to with (a) use our sites, including its services and or tools if you are not able to form legally binding contracts, are under the age of 18, or are temporarily or indefinitely suspended from using our sites, services, or tools (b) posting of an items in inappropriate category or areas on our sites and services; (c) collecting information about users personal information; (d) maneuvering the price of any item or interfere with other users' listings; (f) post false, inaccurate, misleading, defamatory, or libelous content; (g) take any action that may damage the rating system.</p>

                    <strong>1.	Posting user contents</strong>
                    <p>
                        Pinkals allows you to post content, including photos, videos, comments and other related materials. Everything that you publish on our website is referred as “user contents.” You retain all rights in, and solely responsible for, the user content you publish to Pinkals website.
                    </p>
                    <strong>
                        2.	How Pinkals and other users can use your content
                    </strong>
                    <p>
                        For everything that you post, you grant Pinkals and other users a non-exclusive, royalty-free, transferable, worldwide license to use, store, display, reproduce, re-pin, modify, and distribute your content on Pinkals solely for the purposes of operating, developing, providing, and using the website. We reserve the right to remove or modify user content for any reason, including user content that we believe violates the Terms or our policies.
                    </p>
                    <strong>
                        3.	How long your content will keep on the website
                    </strong>
                    <p>
                        The content that posted by you will only terminate if and only if you deactivate your account, or if you remove you content from Pinkals, else, we may retain your user content for a commercially reasonable period of time for backup, archival, or audit purposes. In addition, Pinkals and other users may continue to use, store, display, reproduce, re-pin, modify and distribute any of your user content that other users have stored or shared through their account.
                    </p>
                    <strong>
                        4.	Your responsibility for your contents.
                    </strong>
                    <strong>
                        REGISTRATION INFORMATION
                    </strong>
                    <p>
                        For you to complete the sign-up process in our site, you must provide your full legal name, a valid email address, username and any other information needed in order to complete the signup process. You must qualify that you are 18 years or older and must be responsible for keeping your password secure and be responsible for all activities and contents that are uploaded under your account. You must not transmit any worms or viruses or any code of a destructive nature. Any information provided by you or gathered by the site or third parties during any visit to the site shall be subject to the terms of Pinkals Privacy Policy.
                    </p>
                    <strong>
                        TERMS
                    </strong>
                    <p>
                        This Agreement will remain in full force and effect while you use the Website. You may terminate your membership at any time for any reason by following the instructions on the TERMINATION OF ACCOUNT in the setting page. We may terminate your membership for any reason at any time. If you are using a paid version of the Service and we terminate your membership in the Service because you have breached this Agreement, you will not be entitled to any refund of unused subscription fees. Even after your membership is terminated, certain sections of this Agreement will remain in effect.
                    </p>
                    <strong>
                        SECURITY
                    </strong>
                    <p>
                        We care about our users. We work hard to protect the security of your content and account, Pinkals cannot guarantee that unauthorized third parties will not be able to defeat our security measures. Please inform us immediately of any compromise or unauthorized use of your account. For accounts created on behalf of a company, organization, or other entity, you are responsible for ensuring that only authorized individuals have access to the account.
                    </p>
                    <strong>
                        INDEMNITY
                    </strong>
                    <p>
                        You agree to indemnify and hold harmless to Pinkals and its officers, directors, employees and agents, from and against any claims, suits, proceedings, disputes, demands, liabilities, damages, losses, costs and expenses, including, without limitation, reasonable legal and accounting fees (including costs of defense of claims, suits or proceedings brought by third parties), in any way related to (a)your access to or use of our Product, (b)your user content, or (c) you breach of any of these Terms. Failure of the Pinkals to insist upon strict performance of any of the terms, conditions and covenants hereof shall not be deemed a relinquishment or waiver of any rights or remedy that the we may have, nor shall it be construed as a waiver of any subsequent breach of the terms, conditions or covenants hereof, which terms, conditions and covenants shall continue to be in full force and effect.
                    </p>
                    <strong>
                        SEVERABILITY OF TERMS
                    </strong>
                    <p>
                        In the event that any provision of these Terms and Conditions is found invalid or unenforceable pursuant to any judicial decree or decision, such provision shall be deemed to apply only to the maximum extent permitted by law, and the remainder of these Terms and Conditions shall remain valid and enforceable according to its terms.
                    </p>
                    <strong>
                        ENTIRE AGREEMENT
                    </strong>
                    <p>
                        This Agreement shall be governed by and construed in accordance with the substantive laws of United States of America, without any reference to conflict-of-laws principles. The Agreement describes and encompasses the entire agreement between us and you, and supersedes all prior or contemporaneous agreements, representations, warranties and understandings with respect to the Site, the contents and materials provided by or through the Site, and the subject matter of this Agreement.
                    </p>
                    <strong>
                        CHOICE OF LAW; JURISDICTION; FORUM
                    </strong>
                    <p>
                        Any dispute, controversy or difference which may arise between the parties out of, in relation to or in connection with this Agreement is hereby irrevocably submitted to the exclusive jurisdiction of the courts of United States of America, to the exclusion of any other courts without giving effect to its conflict of laws provisions or your actual state or country of residence.
                    </p>
                    <strong>
                        Contacting us
                    </strong>
                    <p>
                        If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at info@pinkals.com.
                    </p>
                </div>
                <div class="section" id="contact">
                    <div class="col-md-12">
                        <h1>Yolove.it Contact Us</h1>
                        <div class="content-asset"><!-- dwMarker="content" dwContentID="bc6MUiaagYD76aaadcCqIKXRQz" -->

                            <div id="main_content_inner">
                                <p>We currently offer the following ways to contact us</p>
                            </div>
                            <div class="clear"></div>

                        </div>

                        <div class="contact-number">
                            <div class="content-asset"><!-- dwMarker="content" dwContentID="bcTRsiaagYvSgaaadcgWMKXRQz" -->

                                <address>
                                    <strong>EMAIL</strong><br>
                                    @if(isset($serverEmail))
                                        <a href="mailto:{{$serverEmail}}" class="btn form-sub">{{$serverEmail}}</a>
                                    @else
                                        <a href="mailto:info@yoLove.it" class="btn form-sub">info@yoLove.it</a>
                                    @endif
                                </address>

                                <address>
                                    <strong>PHONE</strong><br>
                                    For all inquiries regarding your <span class="url">{{$_SERVER['SERVER_NAME']}}</span> order, please call us at <span class="tel">1-800-299-6575</span> Mon-Fri, 8am-10pm&nbsp;EST, Sat/Sun, 9am-8pm&nbsp;EST<br><br>
                                    For all other inquiries including store questions, please call us at <span class="tel">1-800-650-7708</span>.
                                </address>

                                <address>
                                    <strong>Yolove Customer Service<br>
                                        1400 Industries Road<br>
                                        Richmond, IN 47374
                                    </strong>
                                </address>
                            </div>
                        </div>
                        <p>
                            <form onsubmit="return false;">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="contact_name" placeholder="Enter name" require="required">
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control" id="contact_email" placeholder="Enter email" require="required">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <textarea class="form-control" id="contact_message" require="required"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success" id="contact_submit">Submit</button>
                            </form>
                        </p>

                        <p>

                        </p>
                    </div>
                </div>
                <div class="section" id="customer">
                    <h1>Customer Service</h1>
                    <p>We currently offer the following ways to contact us.</p>

                    <h2>E-mail</h2>
                    @if(isset($serverEmail))
                         <p><a href="mailto:{{$serverEmail}}" class="btn form-sub">{{$serverEmail}}</a></p>
                    @else
                         <p><a href="mailto:info@yoLove.it" class="btn form-sub">info@yoLove.it</a></p>
                    @endif

                    <h2>Phone</h2>
                    <p>For all inquiries regarding your {{$_SERVER['SERVER_NAME']}} order, please call us at 1-800-299-6575</p>
                    <p>Mon-Fri, 8am-10pm EST, Sat/Sun, 9am-8pm EST</p>
                    <p>For all other inquiries including store questions, please call us at 1-800-650-7708</p>

                    <h2>Mail</h2>
                    <p><strong>Yolove Customer Service</strong><br>
                        1400 Industries Road<br>
                        Richmond, IN 47374</p>

                    <p><strong>Yolove Children's Group Corporate Office</strong><br>
                        191 Spring Street<br>
                        Lexington, MA 02420</p>

                </div>
                <div class="section" id="shipping">
                    <h1>Shipping Information</h1>
                    <p>{{$_SERVER['SERVER_NAME']}} orders can be shipped to any of the following locations: the 50 United States, APO/FPO addresses, Puerto Rico and US Virgin Islands. You will receive your purchase through Standard Delivery within 7-10 business days from your order date. You will receive your Express Delivery within 3-4 business days from your order date.</p>
                    <p>Shipments to Non-continental U.S. states and territories must ship using Express Delivery. A $10 surcharge will be applied to orders shipped to Alaska, Hawaii, Puerto Rico and US Virgin Islands. Your purchase will be delivered 3-4 business days from your order date. Orders to APO/FPO, Guam and the US Virgin Islands will be shipped via United States Postal Priority. You will receive your purchase within 7-14 business days* from your order date.
                        <br>*Yolove is not responsible for late shipments caused by USPS delays.</p>
                    <h3>Shipping Schedule</h3>
                    <p>Standard and expedited delivery options are available to the 48 contiguous states. You will receive your purchase through Standard Delivery within 7-10 business days from your order date. You will receive your Express Delivery within 3-4 business days from your order date.  You will receive your purchase through Overnight Delivery within 1-3 business days from your order date.</p><br>
                    <h3>Shipping for {{$_SERVER['SERVER_NAME']}} Orders</h3>
                    <table class="sizeTable" width="50%" cellspacing="0">
                        <tbody><tr>
                            <td width="20%"><h4>Order Total</h4></td>
                            <td width="10%"><h4>Standard</h4></td>
                            <td width="10%"><h4>Express</h4></td>
                            <td width="10%"><h4>Overnight</h4></td>
                        </tr>
                        <tr>
                            <td>Up to $34.99</td>
                            <td>$4.99</td>
                            <td>$14.00</td>
                            <td>$26.00</td>
                        </tr>
                        <tr>
                            <td>$35 to $49.99</td>
                            <td>$6.99</td>
                            <td>$14.00</td>
                            <td>$26.00</td>
                        </tr>
                        <tr>
                            <td>$50.00 to $74.99</td>
                            <td>$6.99</td>
                            <td>$20.00</td>
                            <td>$32.00</td>
                        </tr>
                        <tr>
                            <td>$74.99 to $149.99</td>
                            <td>FREE</td>
                            <td>$20.00</td>
                            <td>$32.00</td>
                        </tr>
                        <tr>
                            <td>$150.00 and over</td>
                            <td>FREE</td>
                            <td>$26.00</td>
                            <td>$38.00</td>
                        </tr>
                        </tbody></table><br><br>
                    <h3>Shipping for {{$_SERVER['SERVER_NAME']}} Orders for Rewards Members</h3>
                    <table class="sizeTable" width="50%" cellspacing="0">
                        <tbody><tr>
                            <td width="20%"><h4>Order Total</h4></td>
                            <td width="10%"><h4>Standard</h4></td>
                            <td width="10%"><h4>Express</h4></td>
                            <td width="10%"><h4>Overnight</h4></td>
                        </tr>
                        <tr>
                            <td>Up to $34.99</td>
                            <td>FREE</td>
                            <td>$14.00</td>
                            <td>$26.00</td>
                        </tr>
                        <tr>
                            <td>$35 to $49.99</td>
                            <td>FREE</td>
                            <td>$14.00</td>
                            <td>$26.00</td>
                        </tr>
                        <tr>
                            <td>$50.00 to $149.99</td>
                            <td>FREE</td>
                            <td>$20.00</td>
                            <td>$32.00</td>
                        </tr>
                        <tr>
                            <td>$150.00 and over</td>
                            <td>FREE</td>
                            <td>$26.00</td>
                            <td>$38.00</td>
                        </tr>
                        </tbody></table>
                    <p>Gift Card-only orders and orders shipped to P.O. Boxes and APO/FPO will be shipped USPS and may take extra delivery time.*<br>
                        *Yolove is not responsible for late shipments caused by USPS delays.<br></p>
                    <h3>Canceling Orders</h3>
                    <p>At Yolove, our goal is to expedite your order as quickly as possible; therefore, once your order is placed it cannot be cancelled or changed. Orders can ONLY be canceled by {{$_SERVER['SERVER_NAME']}} Customer Service. You must call Yolove Customer Service at 1-800-299-6575 to see if the order can be canceled. Please be aware that Customer Service is available Monday–Friday, 8am–10pm EST, Saturday and Sunday, 9am–8pm EST. If you have questions about making a return once received please refer to our return policy or contact Customer Service.</p>
                </div>
                <div class="section" id="returns">
                    <h1>Returns &amp; Exchanges</h1>
                    <div data-asset-name="cs-returns-exchanges-2015-fe1-07-16">
                        <div class="hero clearfix">
                            <div class="inner-wrapper">
                                <img width="242" height="309" src="https://www.striderite.com/on/demandware.static/Sites-striderite_us-Site/Sites-striderite_us-Library/default/dw9141954a/content/seasonal-content/2015-fall/fe1/pipelines/core-content/cs-returns-exchanges-banner-nb.jpg" alt="Child playing with stroller.">
                                <div class="content">
                                    <h4>make it rite<br>guarantee</h4>
                                    <img width="33" height="28" src="https://www.striderite.com/on/demandware.static/Sites-striderite_us-Site/Sites-striderite_us-Library/default/dw252aec0e/content/seasonal-content/2015-fall/fe1/pipelines/core-content/cs-returns-exchanges-thumb-nb.png" alt="Thumbs up.">
                                    <p>The Make It Rite guarantee is simple: we’ll make sure you’re happy with every Yolove shoe you buy, so you can shop with confidence. As parents ourselves, we wouldn’t want it any other way.</p>
                                </div>
                            </div>
                        </div>

                        <h3>Our Guarantee</h3>

                        <p>Thank you for your recent purchase. If you are not satisfied with your order, simply send your item back to us or return it to a corporate Yolove store near you. Please follow the instructions below so we can process your return as quickly as possible.</p>

                        <h3>Return by Mail:</h3>

                        <p>Merchandise must be returned in its original unworn condition and received WITHIN 45 DAYS OF ORIGINAL PURCHASE (invoice date). Orders returned beyond this time period will not be accepted. Yolove reserves the right to refuse worn or damaged merchandise.</p>

                        <p>Pack the merchandise in its original packaging or appropriate carton. Enclose the completed packing slip found on the back of the original invoice.</p>

                        <p>Complete the enclosed return form. Peel and stick both the pre-printed address label AND the provided pre-paid USPS shipping label; on the outside of the carton. Return shipping charges of $4.99 will be deducted from your refund. Please keep your shipping receipt number for reference and tracking.</p>

                        <p>A credit for the value of the returned merchandise minus shipping charges of $4.99 will appear on the original credit card used to purchase the item(s). Please allow 1-2 billing cycles for the credit to appear on your statement. For more information, please contact your credit card company.</p>

                        <h3>At any corporate Yolove retail store:</h3>

                        <p> In addition with your packing slip, please bring your Order Confirmation email or Yolove Rewards Card.</p>

                        <h3>For Exchanges:</h3>

                        <p>At this time, {{$_SERVER['SERVER_NAME']}} does not offer exchanges. We suggest you return the unwanted item(s), following the return process above, and place a new order for the replacement merchandise through {{$_SERVER['SERVER_NAME']}}. If you need assistance please call Customer Service 1-800-299-6575. We will process your return immediately upon receipt and credit your account for the merchandise; less the return shipping charges.</p>

                        <h3>Gift Cards:</h3>

                        <p>If you paid for your item(s) in full using a Yolove gift card(s), a new gift card will be sent to your billing address loaded with the value of the refund. If a credit card was used in combination with a gift card, the entire merchandise amount will be refunded to your credit card.</p>

                        <h3>Buy One, Get One 1/2 OFF Returns:</h3>

                        <p>If you received a multiple item purchase discount from a Buy One Get One Half Off promotion, you will receive a credit for the purchase price of the item you purchased at half price. If you wish to return the full-price item, the original Buy One Get One Half Off discount is forfeited, and you will be charged the remaining 50% of the purchase price for the item that received the 50% off discount.</p>

                        <h3>For wrong item(s) shipped:</h3>

                        <p>If we have made an error with your order, {{$_SERVER['SERVER_NAME']}} Customer Service will gladly assist in a quick resolution. Please follow these easy steps: (1) Please contact our Customer Service Team by email at <a href="mailto:{{$serverEmail}}">{{$serverEmail}}</a> or by phone at 1-800-299-6575 and explain the situation, including your name and order number. (2) Follow our simple return policy, outlined above, to return the merchandise. {{$_SERVER['SERVER_NAME']}} will reimburse you for your reasonable return ground shipping charge upon receipt of your merchandise. Shipping reimbursement will be credited back to the original purchase credit card.</p>
                        <p>If you have any questions regarding our return/exchange policy, please contact our Customer Service Team by email at <a href="mailto:{{$serverEmail}}">{{$serverEmail}}</a> or by phone at 1-800-299-6575.</p>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        var getUrl = location.pathname.split('/');
        getUrl = getUrl[getUrl.length-1];
        if (getUrl) {
            if (getUrl == "aboutUs") {
                $('.about-us').addClass("active");
                $('#about-us').css("display", "block");
            } else if (getUrl == "terms-n-conditions") {
                $('.term-of-services').addClass("active");
                $('#term-of-services').css("display", "block");
            } else if (getUrl == "yoloveTool") {
                $('.yolove-tool').addClass("active");
                $('#yolove-tool').css("display", "block");
            } else if (getUrl == "privacy") {
                $('.privacy').addClass("active");
                $('#privacy').css("display", "block");
            } else if (getUrl == "contact") {
                $('.contact').addClass("active");
                $('#contact').css("display", "block");
            } else if (getUrl == "customer") {
                $('.customer').addClass("active");
                $('#customer').css("display", "block");
            } else if (getUrl == "shipping") {
                $('.shipping').addClass("active");
                $('#shipping').css("display", "block");
            } else if (getUrl == "returns") {
                $('.returns').addClass("active");
                $('#returns').css("display", "block");
            }
        }
        $("#nav li a").click(function () {
            $this = $(this);
            var id = $this.attr('id');
            var url = $this.attr('data-url');
            $('.about-us').removeClass("active");
            $('.term-of-services').removeClass("active");
            $('.yolove-tool').removeClass("active");
            $('.yolove-tool').removeClass("active");
            $('.privacy').removeClass("active");
            $('.contact').removeClass("active");
            $('.customer').removeClass("active");
            $('.shipping').removeClass("active");
            $('.returns').removeClass("active");
            $this.addClass("active");
            $(".section").fadeOut();
            $(".section").scrollTop(200);
            $(id).fadeIn(300);
            window.history.pushState("", "", "<?php echo URL::to('/'); ?>" + "/" + url);
        });

    });
    $('#contact_submit').on('click', function () {
        var name = $('#contact_name').val();
        var email = $('#contact_email').val();
        var msg = $('#contact_message').val();
        if (name.trim() == "") {
            $('#contact_name').focus();
        } else if (email.trim() == "") {
            $('#contact_email').focus();
        } else if (msg.trim() == "") {
            $('#contact_message').focus();
        } else {
            $.ajax({
                url: "<?php echo URL::to('/') ?>" + "/sendMessage",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    msg: msg
                },
                success: function (message) {
                    noty({
                        text: message,
                        type: 'success',
                        dismissQueue: true,
                        timeout: 3000,
                        closeWith: ['click'],
                        layout: 'center',
                        theme: 'defaultTheme',
                        maxVisible: 1,
                    });
                    $('#contact_name').val('');
                    $('#contact_email').val('');
                    $('#contact_message').val('');
//                    setTimeout(function () {
//                        window.location = "<?php echo URL::to('/contact') ?>";
//                    }, 3000);
                },
                error: function (message) {
                    noty({
                        text: message,
                        type: 'error',
                        dismissQueue: true,
                        timeout: 3000,
                        closeWith: ['click'],
                        layout: 'center',
                        theme: 'defaultTheme',
                        maxVisible: 1,
                    });
                    setTimeout(function () {
                        window.location = "<?php echo URL::to('/contact') ?>";
                    }, 3000);
                }

            });
        }
    });
</script>
@stop