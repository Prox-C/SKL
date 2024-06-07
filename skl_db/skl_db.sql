-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 05:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(9, 'Technology'),
(11, 'Health'),
(12, 'Automotive'),
(13, 'Video Games'),
(21, 'Films'),
(22, 'Showbiz');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `alias`, `comment`) VALUES
(12, 'Charles Arves', 'sheesh hi pj'),
(13, 'Anonymous', 'nice!'),
(14, 'Anonymous', 'ta waray, naging krinjlord amp'),
(15, 'hondacivicfk8', 'a staple of the jdm culture! '),
(16, 'porfy_glokglokao', 'pj pakadi ha room'),
(17, 'Anonymous', 'okay'),
(18, 'Liam Pogi', 'overrated af'),
(19, 'Liam Pogi', 'hehehe protein gods'),
(20, 'Anonymous', 'wow charles bayot'),
(21, 'gladys morbos', 'wow, nice post!'),
(22, 'janbro123', 'is that my lord and saviour eimi fukada??'),
(23, 'Anonymous', 'hello world'),
(24, 'Anonymous', 'gg');

-- --------------------------------------------------------

--
-- Table structure for table `comment_blog`
--

CREATE TABLE `comment_blog` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment_blog`
--

INSERT INTO `comment_blog` (`id`, `post_id`) VALUES
(12, 45),
(13, 45),
(14, 37),
(15, 40),
(16, 45),
(17, 45),
(18, 40),
(19, 45),
(23, 50);

-- --------------------------------------------------------

--
-- Table structure for table `editor_blog`
--

CREATE TABLE `editor_blog` (
  `id` smallint(6) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `editor_blog`
--

INSERT INTO `editor_blog` (`id`, `post_id`) VALUES
(6, 20),
(6, 29),
(24, 37),
(24, 40),
(24, 48),
(24, 50),
(25, 45),
(33, 53);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = Published, 1 = Drafted',
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `thumbnail`, `content`, `status`, `category_id`) VALUES
(20, 'AI Overviews', 'assets/thumbnails/download (4).jpeg', '\'AI Overviews\' Is a Mess, and It Seems Like Google Knows It\r\n\r\nAt its Google I/O keynote earlier this month, Google made big promises about AI in Search, saying that users would soon be able to “Let Google do the Googling for you.” That feature, called AI Overviews, launched earlier this month. The result? The search giant spent Memorial Day weekend scrubbing AI answers from the web.\r\n\r\nSince Google AI search went live for everyone in the U.S. on May 14, AI Overviews have suggested users put glue in their pizza sauce, eat rocks, and use a “squat plug” while exercising (you can guess what that last one is referring to).\r\n\r\nWhile some examples circulating on social media have clearly been photoshopped for a joke, others were confirmed by the Lifehacker team—Google suggested I specifically use Elmer’s glue in my pizza. Unfortunately, if you try to search for these answers now, you’re likely to see the “an AI overview is not available for this search” disclaimer instead.', 0, 9),
(29, 'Email Is Now the Best Social Network', 'assets/thumbnails/emailll.jpg', 'The words \"social network\" imply that such tools will connect you with the people in your life. That\'s not how these services work anymore.\r\n\r\nAt this point in the downward spiral of life on the internet, Instagram is mostly jammed with viral videos, none of my friends are active on Facebook, and Twitter—a site I once used to both kindle and maintain friendships—is a husk of what it once was (it\'s not even called Twitter anymore). At this point, there\'s basically nowhere I can talk to all my friends at once.\r\n\r\nExcept for in an email. Here we are, deep into the Web 2.0 era (or possibly in the web 3.0 era, depending on how much you\'ve bought into the blockchain), and the best way to talk to a group of your friends online is a technology that dates back to the 1970s. If social networks are about connecting you to the people in your life, which I would argue they are, email is the only social network still standing.\r\n\r\nThings didn\'t have to be this way. The companies that run social networks could have made different decisions. They could have prioritized actual connection over their endless appetite for dopamine-driving scale. But they didn\'t, and their platforms are now terrible at doing what they were ostensibly created to do.\r\n\r\nEmail, meanwhile, still works just fine.', 0, 9),
(37, 'A Place in My Heart', 'assets/thumbnails/FK8.jpg', 'My first love, the 10th generation Honda Civic (2016 - 2021)\r\n\r\nThey told me that it\'s fleeting and that it\'ll pass. Yet years had passed and here I am, still head over heels for you. Often I aimlessly wander the streets, in hopes of running into you. \'Cause at the sight of your timeless beauty, I am rid of most everything that ails me.\r\n\r\nI always dread the possibility that all of this will go in vain. But if this is the road that leads me back to you, then I guess it\'s worth my while. After all, it is for this cause that I so tirelessly push my self to my wit\'s end.\r\n\r\nRegrettably, time has since sped its way through us. And so, much to my dismay, we\'ll have to carry on unto the next. But in due course, I\'ll take a trip down memory lane and find comfort in knowing that you\'ll be right around the corner. Peering back through these rear-view mirrors . . .\r\n\r\nto you whom I loved from the start,\r\nyou\'ll always have a place in my heart.\r\n\r\n- Amadeus Gravoso, 2022\r\n', 0, 12),
(40, 'Art on Wheels: The 1991 Honda NSX', 'assets/thumbnails/nsx.jpg', 'When Honda released the NSX NA1 in 1990 at the peak of its near total domination of the Formula One circuit, it stunned the world and stole the hearts of millions. The NSX NA1 was as gorgeous and responsive as any Italian supercar, but was much lower priced and incomparably more reliable. As the world’s first aluminum-bodied production sports car, it was super lightweight. It also showcased a host of highly sophisticated Formula One bred technologies. For many car enthusiasts, it represented sports car perfection.\r\n\r\nThe extremely sporty design was co-conceived by Pininfarina and inspired by the cockpits of F-16 fighter jets. From aggressively forward-positioned cockpit to notably low height and extended tail, the classic looks have never gone out of style. These design attributes also contribute to a fantastic driving experience. The forward cockpit enhances all-around visibility, while the long tail improves high-speed stability and the low 46-inch height makes spirited driving especially exhilarating.\r\n\r\nThe handling of the NSX is nothing short of extraordinary. Almost anyone can drive it without losing control. Its midship configuration delivers exceptional balance via ideal weight distribution, and race-bred double wishbones maintain nearly unvarying wheel alignment. The suspension was finely tuned through exhaustive testing on race tracks with guidance from Formula One legend Ayrton Senna, who also convinced Honda to stiffen the chassis. Yet the ride is smooth and comfortable.\r\n\r\nThe all-aluminum naturally aspirated 3.0L V6 engine with VTEC variable valve timing may not compete with today’s fastest supercars in flat out speed — it manages 0-60 in a respectable 4.7 seconds. But the high-rev performance with impressive 8,000 rpm redline supported by titanium connecting rods is truly addictive. And Honda wizardry delivers amazing fuel efficiency even when traveling at high speeds.\r\n\r\nTo top it off, overall craftsmanship is simply unparalleled. Honda’s usual meticulous precision was taken to extremes by a hand-picked team of talented specialists who largely handbuilt every car. Even the finish received the undivided attention of this cream of the crop crew that employed a 23-step process to achieve a flawless mirror-like surface. Talk about going the extra mile!\r\n\r\nWe highly recommend test driving the NSX NA1. Its remarkable handling ease, intoxicating engine scream, and supercar styling are enough to make even seasoned drivers fall head over heels in love. Once you purchase this dream car with its low maintenance and high reliability, you may never consider the competition again.\r\n\r\nThe stunning NSX NA1 with formula red finish in the accompanying photo was recently purchased from a used car auction in Japan at a very reasonable price. Wherever you live, in the East, West or Down Under, there is simply no better way to get your hands on true value than by importing used cars from Japan.\r\n\r\nAt Japan Car Direct, our dedicated team can keep you informed of suitable vehicles on auction each week in Japan, arrange for professional third-party inspections, ensure all of your questions are answered, place bids on your behalf, inform you of every detail after successful bids, arrange for the vehicle’s transportation to your nearest port, etc. We are here for you every step of the way, and aim to make the entire process easy and enjoyable.\r\n', 0, 12),
(45, 'Chest-Supported Row vs. Bent-Over Row', 'assets/thumbnails/hdvjszv.jpeg', 'When it comes to building a strong, muscular back, rows are one of the most fundamental exercises in any strength training regimen. Among the various rowing exercises, two popular variants are the Chest-Supported Row and the Bent-Over Row. Both are excellent for targeting the muscles in the upper and middle back, including the latissimus dorsi, rhomboids, and trapezius, but they come with distinct differences in technique, benefits, and potential risks. In this blog, we’ll delve into the nuances of both exercises to help you decide which might be best suited for your fitness goals.\r\n\r\nBent-Over Row: Technique and Benefits\r\n\r\nThe Bent-Over Row is performed by standing with your feet shoulder-width apart, bending your knees slightly, and bending forward at the hips until your upper body is almost parallel to the floor. Holding a barbell or dumbbells with an overhand grip, you pull the weight towards your lower ribs while keeping your elbows close to your body.\r\n\r\nBenefits:\r\n\r\nWhole-Body Engagement: This exercise is not only a back workout; it engages your glutes, hamstrings, and core for stabilization, making it a compound movement that can help improve overall strength and muscle coordination.\r\nVariable Grip: You can easily switch between an overhand, underhand, or mixed grip to target different muscle groups and add variety to your workout.\r\nIncreased Functional Strength: By simulating a pulling action while standing, it closely mirrors everyday movements and sports-specific motions, enhancing functional fitness.\r\n\r\nDrawbacks:\r\n\r\nLower Back Strain: The bent-over position places significant stress on the lower back, particularly if performed with improper form or too much weight, leading to potential injuries.\r\n\r\nComplex for Beginners: New lifters might find it difficult to maintain the correct form due to the balance and strength required, which could detract from its effectiveness and increase the risk of injury.', 0, 11),
(48, 'Eternal Sunshine of the Spotless Mind', 'assets/thumbnails/esotsm.jpg', 'In the vast landscape of cinema, certain films transcend mere entertainment and become profound reflections on the human experience. One such masterpiece is Michel Gondry\'s \"Eternal Sunshine of the Spotless Mind\" (2004). This film, with its intricate narrative, stunning visuals, and deeply resonant themes, continues to captivate audiences and provoke thought long after its release.\r\n\r\nAt its core, \"Eternal Sunshine of the Spotless Mind\" is a love story unlike any other. Joel (played by Jim Carrey) and Clementine (played by Kate Winslet) meet, fall in love, and eventually face the inevitable challenges of any relationship. However, what sets this story apart is its exploration of memory and the nature of love itself.\r\n\r\nThe film\'s narrative structure is unconventional yet brilliantly executed. As Joel discovers that Clementine has undergone a procedure to erase him from her memory, he decides to undergo the same procedure to erase her from his. The story unfolds in a nonlinear fashion, jumping back and forth between Joel\'s memories as they are being erased and his subconscious attempts to hold onto them. This fragmented narrative mirrors the fragmented nature of memory itself, as well as the often chaotic emotions that accompany the end of a relationship.\r\n\r\nCentral to the film\'s exploration of memory is the concept of selective memory erasure. In the world of \"Eternal Sunshine,\" technology has advanced to the point where individuals can choose to erase specific memories, effectively deleting them from their minds. This raises profound questions about the nature of identity and the role that memories play in shaping who we are. Is it possible to truly erase a part of ourselves without fundamentally altering our sense of self? The film suggests that while memories can be erased, the emotions associated with them are more resilient, lingering long after the memories themselves are gone.\r\n\r\nJim Carrey delivers a career-defining performance as Joel, showcasing a depth and vulnerability rarely seen in his comedic roles. His portrayal of a man grappling with the loss of both love and identity is nothing short of extraordinary. Kate Winslet is equally mesmerizing as Clementine, infusing the character with a vibrant energy and complexity that perfectly complements Carrey\'s subdued introspection.\r\n\r\nVisually, \"Eternal Sunshine of the Spotless Mind\" is a feast for the eyes. Director Michel Gondry employs a variety of techniques, including practical effects, seamless editing, and inventive camera work, to create a dreamlike atmosphere that perfectly mirrors the film\'s thematic exploration of memory and perception. The use of color is particularly striking, with each memory characterized by its own distinct palette, from the warm, golden hues of Joel and Clementine\'s early days together to the cold, sterile blues of the memory erasure procedure.\r\n\r\nAt its heart, \"Eternal Sunshine of the Spotless Mind\" is a meditation on the nature of love and the human capacity for resilience in the face of heartache. It reminds us that while the pain of lost love may be excruciating, it is ultimately outweighed by the joy of having loved at all. As Joel and Clementine\'s memories are gradually erased, they come to realize that the beauty of their relationship lies not in its perfection, but in its impermanence.\r\n\r\nIn an age where technology allows us to manipulate and control our memories like never before, \"Eternal Sunshine of the Spotless Mind\" serves as a poignant reminder of the importance of embracing the full spectrum of human experience, both the joys and the sorrows. It is a film that challenges us to confront our own relationships and memories, and to cherish them for the fleeting, precious moments that they are.', 0, 21),
(50, 'My Glorious Queen & her Unbothered Bangs', 'assets/thumbnails/eimi.jpg', 'In the vast tapestry of beauty, there exists a singular figure who commands attention and admiration. She is a short-haired chinita with bangs that fall just right, embodying a grace that is both timeless and effortlessly modern. My glorious queen, with her unbothered bangs, reigns supreme in the realm of elegance and poise.\r\n\r\nHer hair, cut short, defies convention and celebrates a bold spirit. Each strand speaks of freedom and a confident stride that never wavers. The shortness of her hair frames her face, highlighting her delicate features and the depth of her gaze. It\'s a look that speaks of both strength and softness, a perfect balance that captivates all who behold her.\r\n\r\nAnd then there are her bangs—those unbothered bangs that rest across her forehead like a crown of understated rebellion. They are not just a fashion statement but a declaration of her unshakeable confidence. In a world that often demands perfection, her bangs remind us that true beauty lies in embracing one\'s unique quirks and characteristics.\r\n\r\nMy queen moves through life with an ease that is both inspiring and aspirational. Her unbothered attitude, mirrored by her unbothered bangs, sets her apart in a sea of conformity. She faces challenges with a calm that is almost regal, her bangs never out of place, always a testament to her inner serenity.\r\n\r\nIn her presence, one feels the power of authenticity. She is not swayed by fleeting trends or the opinions of others. Instead, she defines her own standards of beauty and elegance, inviting us all to do the same. Her short hair and bangs are symbols of her individuality, her refusal to blend into the background.\r\n\r\nThis queen, with her unbothered bangs, is a beacon of inspiration. She teaches us that beauty is not about fitting into a predetermined mold but about carving out your own path. Her bangs, always perfectly unbothered, remind us that confidence and self-assurance are the true hallmarks of beauty.\r\n\r\nAs I look upon my glorious queen, I see more than just a woman with a stylish haircut. I see a testament to the power of self-love and authenticity. Her short hair and unbothered bangs are a daily reminder that true elegance comes from within, from a place of knowing and embracing oneself completely.\r\n\r\nIn celebrating her, I celebrate all who dare to be different, who dare to be themselves. For in a world full of followers, it is the leaders—the ones who wear their bangs unbothered and their hair short—who truly shine. Here\'s to my queen, and to the unbothered beauty that she so effortlessly embodies.', 0, 22),
(53, 'Firewatch', 'assets/thumbnails/firewatch4k_alt.jpg', '\"Firewatch\" is a captivating narrative-driven adventure game developed by Campo Santo and released in 2016. Set in the late 1980s, it follows the story of Henry, a man who takes a job as a fire lookout in the Shoshone National Forest of Wyoming, following personal struggles in his life.\r\n\r\nThe game is renowned for its stunning visuals, immersive atmosphere, and compelling storytelling. Players experience the vast wilderness of the Wyoming wilderness through the eyes of Henry as he communicates with his supervisor, Delilah, via a handheld radio. The radio serves as the primary means of interaction, as Henry and Delilah develop a deep and complex relationship solely through their conversations.\r\n\r\nAs players explore the forest, they encounter various mysteries and strange occurrences, including vandalism, missing persons, and the presence of an unknown figure watching Henry\'s movements. The sense of isolation and the tension of the unknown create a gripping experience, blurring the lines between reality and paranoia.\r\n\r\n\"Firewatch\" is not just about exploring the wilderness but also about exploring the complexities of human relationships and the weight of past decisions. The choices players make throughout the game influence the direction of the story and the development of Henry and Delilah\'s relationship, adding layers of depth and replay value.\r\n\r\nThe game received widespread acclaim for its narrative depth, emotional resonance, and unique gameplay mechanics. Its rich storytelling and stunning visuals have solidified its place as a standout title in the adventure game genre, leaving a lasting impression on players long after the credits roll.', 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` smallint(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `fname`, `lname`, `role`) VALUES
(1, 'admin', '$2y$10$QHMNI6sS7cQBXgHofw819uagwLEFzsCYcN72HBT22IvOGUqwpA07i', 'Admin', 'Default', 'admin'),
(6, 'kenny_mc@skl.net', '$2y$10$socu0ZV57cPtOWNdCRhJ2uvOjBpxCD09uOpiuNnAb7OXlsIJix6qm', 'Kenny', 'Mc Cormick', 'editor'),
(24, 'amadeus@skl.net', '$2y$10$3NSino/qJpTyVS86H1tCzOVSRqsrCkPbqtuyzmoYTHVlyHV4HcRWO', 'Amadeus', 'Gravoso', 'editor'),
(25, 'pj@skl.net', '$2y$10$kDrKYVCO1hkkPeKGk.8S1utsAb9YRhKP1We/wZ.lttxxLlprl0XeS', 'Peejay', 'Relevo', 'editor'),
(33, 'igor.strv@skl.net', '$2y$10$bkrv4mw3Q4xoGalPdJgjMeG5pXss//0aQvvYt0Rp13z1wqCIan1pi', 'Igor', 'Stravinsky', 'editor'),
(34, 'billgates@skl.net', '$2y$10$hIRmZx1elAk83Jj1XW.ns.zCO/ctqWGg1fmkPJ/K4NMT0I/7/bGNe', 'Bill', 'Gates', 'editor'),
(43, 'gg@skl.net', '$2y$10$RlfRQnlqglq41/Ig8toZ3uSkyiDkiGUOZKS7QaZGD.WX5X/CsXGMi', 'Godwin', 'Gacho', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD PRIMARY KEY (`id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `editor_blog`
--
ALTER TABLE `editor_blog`
  ADD PRIMARY KEY (`id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_blog`
--
ALTER TABLE `comment_blog`
  ADD CONSTRAINT `comment_blog_ibfk_1` FOREIGN KEY (`id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comment_blog_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `editor_blog`
--
ALTER TABLE `editor_blog`
  ADD CONSTRAINT `editor_blog_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `editor_blog_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
