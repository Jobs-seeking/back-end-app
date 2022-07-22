CREATE TABLE `AddressInfo` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `city` varchar(255),
  `district` varchar(255),
  `ward` varchar(255),
  `detailAddress` varchar(500),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Accounts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `password` varchar(255),
  `access_token` varchar(255),
  `role` Enum('student', 'company'),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Students` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `address_id` int,
  `gender` Enum('Male','Female','Other'),
  `dob` date,
  `phone` varchar(10),
  `avatar` varchar(1000),
  `account_id` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Companies` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `address_id` int,
  `phone` varchar(10),
  `description` varchar(1000),
  `status` Enum('active' , 'unactive'),
  `image` varchar(1000),
  `account_id` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Jobs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `company_id` int,
  `job_type_id` int,
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `JobDetail` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `description` json,
  `required` json,
  `technical` json,
  `salary` double,
  `deadline` datetime,
  `job_id` int
);

CREATE TABLE `JobType` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `job_type` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `Applicants` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `job_id` int,
  `student_id` int,
  `level` Enum('Fresher', 'Junior', 'Senior'),
  `cv` varchar(1000),
  `cover_letter` varchar(1000),
  `created_at` datetime,
  `updated_at` datetime
);

CREATE TABLE `AdminAccounts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `password` varchar(255),
  `access_token` varchar(255),
  `created_at` datetime,
  `updated_at` datetime
);

ALTER TABLE `Students` ADD FOREIGN KEY (`address_id`) REFERENCES `AddressInfo` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Students` ADD FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Companies` ADD FOREIGN KEY (`address_id`) REFERENCES `AddressInfo` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Companies` ADD FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Jobs` ADD FOREIGN KEY (`company_id`) REFERENCES `Companies` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Jobs` ADD FOREIGN KEY (`job_type_id`) REFERENCES `JobType` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `JobDetail` ADD FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Applicants` ADD FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE `Applicants` ADD FOREIGN KEY (`student_id`) REFERENCES `Students` (`id`) ON UPDATE CASCADE ON DELETE CASCADE;
