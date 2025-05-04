-- Database: tp_mvc

CREATE DATABASE IF NOT EXISTS tp_mvc;
USE tp_mvc;

-- Table structure for `students`
CREATE TABLE IF NOT EXISTS `students` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `nim` VARCHAR(50) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `join_date` DATE NOT NULL
);

-- Add new attributes to `students`
ALTER TABLE `students`
ADD COLUMN `email` VARCHAR(255) NOT NULL,
ADD COLUMN `address` TEXT NOT NULL;

-- Create `courses` table
CREATE TABLE IF NOT EXISTS `courses` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL
);

-- Create `enrollments` table
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  FOREIGN KEY (`student_id`) REFERENCES `students`(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE
);

-- Insert dummy data into `students`
INSERT INTO `students` (`name`, `nim`, `phone`, `join_date`, `email`, `address`) VALUES
('Rahmat', 'NIM001', '1234567890', '2023-01-15', 'rahmat@example.com', '123 Geger Arum St'),
('Dapis', 'NIM002', '0987654321', '2023-02-20', 'Dapis@example.com', '456 Geger Kalong St'),
('Rexy', 'NIM003', '1122334455', '2023-03-10', 'Rexy@example.com', 'Jl. Sersan ');

-- Insert dummy data into `courses`
INSERT INTO `courses` (`name`, `description`) VALUES
('Computer Science', 'An introductory course on Computer Science'),
('Computer Science', 'Data Structures and Algorithms'),
('Computer Science', 'Database Management Systems');

-- Insert dummy data into `enrollments`
INSERT INTO `enrollments` (`student_id`, `course_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 1),
(3, 3);