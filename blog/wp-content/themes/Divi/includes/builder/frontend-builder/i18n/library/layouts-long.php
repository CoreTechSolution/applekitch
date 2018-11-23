<?php

//return array(
//	'Agency About Page'                      => esc_html__( 'Agency About Page', 'et_builder' ),
//	'Agency Blog Page'                       => esc_html__( 'Agency Blog Page', 'et_builder' ),
//	'Agency Contact Page'                    => esc_html__( 'Agency Contact Page', 'et_builder' ),
//	'Agency Home Page'                       => esc_html__( 'Agency Home Page', 'et_builder' ),
//	'Agency Landing Page'                    => esc_html__( 'Agency Landing Page', 'et_builder' ),
//	'Agency Portfolio Page'                  => esc_html__( 'Agency Portfolio Page', 'et_builder' ),
//	'Agency Pricing Page'                    => esc_html__( 'Agency Pricing Page', 'et_builder' ),
//	'Coffee Shop About Page'                 => esc_html__( 'Coffee Shop About Page', 'et_builder' ),
//	'Coffee Shop Blog Page'                  => esc_html__( 'Coffee Shop Blog Page', 'et_builder' ),
//	'Coffee Shop Contact Page'               => esc_html__( 'Coffee Shop Contact Page', 'et_builder' ),
//	'Coffee Shop Footer Page'                => esc_html__( 'Coffee Shop Footer Page', 'et_builder' ),
//	'Coffee Shop Guide Page'                 => esc_html__( 'Coffee Shop Guide Page', 'et_builder' ),
//	'Coffee Shop Home Page'                  => esc_html__( 'Coffee Shop Home Page', 'et_builder' ),
//	'Coffee Shop Landing Page'               => esc_html__( 'Coffee Shop Landing Page', 'et_builder' ),
//	'Coffee Shop Menu Page'                  => esc_html__( 'Coffee Shop Menu Page', 'et_builder' ),
//	'Coffee Shop Shop Page'                  => esc_html__( 'Coffee Shop Shop Page', 'et_builder' ),
//	'Copywriter About Page'                  => esc_html__( 'Copywriter About Page', 'et_builder' ),
//	'Copywriter Blog Page'                   => esc_html__( 'Copywriter Blog Page', 'et_builder' ),
//	'Copywriter Contact Page'                => esc_html__( 'Copywriter Contact Page', 'et_builder' ),
//	'Copywriter FAQ Page'                    => esc_html__( 'Copywriter FAQ Page', 'et_builder' ),
//	'Copywriter Home Page'                   => esc_html__( 'Copywriter Home Page', 'et_builder' ),
//	'Copywriter Landing Page'                => esc_html__( 'Copywriter Landing Page', 'et_builder' ),
//	'Copywriter Portfolio Page'              => esc_html__( 'Copywriter Portfolio Page', 'et_builder' ),
//	'Copywriter Pricing Page'                => esc_html__( 'Copywriter Pricing Page', 'et_builder' ),
//	'Copywriter Services Page'               => esc_html__( 'Copywriter Services Page', 'et_builder' ),
//	'Design Agency About Page'               => esc_html__( 'Design Agency About Page', 'et_builder' ),
//	'Design Agency Blog Page'                => esc_html__( 'Design Agency Blog Page', 'et_builder' ),
//	'Design Agency Case Study Page'          => esc_html__( 'Design Agency Case Study Page', 'et_builder' ),
//	'Design Agency Contact Page'             => esc_html__( 'Design Agency Contact Page', 'et_builder' ),
//	'Design Agency Home Page'                => esc_html__( 'Design Agency Home Page', 'et_builder' ),
//	'Design Agency Landing Page'             => esc_html__( 'Design Agency Landing Page', 'et_builder' ),
//	'Design Agency Portfolio Page'           => esc_html__( 'Design Agency Portfolio Page', 'et_builder' ),
//	'Design Agency Project Page 1'           => esc_html__( 'Design Agency Project Page 1', 'et_builder' ),
//	'Design Agency Project Page 2'           => esc_html__( 'Design Agency Project Page 2', 'et_builder' ),
//	'Digital Payments About Page'            => esc_html__( 'Digital Payments About Page', 'et_builder' ),
//	'Digital Payments Blog Page'             => esc_html__( 'Digital Payments Blog Page', 'et_builder' ),
//	'Digital Payments Contact Page'          => esc_html__( 'Digital Payments Contact Page', 'et_builder' ),
//	'Digital Payments Features Page'         => esc_html__( 'Digital Payments Features Page', 'et_builder' ),
//	'Digital Payments Home Page'             => esc_html__( 'Digital Payments Home Page', 'et_builder' ),
//	'Digital Payments Landing Page'          => esc_html__( 'Digital Payments Landing Page', 'et_builder' ),
//	'Digital Payments Pricing Page'          => esc_html__( 'Digital Payments Pricing Page', 'et_builder' ),
//	'Digital Payments Sign-Up Page'          => esc_html__( 'Digital Payments Sign-Up Page', 'et_builder' ),
//	'Farmers Market About Page'              => esc_html__( 'Farmers Market About Page', 'et_builder' ),
//	'Farmers Market Blog Page'               => esc_html__( 'Farmers Market Blog Page', 'et_builder' ),
//	'Farmers Market Contact Page'            => esc_html__( 'Farmers Market Contact Page', 'et_builder' ),
//	'Farmers Market Donate Page'             => esc_html__( 'Farmers Market Donate Page', 'et_builder' ),
//	'Farmers Market Events Page'             => esc_html__( 'Farmers Market Events Page', 'et_builder' ),
//	'Farmers Market Home Page'               => esc_html__( 'Farmers Market Home Page', 'et_builder' ),
//	'Farmers Market Landing Page'            => esc_html__( 'Farmers Market Landing Page', 'et_builder' ),
//	'Farmers Market Market Page'             => esc_html__( 'Farmers Market Market Page', 'et_builder' ),
//	'Fashion About Page'                     => esc_html__( 'Fashion About Page', 'et_builder' ),
//	'Fashion Blog Page'                      => esc_html__( 'Fashion Blog Page', 'et_builder' ),
//	'Fashion Contact Page'                   => esc_html__( 'Fashion Contact Page', 'et_builder' ),
//	'Fashion Designer Page'                  => esc_html__( 'Fashion Designer Page', 'et_builder' ),
//	'Fashion Gallery Page'                   => esc_html__( 'Fashion Gallery Page', 'et_builder' ),
//	'Fashion Home Page'                      => esc_html__( 'Fashion Home Page', 'et_builder' ),
//	'Fashion Landing Page'                   => esc_html__( 'Fashion Landing Page', 'et_builder' ),
//	'Fashion Shop Page'                      => esc_html__( 'Fashion Shop Page', 'et_builder' ),
//	'Florist About Page'                     => esc_html__( 'Florist About Page', 'et_builder' ),
//	'Florist Blog Page'                      => esc_html__( 'Florist Blog Page', 'et_builder' ),
//	'Florist Contact Page'                   => esc_html__( 'Florist Contact Page', 'et_builder' ),
//	'Florist Gallery Page'                   => esc_html__( 'Florist Gallery Page', 'et_builder' ),
//	'Florist Home Page'                      => esc_html__( 'Florist Home Page', 'et_builder' ),
//	'Florist Landing Page'                   => esc_html__( 'Florist Landing Page', 'et_builder' ),
//	'Florist Shop Page'                      => esc_html__( 'Florist Shop Page', 'et_builder' ),
//	'Interior Design Company About Page'     => esc_html__( 'Interior Design Company About Page', 'et_builder' ),
//	'Interior Design Company Blog Page'      => esc_html__( 'Interior Design Company Blog Page', 'et_builder' ),
//	'Interior Design Company Contact Page'   => esc_html__( 'Interior Design Company Contact Page', 'et_builder' ),
//	'Interior Design Company Home Page'      => esc_html__( 'Interior Design Company Home Page', 'et_builder' ),
//	'Interior Design Company Landing Page'   => esc_html__( 'Interior Design Company Landing Page', 'et_builder' ),
//	'Interior Design Company Portfolio Page' => esc_html__( 'Interior Design Company Portfolio Page', 'et_builder' ),
//	'Interior Design Company Services Page'  => esc_html__( 'Interior Design Company Services Page', 'et_builder' ),
//	'Interior Design Company Shop Page'      => esc_html__( 'Interior Design Company Shop Page', 'et_builder' ),
//	'LMS About Page'                         => esc_html__( 'LMS About Page', 'et_builder' ),
//	'LMS Blog Page'                          => esc_html__( 'LMS Blog Page', 'et_builder' ),
//	'LMS Contact Page'                       => esc_html__( 'LMS Contact Page', 'et_builder' ),
//	'LMS Course Page'                        => esc_html__( 'LMS Course Page', 'et_builder' ),
//	'LMS Courses Page'                       => esc_html__( 'LMS Courses Page', 'et_builder' ),
//	'LMS Home Page'                          => esc_html__( 'LMS Home Page', 'et_builder' ),
//	'LMS Landing Page'                       => esc_html__( 'LMS Landing Page', 'et_builder' ),
//	'LMS Marketing Page'                     => esc_html__( 'LMS Marketing Page', 'et_builder' ),
//	'LMS Pricing Page'                       => esc_html__( 'LMS Pricing Page', 'et_builder' ),
//	'Photo Marketplace About Page'           => esc_html__( 'Photo Marketplace About Page', 'et_builder' ),
//	'Photo Marketplace Categories Page'      => esc_html__( 'Photo Marketplace Categories Page', 'et_builder' ),
//	'Photo Marketplace Contact Page'         => esc_html__( 'Photo Marketplace Contact Page', 'et_builder' ),
//	'Photo Marketplace Home Page'            => esc_html__( 'Photo Marketplace Home Page', 'et_builder' ),
//	'Photo Marketplace Landing Page'         => esc_html__( 'Photo Marketplace Landing Page', 'et_builder' ),
//	'Photo Marketplace Pricing Page'         => esc_html__( 'Photo Marketplace Pricing Page', 'et_builder' ),
//	'Photo Marketplace Seller Page'          => esc_html__( 'Photo Marketplace Seller Page', 'et_builder' ),
//	'Restaurant About Page'                  => esc_html__( 'Restaurant About Page', 'et_builder' ),
//	'Restaurant Blog Page'                   => esc_html__( 'Restaurant Blog Page', 'et_builder' ),
//	'Restaurant Contact Page'                => esc_html__( 'Restaurant Contact Page', 'et_builder' ),
//	'Restaurant Gallery Page'                => esc_html__( 'Restaurant Gallery Page', 'et_builder' ),
//	'Restaurant Home Page'                   => esc_html__( 'Restaurant Home Page', 'et_builder' ),
//	'Restaurant Landing Page'                => esc_html__( 'Restaurant Landing Page', 'et_builder' ),
//	'Restaurant Shop Page'                   => esc_html__( 'Restaurant Shop Page', 'et_builder' ),
//	'Restaurant Team Page'                   => esc_html__( 'Restaurant Team Page', 'et_builder' ),
//	'SaaS Company About Page'                => esc_html__( 'SaaS Company About Page', 'et_builder' ),
//	'SaaS Company Careers Page'              => esc_html__( 'SaaS Company Careers Page', 'et_builder' ),
//	'SaaS Company Contact Page'              => esc_html__( 'SaaS Company Contact Page', 'et_builder' ),
//	'SaaS Company Documentation Page'        => esc_html__( 'SaaS Company Documentation Page', 'et_builder' ),
//	'SaaS Company Features Page'             => esc_html__( 'SaaS Company Features Page', 'et_builder' ),
//	'SaaS Company Landing Page'              => esc_html__( 'SaaS Company Landing Page', 'et_builder' ),
//	'SaaS Company Pricing Page'              => esc_html__( 'SaaS Company Pricing Page', 'et_builder' ),
//	'Travel Agency About Page'               => esc_html__( 'Travel Agency About Page', 'et_builder' ),
//	'Travel Agency Blog Page'                => esc_html__( 'Travel Agency Blog Page', 'et_builder' ),
//	'Travel Agency Contact Page'             => esc_html__( 'Travel Agency Contact Page', 'et_builder' ),
//	'Travel Agency Home Page'                => esc_html__( 'Travel Agency Home Page', 'et_builder' ),
//	'Travel Agency Landing Page'             => esc_html__( 'Travel Agency Landing Page', 'et_builder' ),
//	'Travel Agency Packages Page'            => esc_html__( 'Travel Agency Packages Page', 'et_builder' ),
//	'Travel Agency Shop Page'                => esc_html__( 'Travel Agency Shop Page', 'et_builder' ),
//	'Travel Agency Team Page'                => esc_html__( 'Travel Agency Team Page', 'et_builder' ),
//	'Web Agency Careers Page'                => esc_html__( 'Web Agency Careers Page', 'et_builder' ),
//	'Web Agency Contact Page'                => esc_html__( 'Web Agency Contact Page', 'et_builder' ),
//	'Web Agency Home Page'                   => esc_html__( 'Web Agency Home Page', 'et_builder' ),
//	'Web Agency Landing Page'                => esc_html__( 'Web Agency Landing Page', 'et_builder' ),
//	'Web Agency Portfolio Page'              => esc_html__( 'Web Agency Portfolio Page', 'et_builder' ),
//	'Web Agency Pricing Page'                => esc_html__( 'Web Agency Pricing Page', 'et_builder' ),
//	'Web Agency Services Page'               => esc_html__( 'Web Agency Services Page', 'et_builder' ),
//	'Wedding About Page'                     => esc_html__( 'Wedding About Page', 'et_builder' ),
//	'Wedding Blog Page'                      => esc_html__( 'Wedding Blog Page', 'et_builder' ),
//	'Wedding Contact Page'                   => esc_html__( 'Wedding Contact Page', 'et_builder' ),
//	'Wedding Details Page'                   => esc_html__( 'Wedding Details Page', 'et_builder' ),
//	'Wedding Gallery Page'                   => esc_html__( 'Wedding Gallery Page', 'et_builder' ),
//	'Wedding Home Page'                      => esc_html__( 'Wedding Home Page', 'et_builder' ),
//	'Yoga Studio About Page'                 => esc_html__( 'Yoga Studio About Page', 'et_builder' ),
//	'Yoga Studio Blog Page'                  => esc_html__( 'Yoga Studio Blog Page', 'et_builder' ),
//	'Yoga Studio Classes Page'               => esc_html__( 'Yoga Studio Classes Page', 'et_builder' ),
//	'Yoga Studio Contact Page'               => esc_html__( 'Yoga Studio Contact Page', 'et_builder' ),
//	'Yoga Studio Home Page'                  => esc_html__( 'Yoga Studio Home Page', 'et_builder' ),
//	'Yoga Studio Landing Page'               => esc_html__( 'Yoga Studio Landing Page', 'et_builder' ),
//	'Yoga Studio Team Page'                  => esc_html__( 'Yoga Studio Team Page', 'et_builder' ),
//);
