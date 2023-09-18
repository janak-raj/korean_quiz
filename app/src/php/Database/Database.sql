/* Users */
CREATE TABLE `users` (
    userId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fullname text(200) NOT NULL,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    regDate varchar(255) NOT NULL,
    userStatus text(200) NOT NULL,
    emailStatus text(200) NOT NULL
);

/* Login Details */
CREATE TABLE `login_details` (
    logId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    userId int(11) NOT NULL,
    userStatus text(200) NOT NULL,
    lastLogin varchar(255) NOT NULL
);

/* Admins */
CREATE TABLE `admins` (
    adminId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    fullname text(200) NOT NULL,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    regDate varchar(255) NOT NULL
);

/* Profile Images */
CREATE TABLE `profile_images` (
    profileImageId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    userId int(11) NOT NULL,
    imageName text(255) NOT NULL,
    imageUploadDate varchar(255) NOT NULL
);

/* User Details */
CREATE TABLE `user_details` (
    userDetailsId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    userId int(11) NOT NULL,
    phoneNumber int(11) NOT NULL,
    address varchar(255) NOT NULL,
    state text(255) NOT NULL,
    zipcode int(11) NOT NULL,
    country text(200) NOT NULL,
    language text(200) NOT NULL,
    lastUpdatedDate varchar(255) NOT NULL
);