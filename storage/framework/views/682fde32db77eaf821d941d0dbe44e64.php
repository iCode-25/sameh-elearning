<footer>
    <div class="container-fluid">
        <div class="footer-wrapper pb-40">
            <div class="col-xl-4">
                <div class="logo-block">
                    <img src="<?php echo e(setting('image_logo_web', 'en')); ?>" alt="" class="ft-logo mb-12">
                    <h6 class="dark-gray fw-800 mb-16"><?php echo e(\App\Helpers\TranslationHelper::translate('Follow Us!')); ?></h6>
                    <div class="links-container">
                        
                        <a href="<?php echo e(App\Models\Contact::first()->facebook); ?>" target="_blank" class="links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M17.625 5.625C18.0131 5.625 18.3281 5.31 18.3281 4.92188V0.703125C18.3281 0.315 18.0131 0 17.625 0H13.4062C10.6922 0 8.48437 2.20781 8.48437 4.92188V8.4375H6.375C5.98687 8.4375 5.67188 8.7525 5.67188 9.14062V13.3594C5.67188 13.7475 5.98687 14.0625 6.375 14.0625H8.48437V23.2969C8.48437 23.685 8.79937 24 9.1875 24H13.4062C13.7944 24 14.1094 23.685 14.1094 23.2969V14.0625H16.9219C17.2655 14.0625 17.5589 13.8141 17.6156 13.4752L18.3188 9.25641C18.3525 9.0525 18.2953 8.84391 18.1617 8.68594C18.0281 8.52844 17.8317 8.4375 17.625 8.4375H14.1094V5.625H17.625ZM13.4062 9.84375H16.7948L16.3261 12.6562H13.4062C13.0181 12.6562 12.7031 12.9713 12.7031 13.3594V22.5938H9.89062V13.3594C9.89062 12.9713 9.57562 12.6562 9.1875 12.6562H7.07812V9.84375H9.1875C9.57562 9.84375 9.89062 9.52875 9.89062 9.14062V4.92188C9.89062 2.98359 11.468 1.40625 13.4062 1.40625H16.9219V4.21875H13.4062C13.0181 4.21875 12.7031 4.53375 12.7031 4.92188V9.14062C12.7031 9.52875 13.0181 9.84375 13.4062 9.84375Z"
                                    fill="white"></path>
                            </svg>
                        </a>
                        
                        <a href="<?php echo e(App\Models\Contact::first()->iniesta); ?>" target="_blank" class="links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M12.2362 23.9999C12.1567 23.9999 12.0773 23.9999 11.9973 23.9996C10.116 24.0041 8.37781 23.9564 6.68738 23.8534C5.13757 23.7591 3.7229 23.2236 2.59607 22.3047C1.50879 21.4181 0.766296 20.2194 0.389282 18.7421C0.0611572 17.4559 0.0437622 16.1934 0.0270996 14.9723C0.0150146 14.0961 0.00256348 13.0579 0 12.0021C0.00256348 10.9419 0.0150146 9.90374 0.0270996 9.02758C0.0437622 7.80663 0.0611572 6.54412 0.389282 5.25781C0.766296 3.78051 1.50879 2.58172 2.59607 1.69512C3.7229 0.7763 5.13757 0.240716 6.68756 0.146417C8.37799 0.0436949 10.1166 -0.00427876 12.0018 0.000298881C13.8836 -0.00372944 15.6213 0.0436949 17.3117 0.146417C18.8615 0.240716 20.2762 0.7763 21.403 1.69512C22.4905 2.58172 23.2328 3.78051 23.6098 5.25781C23.9379 6.54394 23.9553 7.80663 23.972 9.02758C23.9841 9.90374 23.9967 10.9419 23.9991 11.9977V12.0021C23.9967 13.0579 23.9841 14.0961 23.972 14.9723C23.9553 16.1932 23.9381 17.4557 23.6098 18.7421C23.2328 20.2194 22.4905 21.4181 21.403 22.3047C20.2762 23.2236 18.8615 23.7591 17.3117 23.8534C15.6929 23.952 14.0299 23.9999 12.2362 23.9999ZM11.9973 22.5131C13.8479 22.5175 15.5471 22.4706 17.1978 22.3703C18.3697 22.299 19.752 21.5304 20.5844 20.8516C21.3538 20.2241 21.8837 19.3584 22.1593 18.2784C22.4325 17.2078 22.4482 16.0583 22.4634 14.9466C22.4753 14.0763 22.4878 13.0455 22.4903 11.9999C22.4878 10.9542 22.4753 9.92352 22.4634 9.05322C22.4482 7.94158 22.4325 6.79205 22.1593 5.72125C21.8837 4.64129 21.3538 3.77557 20.5844 3.14806C19.752 2.46948 18.3697 1.72331 17.1978 1.65209C15.5471 1.55156 13.8479 1.50524 12.0016 1.50926C10.1514 1.50487 8.45196 1.55706 6.80127 1.65759C5.62939 1.72882 4.37526 2.2314 3.54286 2.90998C2.77346 3.53749 2.10105 4.64129 1.82548 5.72125C1.55229 6.79205 1.53654 7.9414 1.52134 9.05322C1.50944 9.92425 1.49699 10.9557 1.49443 12.0021C1.49699 13.044 1.50944 14.0756 1.52134 14.9466C1.53654 16.0583 1.55229 17.2078 1.82548 18.2784C2.10105 19.3584 2.63096 20.2241 3.40037 20.8516C4.23277 21.5302 5.62939 22.299 6.80127 22.3703C8.45196 22.4708 10.1517 22.5177 11.9973 22.5131ZM11.9526 17.8593C8.72186 17.8593 6.0932 15.2308 6.0932 11.9999C6.0932 8.76904 8.72186 6.14056 11.9526 6.14056C15.1835 6.14056 17.8119 8.76904 17.8119 11.9999C17.8119 15.2308 15.1835 17.8593 11.9526 17.8593ZM12.0016 7.50489C9.36718 7.50489 7.51314 9.35893 7.51314 11.9977C7.51314 14.1946 9.17436 16.513 11.9757 16.513C14.1728 16.513 16.457 14.4316 16.457 11.9977C16.457 9.80083 14.781 7.50489 12.0016 7.50489ZM18.4682 4.26556C17.6916 4.26556 17.0619 4.89507 17.0619 5.67181C17.0619 6.44854 17.6916 7.07806 18.4682 7.07806C19.2449 7.07806 19.8744 6.44854 19.8744 5.67181C19.8744 4.89507 19.2449 4.26556 18.4682 4.26556Z"
                                    fill="white"></path>
                            </svg>
                        </a>
                        
                        <a href="<?php echo e(App\Models\Contact::first()->youtube); ?>" target="_blank" class="links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                class="bi bi-youtube" viewBox="0 0 16 16">
                                <path
                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                            </svg>
                        </a>
                        
                        <a href="<?php echo e(App\Models\Contact::first()->tiktok); ?>" target="_blank" class="links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                class="bi bi-tiktok" viewBox="0 0 16 16">
                                <path
                                    d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                            </svg>
                        </a>

                        
                        <a href="https://wa.me/<?php echo e(App\Models\Contact::first()->whatsapp); ?>" target="_blank"
                            class="links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                            </svg>
                        </a>

                        
                        <a href="<?php echo e(App\Models\Contact::first()->x); ?>" target="_blank" class="links">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M14.2418 10.1624L22.9842 0H20.9125L13.3215 8.82384L7.25852 0H0.265625L9.43399 13.3432L0.265625 24H2.33742L10.3538 14.6817L16.7567 24H23.7496L14.2413 10.1624H14.2418ZM11.4042 13.4608L10.4752 12.1321L3.08391 1.55961H6.26607L12.2309 10.0919L13.1599 11.4206L20.9135 22.5113H17.7313L11.4042 13.4613V13.4608Z"
                                    fill="white"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="link-block quick-links">
                    <h6 class="dark-gray fw-800 mb-24"><?php echo e(\App\Helpers\TranslationHelper::translate('Quick Links')); ?>

                    </h6>
                    <ul class="footer-list list-unstyled">
                        <li class="mb-12 light-gray fw-400">
                            <a
                                href="<?php echo e(route('site.home')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Home Page')); ?></a>
                        </li>
                        <li class="mb-12 light-gray fw-400">
                            <a
                                href="<?php echo e(route('site.about')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('About Us')); ?></a>
                        </li>
                        <li class="mb-12 light-gray fw-400">
                            <a
                                href="<?php echo e(route('site.lessons')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Lessons')); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="link-block quick-links">
                    <h6 class="dark-gray fw-800 mb-24"><?php echo e(\App\Helpers\TranslationHelper::translate('Quick Links')); ?>

                    </h6>
                    <ul class="footer-list list-unstyled">
                        <li class="mb-12 light-gray fw-400">
                            <a
                                href="<?php echo e(route('user.login.form')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Signup')); ?></a>
                        </li>
                        <li class="mb-12 light-gray fw-400">
                            <a
                                href="<?php echo e(route('user.login.form')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Login')); ?></a>
                        </li>
                        <li class="light-gray fw-400">
                            <a
                                href="<?php echo e(route('site.contact')); ?>"><?php echo e(\App\Helpers\TranslationHelper::translate('Contact')); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="link-block contact-block">
                    <h6 class="dark-gray fw-800 mb-24"><?php echo e(\App\Helpers\TranslationHelper::translate('Contact Us')); ?>

                    </h6>
                    <ul class="footer-list list-unstyled mb-32">
                        <li class="mb-16 d-flex align-items-center gap-12">
                            <a href="tel:123456987" class="d-flex align-items-center gap-12">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                </svg>
                                <?php echo e(\App\Models\Contact::first()->phone); ?>

                            </a>
                        </li>
                        <li class="mb-32">
                            <a href="mailto:info@example.com" class="d-flex align-items-center gap-12 subtitle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                                <?php echo e(\App\Models\Contact::first()->email); ?>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="hr-line mb-24 bg-light-gray"></div>
        <p class="bottom-bar light text-center">
            @2025
            <?php echo e(\App\Helpers\TranslationHelper::translate('All Rights Copyright')); ?>

            <a href="https://icode.hudurly.com/index" target="_blank" class="fw-700 color-sec"
                style="text-decoration: none;">
                iCode.
            </a>
            <?php echo e(\App\Helpers\TranslationHelper::translate('Design & Developed By')); ?>

            <a href="https://icode.hudurly.com/index" target="_blank" class="color-sec fw-700"
                style="text-decoration: none;">
                iCode
            </a>
        </p>

        
    </div>
</footer>
<?php /**PATH D:\xampp_new\htdocs\abdElHmidQuritem\resources\views/front/includes/footer.blade.php ENDPATH**/ ?>