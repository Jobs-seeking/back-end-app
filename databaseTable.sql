CREATE TABLE `Users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `password` varchar(255),
  `name` varchar(100),
  `dob` date,
  `phone` varchar(10),
  `description` varchar(1000),
  `address` varchar(255),
  `status` Enum('active' , 'unactive'),
  `role` Enum('student', 'company', 'admin'),
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
  `year_experience` int,
  `cv` varchar(1000),
  `cover_letter` varchar(1000),
  `created_at` datetime,
  `updated_at` datetime
);

ALTER TABLE `Jobs` ADD FOREIGN KEY (`company_id`) REFERENCES `Users` (`id`);

ALTER TABLE `Jobs` ADD FOREIGN KEY (`job_type_id`) REFERENCES `JobType` (`id`);

ALTER TABLE `JobDetail` ADD FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`id`);

ALTER TABLE `Applicants` ADD FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`id`);

ALTER TABLE `Applicants` ADD FOREIGN KEY (`student_id`) REFERENCES `Users` (`id`);
