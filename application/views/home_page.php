<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'templates/header.php';
?>
    <div class="wrapper2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Practice Maths and English Skills Now</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <form method="post" action="">
                        <div class="row row1">
                            <div class="col-lg-4">
                                <label>I am in Year</label>
                            </div>
                            <div class="col-lg-8">
                                <select class="form-control" name="age">
                                    <option value="">Select Your Age</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row1">
                            <div class="col-lg-4">
                                <label>Want to Practice</label>
                            </div>
                            <div class="col-lg-8">
                                <select class="form-control" name="practice">
                                    <option value="">Math</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row1">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <input type="submit" class="form-control" name="take_the_test" value="Take the Test">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="down-arrow"><a id="button" href="javascript:void(0);"><img src="<?php echo base_url('/assets/images/down-arrow.png'); ?>"></a></div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div id="wrapper3" class="wrapper3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Different Course Categories</h1>
                    <h2>Practise <span>Maths & English</span> | Primary & Secondary</h2>
                </div>
            </div>
            <div class="row row1">
                <div class="col-lg-3">
                    <div class="circleWrap1">
                        <h3>Reception</h3>
                        <p class="circleWrap1-p">Here is a list of English and Math skills students learn in reception! These skills are organised into categories.</p>
                        <div class="circleWrap1-div">
                            <a href="<?php echo base_url('frontend/grade/reception/math'); ?>"><p>Maths<br><small><?php echo get_question_count('','math','reception'); ?> Skills</small></p></a>
                            <a href="<?php echo base_url('frontend/grade/reception/english'); ?>"><p>English<br><small><?php echo get_question_count('','english','reception'); ?> Skills</small></p></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap2">
                        <h3>Year 1</h3>
                        <p class="circleWrap2-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap2-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap3">
                        <h3>Year 2</h3>
                        <p class="circleWrap3-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap3-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap4">
                        <h3>Year 3</h3>
                        <p class="circleWrap4-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap4-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row2">
                <div class="col-lg-3">
                    <div class="circleWrap5">
                        <h3>Year 4</h3>
                        <p class="circleWrap5-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap5-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap6">
                        <h3>Year 5</h3>
                        <p class="circleWrap6-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap6-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap7">
                        <h3>Year 6</h3>
                        <p class="circleWrap7-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap7-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap8">
                        <h3>Year 7</h3>
                        <p class="circleWrap8-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap8-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row3">
                <div class="col-lg-3">
                    <div class="circleWrap9">
                        <h3>Year 8</h3>
                        <p class="circleWrap9-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap9-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap10">
                        <h3>Year 9</h3>
                        <p class="circleWrap10-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap10-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap11">
                        <h3>Year 10</h3>
                        <p class="circleWrap11-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap11-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="circleWrap12">
                        <h3>Year 11</h3>
                        <p class="circleWrap12-p">Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</p>
                        <div class="circleWrap12-div">
                            <p>Maths<br><small>330 Skills</small></p>
                            <p>English<br><small>112 Skills</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="wrapper4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="wrapper4-content-wrap">
                        <h1>Academy for Kitch</h1>
                        <h2>Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-wrap">
                        <div class="video"><img src="<?php echo base_url('/assets/images/video.jpg'); ?>"></div>
                        <div class="play-btn"><a href="javascript:void(0);"><img src="<?php echo base_url('/assets/images/play-btn.png'); ?>"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="wrapper5">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <h1>Give your child a positive early <br>introduction to the world of Maths</h1>
                    <h2>Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</h2>
                    <p class="get-started"><a href="javascript:void(0);">Get Started Now</a></p>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>
    <!---->
    <div class="wrapper6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Membership Plans</h1>
                    <h2>Explore the benefits of becoming an IXL member!</h2>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="wrapper7">
        <div class="wrapper7-left">
            <ul>
                <li class=""></li>
                <li class=""></li>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/awards.png'); ?>"></div>
                    <h2>Awards</h2>
                    <p>Embark on a virtual treasure hunt as you tackle maths challenges and reveal fun prizes. The more you practise, the more you win!</p>
                </li>
                <li class=""></li>
            </ul>
        </div>
        <div class="wrapper7-right">
            <ul>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/national-carriculum.png'); ?>"></div>
                    <h2>National curriculum</h2>
                    <p>With IXL, it's easy to meet your learning objectives! All of IXL's skills are aligned with the national curricula in the UK.</p>
                </li>
                <li class=""></li>
                <li class=""></li>
                <li class="">
                    <div class="featured-icons"><img src="<?php echo base_url('/assets/images/analytics.png'); ?>"></div>
                    <h2>Analytics</h2>
                    <p>Get unprecedented insight into student performance with IXL Analytics. View real-time data on usage, trouble spots and more!</p>
                </li>
            </ul>
        </div>
    </div>
    <!---->
    <div class="wrapper8">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Our Happy clients</h1>
                    <h2>What they say about us</h2>
                </div>
            </div>
            <div class="row testimonials-row">
                <div class="col-lg-12">
                    <div class="testimonials">
                        <div>
                            <div class="testimonials-wrapper">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="client-profile"><img src="<?php echo base_url('/assets/images/client-profile.png'); ?>"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="client-comment">Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                                        <p class="client-name">Luisa Extnsa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="testimonials-wrapper">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="client-profile"><img src="<?php echo base_url('/assets/images/client-profile.png'); ?>"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="client-comment">Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                                        <p class="client-name">Luisa Extnsa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="testimonials-wrapper">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="client-profile"><img src="<?php echo base_url('/assets/images/client-profile.png'); ?>"></div>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="client-comment">Pri quas audiam virtute ut, case utamur fuisset eam ut, iisque accommodare an eam. Reque blandit qui eu, cu vix nonumy volumus. Legendos intellegam id usu, vide oporteat vix eu, id illud principes has. Nam tempor utamur gubergren no.</p>
                                        <p class="client-name">Luisa Extnsa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="wrapper9">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <h1>Give your child a positive early <br>introduction to the world of Maths</h1>
                    <h2>Adding and subtracting, telling time, measurement, categories, nouns, verb tense, time order and more.</h2>
                    <p class="get-started"><a href="javascript:void(0);">Get Started Now</a></p>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
?>