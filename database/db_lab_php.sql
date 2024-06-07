CREATE DATABASE 'db_lab_php';

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` enum('News','Food','Fashion') NOT NULL,
  `content` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `blogs` (`id`, `title`, `category`, `content`, `image`) VALUES
(1, 'food blog', 'Food', 'Juicy, golden-crusted chicken breasts laying in a bed of creamy sauce that has been laced with garlic and thyme is just something everyone should have in their recipe repertoire. This chicken is so, so good.\r\n\r\nIt took some encouragement to try it, but the first time my 3-year-old daughter took a bite of the chicken coated in a bit of sauce, she opened her hands, tipped her head to the sky, and closed her eyes in bliss. Me too, girl. Me too.\r\n\r\nMarry Me Chicken has been around for a while, but this month has been my first time trying it. The original version pan fries the chicken in the same pan as the sauce – and this makes sense in theory, but you guys, I just love the air fryer chicken. It tastes better. It’s more consistent and reliable. It’s juicy and it’s got great flavor, exterior texture, and color. It’s hands-off. It’s just about the only way that I make chicken now. I’m willing to wash one extra dish (the air fryer basket) in favor of having my favorite juicy chicken with the', '../database/images/Meats.jpg'),
(2, 'food blog 2 ', 'Food', 'Do I always talk about Ang or do I always talk about Ang?\r\n\r\nReally, all my favorite food ideas come from Ang. Texas style chili, chicken wraps, and the famous tortellini soup.\r\n\r\nI got a text a few weeks ago from Ang with a photo of her sandwich – like friends do – which was layers of roast beef, arugula, havarti, and horseradish aioli on the caramelized onion focaccia from Trader Joe’s. I spent at least 10 minutes just zoomed in on the photo, examining every saucy detail. Then I went and immediately made one for myself.\r\n\r\nI was feeling called to a no-beef-but-still-beefy mushroom version, and it is beyond.\r\n\r\nThat horseradish aioli is pulled from the old fave portobello French dip recipe (5 star, so good), and the roasty mushrooms, havarti, and arugula create layers of flavor that were just meant to be together. It might be over the top, but I also like a shmear of pesto rosso on the bottom of the focaccia so you can get a little tomatoey brightness in the mix.\r\n\r\nPlease go sink you', '../database/images/LambRavioli.jpg'),
(3, 'news blog', 'News', 'SERIAL is back! Oh boy! The podcast that introduced a host of listeners to the medium last year with its 12-episode true crime series about the 1999 murder of Maryland high school student Hae Min Lee has just released the second episode of its second season. In the year since Serial has launched, some tantalizing questions have lingered: Are podcasts the next great storytelling platform? And: should we all be recording podcasts, too?\r\n\r\nIt’s the golden age of podcasting, and the format is open to anyone with a laptop, a microphone, and access to a web server. A host of audio producers, many trained by Ira Glass, are creating narrative series with the same quality and creativity as the 20-year-old radio documentary show This American Life. Media companies from TED to The New York Times are piloting shows. Businesses are testing them out as content marketing. And hell, if you want to make a podcast about your stamp-collecting obsession, you can do it. Surely there’s money to be made—and ', '../database/images/newsblog.jpeg'),
(4, 'News blog 2', 'News', 'The mashup of diverse landscapes begins rolling past your car window within 30 minutes of departing San Luis Potosí, the capital city of the Mexican state of the same name. Sturdy pines grow tall beside desert cacti, poking through a blanket of fog adorning the Sierra Madre mountains.\r\n\r\nPassing through the towering peaks as you drive east and committing to at least a few scenic road-trip hours is the only way for international visitors to reach the surreal land and waters of La Huasteca Potosina in east-central Mexico.\r\n\r\nIt’s no wonder why this mountainous region – a collection of roughly 20 municipalities and small towns – has evolved into an epicenter of outdoor adventure in an area traditionally inhabited by the Huastec people (also known today as the Teenek).\r\n\r\nThe remote landscapes of La Huasteca Potosina – part of the larger La Huasteca region spanning multiple states – include vast desert, lush mountains and rainforest nooks with turquoise rivers and waterfalls. And the attra', '../database/images/newsblog2.jpeg'),
(5, 'Fashion blog', 'Fashion', 'Want to know the secret to nailing transitional dressing? We’re going to let you in on an insider tip: it’s all about the jacket. Get that right and everything else will fall into place.\r\n\r\nOuterwear often gets overlooked in the spring, but it shouldn’t. People are so desperate for it to be summer that they underdress and end up uncomfortable. Either that or they go the other way and sweat through the transitional months in a winter coat that’s overkill for the changing temperatures.\r\n\r\nThe solution: invest in a tried-and-tested transitional jacket that’s built for spring conditions. We’re talking mid-weight, short length and good for layering up or down. Tick all of these boxes and you’ll breeze through spring and beyond in style. Curious? Here are a few of our favourite spring jacket silhouettes for your consideration.\r\n\r\nSuede Jacket\r\n\r\n Pini Parma Stone Soft Suede Bomber Jacket\r\n\r\n Velasca Compiano\r\n\r\n Wax London Eldon Jacket Brown Suede\r\n\r\n Private White V.C. The Suede Panelled Ov', '../database/images/fashionblog.jpg'),
(6, 'fashion blog 2', 'Fashion', 'From British football terraces to Paris Fashion Week. From chart-topping music videos to Hollywood blockbusters – there are few places left untreaded by Adidas’ iconic sneakers. Known for their timeless styling, simplicity and striking Three-Stripe branding, these are some of the most popular shoes on the planet, with instantly recognisable silhouettes, industry-shaping tech and high-profile celebrity endorsements to boot.\r\n\r\nAdidas sneakers are more than mere shoes; they’re cultural artefacts. Some of the brand’s models have become so entrenched in certain subcultures that they’re now part of the DNA. Take the Superstar and early hip-hop or the Gazelle and football casuals, for example – it’s almost impossible to imagine their respective scenes without them.\r\n\r\nMore recently, the Samba ascended to ‘It’ shoe status, taking over the world’s most fashionable cities as the default footwear of choice for clued-up individuals, leading shortly after to mainstream saturation. But what makes s', '../database/images/fashionblog2.jpg'),
(7, 'fashion blog 3', 'Fashion', 'There’s a satisfying feeling when you’re prepared for anything. It’s nice to know, confidently, that you’ve got everything you need for the day ahead, and even if a problem occurs, you’ve got the essentials to sort it. You wouldn’t go into the jungle without the proper kit, so why go to work or about your daily activities without the appropriate items?\r\n\r\nYou’ve likely come across the concept of the ‘Everyday Carry’, or EDC for short. Well, consider the below the stylish man’s version. A curated selection of essentials for the commute, work and life in general.\r\n\r\nWhether carrying on your person or stashing in your bag, these are the items no man should leave the house without.\r\n\r\nMechanical Pen\r\nA watch has long been an essential everyday piece, but you don’t want to spend thousands on something likely to take a beating daily – save the Rolex for special occasions.\r\n\r\nIf you’re looking for the perfect balance of affordability, design and mechanics, look no further than vintage-style w', '../database/images/fashionblog3.jpg'),
(8, 'blog with anonymous comment', 'Food', 'A diet rich in vegetables and fruits can lower blood pressure, reduce the risk of heart disease and stroke, prevent some types of cancer, lower risk of eye and digestive problems, and have a positive effect upon blood sugar, which can help keep appetite in check. Eating non-starchy vegetables and fruits like apples, pears, and green leafy vegetables may even promote weight loss. [1] Their low glycemic loads prevent blood sugar spikes that can increase hunger.\r\n\r\nAt least nine different families of fruits and vegetables exist, each with potentially hundreds of different plant compounds that are beneficial to health. Eat a variety of types and colors of produce in order to give your body the mix of nutrients it needs. This not only ensures a greater diversity of beneficial plant chemicals but also creates eye-appealing meals.\r\n\r\n', '../database/images/Vegetables.jpg');


CREATE TABLE `blogs_comments` (
  `blog_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `blogs_comments` (`blog_id`, `comment_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(7, 4),
(7, 5),
(8, 6),
(6, 7),
(5, 8);

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `comments` (`id`, `comment`) VALUES
(1, 'comment 1'),
(2, 'comment 2'),
(3, 'another comment'),
(4, 'random comment'),
(5, 'anonymous user comment'),
(6, 'anonymous user comment'),
(7, 'another random comment'),
(8, 'fashion comment');

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'anonymous', '', '', 'user'),
(2, 'user1', 'user1@gmail.com', 'user1', 'user'),
(3, 'admin1', 'admin1@gmail.com', 'admin1', 'admin'),
(4, 'admin2', 'admin2@gmail.com', 'admin2', 'admin'),
(5, 'user2', 'user2@gmail.com', 'user2', 'user');

CREATE TABLE `users_blogs` (
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_blogs` (`user_id`, `blog_id`) VALUES
(3, 1),
(4, 2),
(4, 3),
(4, 4),
(2, 5),
(2, 6),
(2, 7),
(5, 8);

CREATE TABLE `users_comments` (
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users_comments` (`user_id`, `comment_id`) VALUES
(3, 1),
(4, 2),
(4, 3),
(2, 4),
(1, 5),
(1, 6),
(3, 7),
(3, 8);

ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;