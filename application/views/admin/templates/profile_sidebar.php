<div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Dashboard') { ?> active<?php } ?>" href="<?= base_url('/admin'); ?>">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Users') { ?> active<?php } ?>" href="<?= base_url('/admin/users'); ?>">
                <span data-feather="users"></span>
                Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'User Roles') { ?> active<?php } ?>" href="<?= base_url('/admin/user_roles'); ?>">
                <span data-feather="user"></span>
                User Roles
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Membership Plans') { ?> active<?php } ?>" href="<?= base_url('/admin/membership_plans'); ?>">
                <span data-feather="info"></span>
                Membership Plans
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Grades' || $title == 'Add Grade') { ?> active<?php } ?>" href="<?= base_url('/admin/grade'); ?>">
                <span data-feather="feather"></span>
                Grade
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Subjects' || $title == 'Add Subject') { ?> active<?php } ?>" href="<?= base_url('/admin/subjects'); ?>">
                <span data-feather="book"></span>
                Subject
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Category' || $title == 'Add Category') { ?> active<?php } ?>" href="<?= base_url('/admin/category'); ?>">
                <span data-feather="list"></span>
                Category
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Topics' || $title == 'Add Topic') { ?> active<?php } ?>" href="<?= base_url('/admin/topics'); ?>">
                <span data-feather="list"></span>
                Topic
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if($title == 'Questions' || $title == 'Add Question' || $title == 'Add Question Type') { ?> active<?php } ?>" href="<?= base_url('/admin/questions'); ?>">
                <span data-feather="help-circle"></span>
                Questions
            </a>
        </li>
    </ul>
</div>