--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `description`, `email`, `phone`, `address`, `image_id`) VALUES
(1, 'John', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum nisl enim, vitae placerat lorem dapibus ut. Ut lacinia ultrices convallis. Nam tristique sapien sed mollis mattis. Donec at facilisis lacus. Cras condimentum rhoncus sem lacinia congue. Nam egestas vulputate ipsum, viverra vehicula diam rutrum nec. Quisque commodo vehicula urna vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vehicula ex vel risus rutrum sodales. Sed consequat augue ac dui ornare, at aliquet lectus interdum. Nullam sed erat eget ex eleifend sagittis. Vestibulum tristique, neque et cursus blandit, nisi justo hendrerit diam, a condimentum dolor lacus ac elit.\r\n\r\nSuspendisse non fringilla nunc. Vestibulum ornare quis sem eu sollicitudin. Nam porta, eros sed aliquet varius, sapien est tempus orci, eu fermentum tortor augue in tortor. Curabitur faucibus pellentesque accumsan. Sed nec magna ut quam consectetur rutrum ac quis ante. Quisque lectus lorem, malesuada a porta non, laoreet quis urna. Aliquam lorem leo, accumsan ut bibendum eget, venenatis ac diam. Curabitur feugiat diam interdum, mattis quam quis, suscipit purus. Nunc convallis rutrum elit ac pharetra. Nunc eu tellus venenatis, dapibus mauris at, dignissim elit. Aliquam consectetur, dolor eu rhoncus tristique, mauris risus suscipit dolor, eget pharetra dolor orci id neque. Aenean vel metus ac dolor semper consectetur nec tincidunt nisi. Mauris a purus augue. Maecenas id imperdiet urna, sit amet convallis ipsum.\r\n\r\nNulla facilisi. In sed urna quis nunc finibus porta. Pellentesque euismod turpis id sollicitudin pretium. Integer ante leo, efficitur sit amet ultrices ac, pulvinar varius sapien. In vel consectetur orci. Donec eu lacus eget diam pharetra laoreet. Morbi et consequat mi. Ut ut purus non sapien interdum luctus. Pellentesque sit amet vulputate dolor. Donec in imperdiet metus, vitae commodo magna. Fusce pharetra laoreet felis eu imperdiet. Pellentesque maximus nunc accumsan elit euismod molestie. Donec id erat dictum, vestibulum velit non, placerat leo.', 'john@gmail.com', '+459 (632) 433-9307', '123 fake street, Dublin', 1),
(2, 'Bob', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum nisl enim, vitae placerat lorem dapibus ut. Ut lacinia ultrices convallis. Nam tristique sapien sed mollis mattis. Donec at facilisis lacus. Cras condimentum rhoncus sem lacinia congue. Nam egestas vulputate ipsum, viverra vehicula diam rutrum nec. Quisque commodo vehicula urna vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vehicula ex vel risus rutrum sodales. Sed consequat augue ac dui ornare, at aliquet lectus interdum. Nullam sed erat eget ex eleifend sagittis. Vestibulum tristique, neque et cursus blandit, nisi justo hendrerit diam, a condimentum dolor lacus ac elit.\r\n\r\nSuspendisse non fringilla nunc. Vestibulum ornare quis sem eu sollicitudin. Nam porta, eros sed aliquet varius, sapien est tempus orci, eu fermentum tortor augue in tortor. Curabitur faucibus pellentesque accumsan. Sed nec magna ut quam consectetur rutrum ac quis ante. Quisque lectus lorem, malesuada a porta non, laoreet quis urna. Aliquam lorem leo, accumsan ut bibendum eget, venenatis ac diam. Curabitur feugiat diam interdum, mattis quam quis, suscipit purus. Nunc convallis rutrum elit ac pharetra. Nunc eu tellus venenatis, dapibus mauris at, dignissim elit. Aliquam consectetur, dolor eu rhoncus tristique, mauris risus suscipit dolor, eget pharetra dolor orci id neque. Aenean vel metus ac dolor semper consectetur nec tincidunt nisi. Mauris a purus augue. Maecenas id imperdiet urna, sit amet convallis ipsum.\r\n\r\nNulla facilisi. In sed urna quis nunc finibus porta. Pellentesque euismod turpis id sollicitudin pretium. Integer ante leo, efficitur sit amet ultrices ac, pulvinar varius sapien. In vel consectetur orci. Donec eu lacus eget diam pharetra laoreet. Morbi et consequat mi. Ut ut purus non sapien interdum luctus. Pellentesque sit amet vulputate dolor. Donec in imperdiet metus, vitae commodo magna. Fusce pharetra laoreet felis eu imperdiet. Pellentesque maximus nunc accumsan elit euismod molestie. Donec id erat dictum, vestibulum velit non, placerat leo.', 'bob@gmail.com', '+245 (442) 254-1331', '456 main street Dublin' , 2),
(3, 'Sam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum nisl enim, vitae placerat lorem dapibus ut. Ut lacinia ultrices convallis. Nam tristique sapien sed mollis mattis. Donec at facilisis lacus. Cras condimentum rhoncus sem lacinia congue. Nam egestas vulputate ipsum, viverra vehicula diam rutrum nec. Quisque commodo vehicula urna vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vehicula ex vel risus rutrum sodales. Sed consequat augue ac dui ornare, at aliquet lectus interdum. Nullam sed erat eget ex eleifend sagittis. Vestibulum tristique, neque et cursus blandit, nisi justo hendrerit diam, a condimentum dolor lacus ac elit.\r\n\r\nSuspendisse non fringilla nunc. Vestibulum ornare quis sem eu sollicitudin. Nam porta, eros sed aliquet varius, sapien est tempus orci, eu fermentum tortor augue in tortor. Curabitur faucibus pellentesque accumsan. Sed nec magna ut quam consectetur rutrum ac quis ante. Quisque lectus lorem, malesuada a porta non, laoreet quis urna. Aliquam lorem leo, accumsan ut bibendum eget, venenatis ac diam. Curabitur feugiat diam interdum, mattis quam quis, suscipit purus. Nunc convallis rutrum elit ac pharetra. Nunc eu tellus venenatis, dapibus mauris at, dignissim elit. Aliquam consectetur, dolor eu rhoncus tristique, mauris risus suscipit dolor, eget pharetra dolor orci id neque. Aenean vel metus ac dolor semper consectetur nec tincidunt nisi. Mauris a purus augue. Maecenas id imperdiet urna, sit amet convallis ipsum.\r\n\r\nNulla facilisi. In sed urna quis nunc finibus porta. Pellentesque euismod turpis id sollicitudin pretium. Integer ante leo, efficitur sit amet ultrices ac, pulvinar varius sapien. In vel consectetur orci. Donec eu lacus eget diam pharetra laoreet. Morbi et consequat mi. Ut ut purus non sapien interdum luctus. Pellentesque sit amet vulputate dolor. Donec in imperdiet metus, vitae commodo magna. Fusce pharetra laoreet felis eu imperdiet. Pellentesque maximus nunc accumsan elit euismod molestie. Donec id erat dictum, vestibulum velit non, placerat leo.', 'sam@gmail.com', '+69 (972) 926-0230', '765 Back street Meath' , 3),
(4, 'Josh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum nisl enim, vitae placerat lorem dapibus ut. Ut lacinia ultrices convallis. Nam tristique sapien sed mollis mattis. Donec at facilisis lacus. Cras condimentum rhoncus sem lacinia congue. Nam egestas vulputate ipsum, viverra vehicula diam rutrum nec. Quisque commodo vehicula urna vel vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed vehicula ex vel risus rutrum sodales. Sed consequat augue ac dui ornare, at aliquet lectus interdum. Nullam sed erat eget ex eleifend sagittis. Vestibulum tristique, neque et cursus blandit, nisi justo hendrerit diam, a condimentum dolor lacus ac elit.\r\n\r\nSuspendisse non fringilla nunc. Vestibulum ornare quis sem eu sollicitudin. Nam porta, eros sed aliquet varius, sapien est tempus orci, eu fermentum tortor augue in tortor. Curabitur faucibus pellentesque accumsan. Sed nec magna ut quam consectetur rutrum ac quis ante. Quisque lectus lorem, malesuada a porta non, laoreet quis urna. Aliquam lorem leo, accumsan ut bibendum eget, venenatis ac diam. Curabitur feugiat diam interdum, mattis quam quis, suscipit purus. Nunc convallis rutrum elit ac pharetra. Nunc eu tellus venenatis, dapibus mauris at, dignissim elit. Aliquam consectetur, dolor eu rhoncus tristique, mauris risus suscipit dolor, eget pharetra dolor orci id neque. Aenean vel metus ac dolor semper consectetur nec tincidunt nisi. Mauris a purus augue. Maecenas id imperdiet urna, sit amet convallis ipsum.\r\n\r\nNulla facilisi. In sed urna quis nunc finibus porta. Pellentesque euismod turpis id sollicitudin pretium. Integer ante leo, efficitur sit amet ultrices ac, pulvinar varius sapien. In vel consectetur orci. Donec eu lacus eget diam pharetra laoreet. Morbi et consequat mi. Ut ut purus non sapien interdum luctus. Pellentesque sit amet vulputate dolor. Donec in imperdiet metus, vitae commodo magna. Fusce pharetra laoreet felis eu imperdiet. Pellentesque maximus nunc accumsan elit euismod molestie. Donec id erat dictum, vestibulum velit non, placerat leo.', 'josh@gmail.com', '+54 (827) 218-6146', '13 Abbey street', 4),

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`) VALUES
(1, 'assets/img/01.jpg'),
(2, 'assets/img/02.jpg'),
(3, 'assets/img/03.jpg'),
(4, 'assets/img/04.jpg'),
(5, 'assets/img/05.jpg'),
(6, 'assets/img/06.jpg'),
(7, 'assets/img/07.jpg'),
(8, 'assets/img/08.jpg'),
(9, 'assets/img/09.jpg'),
(10, 'assets/img/10.jpg'),
(11, 'assets/img/11.jpg'),
(12, 'assets/img/12.jpg'),
(13, 'assets/img/13.jpg'),
(14, 'assets/img/14.jpg'),
(15, 'assets/img/15.jpg'),
(16, 'assets/img/16.jpg');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_image_fk` (`image_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

-- --------------------------------------------------------

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_image_fk` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`);

-- --------------------------------------------------------