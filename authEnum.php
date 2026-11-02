<?php
// File: AuthProvider.php
//'google','facebook','twitter','linkedin','Instagram','tiktok'
enum AuthProvider: string
{
    case GOOGLE = 'google';
    case FACEBOOK = 'facebook';
    case TWITTER = 'twitter';
    case LINKEDIN = 'linkedin';
    case INSTAGRAM = 'Instagram';
    case TIKTOK = 'tiktok';
    // Add more providers as needed
}