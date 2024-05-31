-- Create the database
CREATE DATABASE bookhaven;

-- Use the created database
USE bookhaven;

-- Create the users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(200) NOT NULL,
    username VARCHAR(200) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    address VARCHAR(200) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    password VARCHAR(225) NOT NULL,
    token VARCHAR(225) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    INDEX idx_login (username(100), email(100), password(100)) -- To optimize the login process using either username or email along with password
) CHARACTER SET utf8;

-- Create the donation_book table
CREATE TABLE donation_book (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(225),
    cover VARCHAR(225),
    author VARCHAR(100),
    publisher VARCHAR(100),
    ISBN VARCHAR(225) UNIQUE,
    book_description VARCHAR(225),
    category VARCHAR(100),
    status TINYINT DEFAULT 0
);

-- Create the donation_list table
CREATE TABLE donation_list (
    id INT PRIMARY KEY AUTO_INCREMENT,
    bookId INT,
    userId INT,
    method VARCHAR(100),
    token VARCHAR(225),
    FOREIGN KEY (bookId) REFERENCES donation_book(id),
    FOREIGN KEY (userId) REFERENCES users(id)
);

INSERT INTO `donation_book` (`id`, `name`, `cover`, `author`, `publisher`, `ISBN`, `book_description`, `category`) VALUES
(1, 'Animal Science: Biology and Technology', 'https://th.bing.com/th/id/R.9bc4b7a0e23b307498819de6e11d3157?rik=Uqhwh1H21YqASg&pid=ImgRaw&r=0', 'Robert M. Thorne', 'Pearson', '978-0132623896', 'Comprehensive introduction to animal science', 'Animal Science'),
(2, 'Animal Feeding and Nutrition', 'https://th.bing.com/th/id/R.9de36ce48a0322cc59716df0877b44ed?rik=lwo99je9%2fMKnqA&riu=http%3a%2f%2fwww.acsbookshop.com%2fdatabase%2fimages%2fanimal-feed-nutrition-pdf-ebook-main-5983-5983.jpg&ehk=zCeTwtxBhVUTiygv5VGMP6By322dM', 'Marshall H. Jurgens', 'Kendall Hunt Publishing', '978-0757591137', 'Detailed book on animal nutrition', 'Animal Science'),
(3, 'Principles of Animal Science', 'https://th.bing.com/th/id/R.973be8fd07e264e71bba04258c36a6ee?rik=IRvTQ3Cg9gHWQA&pid=ImgRaw&r=0', 'D. Jason Mollett', 'Cengage Learning', '978-1111138776', 'Overview of principles in animal science', 'Animal Science'),
(4, 'Agricultural Export and Marketing', 'https://th.bing.com/th/id/OIP.QjaX_Ngcbi2MwSPOWIkiawAAAA?pid=ImgDetMain', 'John J. Curry', 'ABC-CLIO', '978-1440835824', 'Insights into agricultural export marketing', 'Export Agriculture'),
(5, 'Export Agriculture: Practices and Strategies', 'https://th.bing.com/th/id/OIP.EVLmy9OZH7FfkCUZKlxj-gHaLO?rs=1&pid=ImgDetMain', 'Samuel A. Navarro', 'CRC Press', '978-1482232911', 'Strategies for successful agricultural export', 'Export Agriculture'),
(6, 'Sustainable Agriculture and Export', 'https://th.bing.com/th/id/R.8b4f6a1023b226f17b0bba3f37b22d2e?rik=r647zRlD9Tz2Jw&pid=ImgRaw&r=0', 'Sarah J. Trent', 'Springer', '978-3319676668', 'Sustainable practices in export agriculture', 'Export Agriculture'),
(7, 'Management: Tasks, Responsibilities, Practices', 'https://th.bing.com/th/id/OIP.USrwZg-W_mR2KFotNTBrlQHaJg?pid=ImgDetMain', 'Peter F. Drucker', 'Harper Business', '978-0060878979', 'Fundamental management principles by Peter Drucker', 'Management'),
(8, 'Principles of Management', 'https://th.bing.com/th/id/R.c0d3f18f70b5e1b8ad0ba6067da5e62a?rik=Sgnco9rs8JKBkw&pid=ImgRaw&r=0', 'Charles W. L. Hill', 'McGraw-Hill Education', '978-0078029463', 'Comprehensive principles of management', 'Management'),
(9, 'Management: An Introduction', 'https://th.bing.com/th/id/R.9ebc5dee84ffb3564618e78a975765f1?rik=auT46I3wYEF6FQ&pid=ImgRaw&r=0', 'David Boddy', 'Pearson', '978-1292088594', 'Introduction to management concepts and practices', 'Management'),
(10, 'Introduction to Applied Science', 'https://th.bing.com/th/id/R.3f6baa1619d474938f1b5186b73c5f02?rik=mVamDSiIwhF6DQ&pid=ImgRaw&r=0', 'James Trefil', 'Wiley', '978-1118955055', 'Introductory applied science concepts', 'Applied Science'),
(11, 'Applied Physics', 'https://th.bing.com/th/id/OIP.6ULWR9ZCff_BksErrMNlJwHaJ4?pid=ImgDetMain', 'Dale Ewen', 'Pearson', '978-0136116332', 'Fundamentals of applied physics', 'Applied Science'),
(12, 'Applied Chemistry', 'https://th.bing.com/th/id/OIP.hJFhXCDiIrPwJ2i5Pz0dmwHaJ5?pid=ImgDetMain', 'H. Stephen Stoker', 'Cengage Learning', '978-1111427109', 'Detailed exploration of applied chemistry', 'Applied Science'),
(13, 'Technology in Action', 'https://th.bing.com/th/id/OIP.biUL7SDg_2xdxp-W4plY1gHaHa?rs=1&pid=ImgDetMain', 'Alan Evans', 'Pearson', '978-0134289105', 'Comprehensive technology textbook', 'Technology'),
(14, 'Introduction to Information Technology', 'https://th.bing.com/th/id/OIP.68loNoX2AKqCdl_dzwO-QgHaLR?pid=ImgDetMain', 'Efraim Turban', 'Wiley', '978-0471073805', 'Introduction to IT concepts and practices', 'Technology'),
(15, 'Technology Ventures: From Idea to Enterprise', 'https://images-na.ssl-images-amazon.com/images/I/51j7-YE66SL.jpg', 'Richard C. Dorf', 'McGraw-Hill Education', '978-0073523423', 'Guidance on creating technology ventures', 'Technology'),
(16, 'Precision Agriculture Technology', 'https://th.bing.com/th/id/OIP.2_2hd8oWGgCy-7xXo7X73QHaLH?pid=ImgDetMain', 'Qin Zhang', 'CRC Press', '978-1439880579', 'Advanced precision agriculture technologies', 'Export Agriculture'),
(17, 'Managing Technology and Innovation', 'https://th.bing.com/th/id/R.3d7d2f724602c5e2e6ddbfab0e0b2892?rik=UjwquosYGjjTnQ&pid=ImgRaw&r=0', 'Robert Verburg', 'Routledge', '978-0415997817', 'Insights into managing technology and innovation', 'Management'),
(18, 'Animal Genetics and Breeding', 'https://th.bing.com/th/id/R.e9f76783ab09fa04a736aee8dc093393?rik=oP9epUabA4XGFA&pid=ImgRaw&r=0', 'J. Van der Werf', 'CABI', '978-1780649750', 'Comprehensive guide to animal genetics', 'Animal Science'),
(19, 'Sustainable Food Production', 'https://th.bing.com/th/id/R.c072a0b21cb454c9f2437a57ea890186?rik=l0Mgxfd6M3zC5g&pid=ImgRaw&r=0', 'Paul Christou', 'Springer', '978-1493928002', 'Methods for sustainable food production', 'Export Agriculture'),
(20, 'Applied Materials Science', 'https://th.bing.com/th/id/OIP.RkXooIRVfjODmy-trvjQHwAAAA?pid=ImgDetMain', 'Deborah D.L. Chung', 'CRC Press', '978-0849317912', 'Materials science applications and principles', 'Applied Science');