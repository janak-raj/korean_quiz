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

/* Admin Login Details */
CREATE TABLE `admin_login_details` (
    logId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    userId int(11) NOT NULL,
    userStatus text(200) NOT NULL,
    lastLogin varchar(255) NOT NULL
);

/* Words */
CREATE TABLE `words` (
    wordId int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    word varchar(255) NOT NULL,
    nepaliMeaning varchar(255) NOT NULL,
    nepaliSyllable varchar(255) NOT NULL,
    englishMeaning text(255) NOT NULL,
    englishSyllable text(255) NOT NULL,
    category text(255) NOT NULL,
    isAddedToQuiz text(100) NOT NULL,
    addedDate varchar(255) NOT NULL
);