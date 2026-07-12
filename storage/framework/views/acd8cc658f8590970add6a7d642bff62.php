 <footer class="footer-section header-bg fix">
     <div class="container">
         <div class="footer-widget-wrapper">
             <div class="row g-4 justify-content-between">
                 <div class="col-xl-2 col-md-6 col-lg-2 wow fadeInUp" data-wow-delay=".2s">
                     <div class="single-footer-widget">
                         <div class="wid-title">
                             <h3>Quick Links</h3>
                         </div>
                         <ul class="list-area">
                             <li>
                                 <a href="about.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     About US
                                 </a>
                             </li>
                             <li>
                                 <a href="contact.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Contact
                                 </a>
                             </li>
                             <li>
                                 <a href="contact.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Gallery
                                 </a>
                             </li>
                             <li>
                                 <a href="faq.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     FAQ
                                 </a>
                             </li>
                             <li>
                                 <a href="news-details.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Blog
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6 col-lg-3 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                     <div class="single-footer-widget">
                         <div class="wid-title">
                             <h3>Explore Now</h3>
                         </div>
                         <ul class="list-area">
                             <li>
                                 <a href="volounteer-details.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Volunteers
                                 </a>
                             </li>
                             <li>
                                 <a href="project-details.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Project
                                 </a>
                             </li>
                             <li>
                                 <a href="event-details.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Event
                                 </a>
                             </li>
                             <li>
                                 <a href="project-details.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Causes
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-2 col-md-6 col-lg-2 wow fadeInUp" data-wow-delay=".6s">
                     <div class="single-footer-widget">
                         <div class="wid-title">
                             <h3>Supports</h3>
                         </div>
                         <ul class="list-area">
                             <li>
                                 <a href="donation-details.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Domination
                                 </a>
                             </li>
                             <li>
                                 <a href="news.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Forums
                                 </a>
                             </li>
                             <li>
                                 <a href="faq.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Faq
                                 </a>
                             </li>
                             <li>
                                 <a href="contact.html">
                                     <i class="fa-solid fa-chevrons-right"></i>
                                     Support Policy
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-xl-5 col-md-6 col-lg-5 ps-lg-5 wow fadeInUp" data-wow-delay=".8s">
                     <div class="single-footer-widget">
                         <div class="wid-title">
                             <h3>Newsletter</h3>
                         </div>
                         <div class="footer-newsletter">
                             
                             <p>
                                 <?php echo e($siteSettings?->footer_text ?? 'Charity not only helps to reduce suffering but also fosters a sense of unity and shared responsibility in society.'); ?>

                             </p>


                             <form action="#">
                                 <div class="form-clt">
                                     <input type="text" name="email" id="email" placeholder="Enter Your Email">
                                     <button type="submit" class="theme-btn">
                                         Subscribe Now
                                     </button>
                                 </div>
                             </form>


                             
                             <div class="social-icon">
                                 <?php if(!empty($siteSettings?->facebook_url)): ?>
                                     <a href="<?php echo e($siteSettings->facebook_url); ?>" target="_blank"><i
                                             class="fa-brands fa-facebook-f"></i></a>
                                 <?php endif; ?>
                                 <?php if(!empty($siteSettings?->twitter_url)): ?>
                                     <a href="<?php echo e($siteSettings->twitter_url); ?>" target="_blank"><i
                                             class="fa-brands fa-twitter"></i></a>
                                 <?php endif; ?>
                                 <?php if(!empty($siteSettings?->instagram_url)): ?>
                                     <a href="<?php echo e($siteSettings->instagram_url); ?>" target="_blank"><i
                                             class="fa-brands fa-instagram"></i></a>
                                 <?php endif; ?>
                                 <?php if(!empty($siteSettings?->youtube_url)): ?>
                                     <a href="<?php echo e($siteSettings->youtube_url); ?>" target="_blank"><i
                                             class="fa-brands fa-youtube"></i></a>
                                 <?php endif; ?>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="footer-bottom">
             <div class="footer-wrapper">
                 <p>Copyright &copy; <?php echo e(date('Y')); ?>

                     <span><?php echo e($siteSettings?->site_name ?? 'Designed By Mahabubul Alam'); ?></span>. All Rights Reserved.
                 </p>
                 <ul class="footer-bottom-list">
                     <li>
                         <a href="faq.html">Faq</a>
                     </li>
                     <li>
                         <a href="contact.html">Careers</a>
                     </li>
                     <li>
                         <a href="contact.html">Contact</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </footer>
<?php /**PATH C:\Xampp\htdocs\Laravel_Donation_Management_System\resources\views/frontend/layout/parts/footer.blade.php ENDPATH**/ ?>