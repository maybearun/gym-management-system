CREATE TABLE `Members` (
	`member_id` int(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`profile_picture` varchar(255) NOT NULL,
	`gender` enum('male','female','transgender') NOT NULL,
	`date_of_birth` DATE NOT NULL,
	`contact_number` int(10) NOT NULL UNIQUE,
	`alternate_contact_number` int(10) NOT NULL,
	`email_id` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`address_line_1` varchar(255) NOT NULL,
	`address_line_2` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`pincode` int(20) NOT NULL,
	`timestamp` TIMESTAMP(6) NOT NULL,
	PRIMARY KEY (`member_id`)
);

CREATE TABLE `Employees` (
	`employee_id` int(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`profile_picture` varchar(255) NOT NULL,
	`gender` enum('male','female','transgender') NOT NULL,
	`date_of_birth` DATE NOT NULL,
	`contact_number` int(10) NOT NULL UNIQUE,
	`alternate_contact_number` int(10) NOT NULL,
	`email_id` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`address_line_1` varchar(255) NOT NULL,
	`address_line_2` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`pincode` int(20) NOT NULL,
	`designation` varchar(255) NOT NULL,
	`joining_date` DATE NOT NULL,
	`retirement_date` DATE NOT NULL,
	`pan_card` varchar(255) NOT NULL,
	`aadhar_card` varchar(255) NOT NULL,
	`timestamp` TIMESTAMP(6) NOT NULL,
	PRIMARY KEY (`employee_id`)
);

CREATE TABLE `Products` (
	`product_id` int(11) NOT NULL AUTO_INCREMENT,
	`product_name` varchar(255) NOT NULL ,
	`product_type` varchar(255) NOT NULL,
	`product_description` varchar(255) NOT NULL,
	`product_image` varchar(255) NOT NULL,
	`product_price` FLOAT(11) NOT NULL,
	`discount` FLOAT(2),
	`product_quantity` int(11) NOT NULL,
	`timestamp` TIMESTAMP(6) NOT NULL,
	PRIMARY KEY (`product_id`)
);

CREATE TABLE `Member Attendance` (
	`member_id` int NOT NULL,
	`timestamp` TIMESTAMP NOT NULL
);

CREATE TABLE `Cart` (
	`member_id` int,
	`employee_id` int NOT NULL,
	`product_id` int NOT NULL
);

CREATE TABLE `Order_Details` (
	`order_detail_id` int NOT NULL AUTO_INCREMENT,
	`order_id` int NOT NULL,
	`product_id` int NOT NULL,
	`product_name` varchar(255) NOT NULL,
	`product_description` varchar(255) NOT NULL ,
	`product_type` varchar(255) NOT NULL,
	`product_img` varchar(255) NOT NULL ,
	`product_price` varchar(255) NOT NULL ,
	`timestamp` TIMESTAMP(6) NOT NULL ,
	PRIMARY KEY (`order_detail_id`)
);

CREATE TABLE `Order` (
	`order_id` int NOT NULL AUTO_INCREMENT,
	`member_id` int NOT NULL,
	`employee_id` int NOT NULL,
	`payment_mode` varchar(255) NOT NULL,
	`timestamp` TIMESTAMP(6) NOT NULL,
	PRIMARY KEY (`order_id`)
);

CREATE TABLE `Employee attendance` (
	`employee_id` int NOT NULL,
	`timestamp` TIMESTAMP NOT NULL,
	`check_in` TIMESTAMP NOT NULL,
	`check_out` TIMESTAMP NOT NULL
);

CREATE TABLE `Membership Plans` (
	`plan_id` int(11) NOT NULL,
	`plan_name` varchar(255) NOT NULL,
	`plan_description` varchar(255) NOT NULL,
	`plan_price` varchar(255) NOT NULL,
	`plan_validity` varchar(255) NOT NULL,
	`timestamp` TIMESTAMP(6) NOT NULL,
	PRIMARY KEY (`plan_id`)
);

CREATE TABLE `Member subscription` (
	`member_id` int NOT NULL,
	`plan_id` int NOT NULL,
	`plan_name` varchar(255) NOT NULL,
	`plan_description` varchar(255) NOT NULL,
	`plan_start_date` DATE NOT NULL,
	`plan_end_date` DATE NOT NULL,
	`timestamp` TIMESTAMP(6) NOT NULL
);

ALTER TABLE `Member Attendance` ADD  FOREIGN KEY (`member_id`) REFERENCES `Members`(`member_id`);

ALTER TABLE `Cart` ADD FOREIGN KEY (`member_id`) REFERENCES `Members`(`member_id`);

ALTER TABLE `Cart` ADD   FOREIGN KEY (`employee_id`) REFERENCES `Employees`(`employee_id`);

ALTER TABLE `Cart` ADD  FOREIGN KEY (`product_id`) REFERENCES `Products`(`product_id`);

ALTER TABLE `Order_Details` ADD  FOREIGN KEY (`order_id`) REFERENCES `Order`(`order_id`);

ALTER TABLE `Order_Details` ADD  FOREIGN KEY (`product_id`) REFERENCES `Products`(`product_id`);

ALTER TABLE `Order` ADD  FOREIGN KEY (`member_id`) REFERENCES `Members`(`member_id`);

ALTER TABLE `Order` ADD  FOREIGN KEY (`employee_id`) REFERENCES `Employees`(`employee_id`);

ALTER TABLE `Employee attendance` ADD  FOREIGN KEY (`employee_id`) REFERENCES `Employees`(`employee_id`);

ALTER TABLE `Member subscription` ADD  FOREIGN KEY (`member_id`) REFERENCES `Members`(`member_id`);

ALTER TABLE `Member subscription` ADD  FOREIGN KEY (`plan_id`) REFERENCES `Membership Plans`(`plan_id`);











