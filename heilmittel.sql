CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tbl_appointment` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(80) NULL,
  `age` SMALLINT  NULL,
  `gender` varchar(20) NOT NULL,
  `date_of_appointment` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;