-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 06:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpath_exercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `correct_answer`) VALUES
(1, 'HTML: <div>Sample Text</div> XPath: Select all `div` elements in the document.', '//div'),
(2, 'HTML: <input type=\"text\" name=\"username\"> XPath: Select all `input` elements where the `type` attribute is \"text\".', '//input[@type=\"text\"]'),
(3, 'HTML: <span class=\"highlight\">Important</span> XPath: Select all `span` elements with the class \"highlight\".', '//span[@class=\"highlight\"]'),
(4, 'HTML: <p id=\"uniqueId\">Unique Paragraph</p> XPath: Select the element with the ID \"uniqueId\".', '//*[@id=\"uniqueId\"]'),
(5, 'HTML: <ul><li>Item 1</li><li>Item 2</li><li>Item 3</li></ul> XPath: Select all `li` elements that are children of `ul`.', '//ul/li'),
(6, 'HTML: <div><p>Paragraph 1</p><p>Paragraph 2</p></div> XPath: Select all `p` elements that are children of a `div`.', '//div/p'),
(7, 'HTML: <ol><li>First</li><li>Second</li><li>Third</li></ol> XPath: Select the second `li` element in an ordered list.', '//ol/li[2]'),
(8, 'HTML: <button type=\"submit\" class=\"btn primary\">Submit</button> XPath: Select all `button` elements with `type=\"submit\"` and `class=\"btn primary`.', '//button[@type=\"submit\" and @class=\"btn primary\"]'),
(9, 'HTML: <a href=\"https://www.example.com\">Example</a> XPath: Select all `a` elements with `href` containing \"example.com\".', '//a[contains(@href, \"example.com\")]'),
(10, 'HTML: <h1>Welcome to My Website</h1> XPath: Select the `h1` element with text \"Welcome to My Website\".', '//h1[text()=\"Welcome to My Website\"]'),
(11, 'HTML: <div><h2>Title</h2><p>First paragraph</p><p>Second paragraph</p></div> XPath: Select all `p` elements that are siblings following an `h2` element.', '//h2/following-sibling::p'),
(12, 'HTML: <div><span>Child Span</span></div> XPath: Select all `span` elements that are children of a `div`.', '//div/span'),
(13, 'HTML: <img src=\"image1.jpg\"><img src=\"image2.jpg\"><img src=\"thumbnail.jpg\"> XPath: Select all `img` elements with `src` starting with \"image\".', '//img[starts-with(@src, \"image\")]'),
(14, 'HTML: <input type=\"text\" name=\"email\" class=\"input-field\"> XPath: Select all `input` elements with `type=\"text\"`, `name=\"email\"`, and `class=\"input-field`.', '//input[@type=\"text\" and @name=\"email\" and @class=\"input-field\"]'),
(15, 'HTML: <ul><li>First item</li><li>Second item</li><li>Third item</li></ul> XPath: Select the last `li` element in a list.', '(//ul/li)[last()]'),
(16, 'HTML: <div><p>Paragraph 1</p><p>Paragraph 2 <span>with span</span></p></div> XPath: Select all `p` elements that have a `span` child element.', '//p[span]'),
(17, 'HTML: <div><p class=\"intro\">Introduction</p><p>Main content</p></div> XPath: Select `p` elements with class \"intro\" or text \"Main content\".', '//p[@class=\"intro\"] | //p[text()=\"Main content\"]'),
(18, 'HTML: <div><p>First paragraph</p><p>Second paragraph</p></div> XPath: Select all `p` elements that have a preceding sibling `p` element.', '//p[preceding-sibling::p]'),
(19, 'HTML: <div><p>First paragraph</p><p>Second paragraph</p></div> XPath: Select all `p` elements that have a following sibling `p` element.', '//p[following-sibling::p]'),
(20, 'HTML: <div><span>Child Span</span></div> XPath: Select the parent `div` element of a `span`.', '//span/parent::div');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
