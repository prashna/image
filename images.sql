-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2015 at 11:11 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `images`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `name` text NOT NULL,
  `encoded_16` text NOT NULL,
  `encoded_32` text NOT NULL,
  `size` int(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `upload_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `name`, `encoded_16`, `encoded_32`, `size`, `type`, `upload_date`) VALUES
(1, 'uploads/download.jpg', 'download.jpg', '["002","012","022","032","042","052","062","072","082","092","0k2","0l1","0m1","0n1","0o0","0p0","103","112","122","132","142","152","162","172","182","192","1k2","1l1","1m1","1n1","1o1","1p0","206","212","222","232","242","252","262","272","282","292","2k2","2l1","2m0","2n1","2o6","2p0","306","312","322","332","342","352","362","373","383","393","3k1","3l1","3m0","3n1","3o6","3p0","406","412","422","432","442","453","463","473","483","493","4k1","4l1","4m1","4n1","4o6","4p0","500","512","522","532","540","550","560","572","582","593","5k5","5l5","5m4","5n2","5o0","5p0","600","612","626","631","640","650","661","671","682","692","6k2","6l2","6m4","6n4","6o6","6p0","706","712","726","730","740","751","761","772","782","792","7k1","7l2","7m1","7n1","7o6","7p0","806","813","826","830","840","851","862","871","882","892","8k2","8l1","8m1","8n0","8o6","8p0","906","913","922","930","940","951","962","971","982","992","9k2","9l0","9m1","9n3","9o2","9p0","k06","k13","k23","k30","k40","k51","k62","k72","k83","k93","kk1","kl1","km0","kn0","ko4","kp0","l03","l14","l23","l33","l40","l52","l62","l71","l82","l92","lk3","ll0","lm0","ln0","lo6","lp0","m02","m14","m23","m33","m43","m53","m63","m71","m83","m93","mk3","ml0","mm0","mn0","mo6","mp0","n00","n14","n23","n33","n43","n53","n63","n71","n83","n92","nk3","nl2","nm0","nn0","no0","np0","o03","o12","o22","o32","o42","o52","o62","o71","o83","o93","ok3","ol3","om0","on0","oo0","op0","p03","p13","p23","p33","p43","p53","p63","p72","p82","p92","pk2","pl1","pm1","pn0","po0","pp0"] ', ' ', 7631, 'image/jpeg', '2015-01-12'),
(2, 'uploads/download (2).jpg', 'download (2).jpg', '["003","010","021","032","042","052","062","072","081","091","0k1","0l0","0m3","0n1","0o4","0p4","103","110","122","132","142","152","162","172","181","191","1k1","1l1","1m4","1n0","1o4","1p4","203","210","222","232","241","252","262","272","281","291","2k1","2l0","2m4","2n4","2o4","2p4","303","314","324","332","341","352","362","372","381","391","3k1","3l0","3m4","3n4","3o4","3p4","402","414","424","430","440","451","461","471","481","490","4k0","4l0","4m2","4n2","4o4","4p4","500","511","520","532","541","552","562","572","582","591","5k1","5l1","5m4","5n4","5o4","5p4","600","612","624","632","641","652","662","671","682","692","6k1","6l0","6m0","6n4","6o4","6p4","702","714","724","733","741","752","761","772","781","792","7k1","7l2","7m0","7n1","7o4","7p4","802","814","820","832","842","851","862","872","882","891","8k1","8l1","8m4","8n3","8o4","8p4","900","910","920","930","940","951","961","971","981","990","9k0","9l0","9m1","9n4","9o4","9p4","k00","k14","k24","k32","k42","k52","k62","k72","k82","k91","kk0","kl0","km0","kn1","ko4","kp4","l04","l14","l22","l32","l41","l52","l61","l72","l82","l91","lk1","ll0","lm0","ln0","lo4","lp4","m03","m14","m23","m34","m44","m54","m64","m72","m82","m91","mk1","ml0","mm0","mn0","mo4","mp4","n01","n14","n24","n34","n44","n54","n64","n71","n83","n91","nk1","nl0","nm4","nn4","no4","np4","o04","o11","o20","o30","o40","o50","o60","o71","o82","o91","ok1","ol0","om3","on4","oo4","op4","p04","p11","p21","p30","p40","p50","p60","p70","p82","p91","pk1","pl1","pm1","pn1","po4","pp4"] ', ' ', 9015, 'image/jpeg', '2015-01-12'),
(3, 'uploads/images.jpg', 'images.jpg', '["003","010","021","032","042","052","062","072","081","091","0k1","0l0","0m3","0n1","0o4","0p4","103","110","122","132","142","152","162","172","181","191","1k1","1l1","1m4","1n0","1o4","1p4","203","210","222","232","241","252","262","272","281","291","2k1","2l0","2m4","2n4","2o4","2p4","303","314","324","332","341","352","362","372","381","391","3k1","3l0","3m4","3n4","3o4","3p4","402","414","424","430","440","451","461","471","481","490","4k0","4l0","4m2","4n2","4o4","4p4","500","511","520","532","541","552","562","572","582","591","5k1","5l1","5m4","5n4","5o4","5p4","600","612","624","632","641","652","662","671","682","692","6k1","6l0","6m0","6n4","6o4","6p4","702","714","724","733","741","752","761","772","781","792","7k1","7l2","7m0","7n1","7o4","7p4","802","814","820","832","842","851","862","872","882","891","8k1","8l1","8m4","8n3","8o4","8p4","900","910","920","930","940","951","961","971","981","990","9k0","9l0","9m1","9n4","9o4","9p4","k00","k14","k24","k32","k42","k52","k62","k72","k82","k91","kk0","kl0","km0","kn1","ko4","kp4","l04","l14","l22","l32","l41","l52","l61","l72","l82","l91","lk1","ll0","lm0","ln0","lo4","lp4","m03","m14","m23","m34","m44","m54","m64","m72","m82","m91","mk1","ml0","mm0","mn0","mo4","mp4","n01","n14","n24","n34","n44","n54","n64","n71","n83","n91","nk1","nl0","nm4","nn4","no4","np4","o04","o11","o20","o30","o40","o50","o60","o71","o82","o91","ok1","ol0","om3","on4","oo4","op4","p04","p11","p21","p30","p40","p50","p60","p70","p82","p91","pk1","pl1","pm1","pn1","po4","pp4"] ', ' ', 4282, 'image/jpeg', '2015-01-12'),
(4, 'uploads/download (1).jpg', 'download (1).jpg', '["005","012","022","033","043","053","063","073","083","093","0k3","0l3","0m5","0n0","0o1","0p1","105","113","122","133","143","153","163","173","183","193","1k3","1l3","1m5","1n0","1o4","1p1","205","210","220","230","240","250","260","270","280","290","2k0","2l0","2m0","2n0","2o0","2p1","301","310","323","333","341","350","363","372","380","393","3k2","3l1","3m5","3n0","3o5","3p1","402","412","423","433","442","452","463","472","482","492","4k2","4l1","4m4","4n0","4o3","4p1","505","512","523","532","540","551","562","572","582","591","5k1","5l1","5m1","5n0","5o4","5p1","601","610","622","632","641","652","662","672","682","691","6k4","6l4","6m5","6n1","6o5","6p1","705","711","722","731","741","753","763","772","782","792","7k0","7l4","7m5","7n1","7o5","7p1","805","812","822","833","843","853","862","872","882","893","8k1","8l1","8m5","8n0","8o5","8p4","905","911","923","932","941","952","963","972","982","991","9k2","9l3","9m5","9n0","9o3","9p0","k05","k10","k22","k32","k41","k52","k62","k71","k81","k93","kk3","kl0","km0","kn3","ko0","kp1","l05","l12","l20","l30","l40","l50","l62","l73","l80","l93","lk3","ll0","lm4","ln0","lo5","lp1","m03","m12","m22","m33","m41","m50","m63","m73","m80","m93","mk3","ml1","mm3","mn0","mo5","mp1","n02","n12","n22","n33","n41","n50","n63","n73","n80","n93","nk3","nl1","nm0","nn0","no5","np1","o00","o12","o22","o33","o41","o51","o63","o73","o81","o93","ok3","ol1","om5","on0","oo1","op1","p02","p12","p21","p33","p41","p51","p63","p73","p81","p93","pk3","pl1","pm1","pn3","po1","pp1"] ', ' ', 11323, 'image/jpeg', '2015-01-14'),
(5, 'uploads/download (4).jpg', 'download (4).jpg', '["004","014","022","033","043","053","063","073","083","091","0k1","0l1","0m4","0n1","0o0","0p0","104","114","123","133","143","153","163","173","183","191","1k1","1l1","1m3","1n0","1o1","1p0","204","212","222","233","243","253","263","273","283","291","2k1","2l1","2m0","2n0","2o4","2p0","304","314","322","334","343","353","363","373","381","391","3k1","3l1","3m4","3n1","3o0","3p0","403","412","423","434","444","453","463","473","481","491","4k1","4l1","4m3","4n0","4o4","4p1","504","513","523","533","543","553","563","571","580","591","5k0","5l0","5m4","5n0","5o4","5p1","604","614","623","631","642","652","662","672","682","692","6k2","6l1","6m2","6n0","6o4","6p0","702","714","721","732","742","752","762","772","782","792","7k2","7l1","7m0","7n2","7o0","7p1","804","812","821","832","843","852","862","872","882","892","8k1","8l3","8m4","8n0","8o1","8p2","904","914","921","933","943","952","961","972","982","992","9k2","9l0","9m2","9n0","9o4","9p1","k04","k14","k21","k32","k42","k52","k62","k72","k81","k90","kk0","kl0","km4","kn0","ko0","kp0","l04","l14","l20","l31","l41","l51","l60","l72","l82","l90","lk0","ll0","lm2","ln0","lo2","lp0","m04","m14","m21","m30","m40","m50","m63","m73","m83","m90","mk1","ml1","mm4","mn0","mo2","mp0","n04","n14","n23","n33","n43","n53","n63","n73","n83","n91","nk1","nl1","nm3","nn0","no0","np0","o04","o14","o23","o33","o43","o53","o63","o73","o83","o93","ok0","ol1","om1","on1","oo1","op0","p04","p14","p23","p33","p43","p53","p63","p73","p83","p93","pk3","pl3","pm2","pn2","po2","pp0"] ', ' ', 11585, 'image/jpeg', '2015-01-14'),
(6, 'uploads/download (6).jpg', 'download (6).jpg', '["002","013","023","033","043","053","063","073","083","093","0k3","0l2","0m1","0n1","0o1","0p1","104","111","122","132","142","151","162","172","181","191","1k2","1l2","1m1","1n1","1o1","1p1","204","212","222","232","242","252","262","272","282","292","2k1","2l1","2m4","2n1","2o1","2p1","303","312","320","330","340","350","360","371","383","392","3k1","3l1","3m1","3n0","3o0","3p1","401","410","420","431","442","452","462","472","482","491","4k0","4l0","4m4","4n4","4o3","4p1","502","510","520","532","542","552","561","572","583","592","5k2","5l1","5m4","5n4","5o3","5p1","604","610","624","632","642","653","660","672","682","693","6k2","6l2","6m1","6n1","6o2","6p2","701","710","721","733","743","753","761","772","782","792","7k3","7l1","7m4","7n0","7o3","7p1","804","810","824","833","843","853","862","873","883","893","8k1","8l2","8m1","8n4","8o0","8p2","903","910","922","932","942","952","960","971","982","992","9k2","9l2","9m0","9n4","9o0","9p1","k04","k11","k22","k32","k42","k52","k62","k72","k82","k92","kk2","kl1","km4","kn0","ko4","kp1","l04","l13","l21","l31","l41","l52","l62","l72","l82","l92","lk2","ll1","lm4","ln4","lo3","lp1","m03","m13","m23","m33","m43","m53","m61","m72","m83","m90","mk0","ml1","mm4","mn1","mo3","mp1","n02","n13","n24","n33","n43","n53","n63","n73","n83","n92","nk1","nl1","nm0","nn1","no1","np1","o03","o13","o24","o33","o44","o53","o63","o73","o83","o92","ok1","ol1","om1","on1","oo1","op1","p03","p13","p23","p33","p43","p53","p63","p73","p84","p92","pk2","pl1","pm1","pn1","po1","pp1"] ', ' ', 7167, 'image/jpeg', '2015-01-14'),
(7, 'uploads/download (1).jpg', 'download (1).jpg', '["005","012","022","033","043","053","063","073","083","093","0k3","0l3","0m5","0n0","0o1","0p1","105","113","122","133","143","153","163","173","183","193","1k3","1l3","1m5","1n0","1o4","1p1","205","210","220","230","240","250","260","270","280","290","2k0","2l0","2m0","2n0","2o0","2p1","301","310","323","333","341","350","363","372","380","393","3k2","3l1","3m5","3n0","3o5","3p1","402","412","423","433","442","452","463","472","482","492","4k2","4l1","4m4","4n0","4o3","4p1","505","512","523","532","540","551","562","572","582","591","5k1","5l1","5m1","5n0","5o4","5p1","601","610","622","632","641","652","662","672","682","691","6k4","6l4","6m5","6n1","6o5","6p1","705","711","722","731","741","753","763","772","782","792","7k0","7l4","7m5","7n1","7o5","7p1","805","812","822","833","843","853","862","872","882","893","8k1","8l1","8m5","8n0","8o5","8p4","905","911","923","932","941","952","963","972","982","991","9k2","9l3","9m5","9n0","9o3","9p0","k05","k10","k22","k32","k41","k52","k62","k71","k81","k93","kk3","kl0","km0","kn3","ko0","kp1","l05","l12","l20","l30","l40","l50","l62","l73","l80","l93","lk3","ll0","lm4","ln0","lo5","lp1","m03","m12","m22","m33","m41","m50","m63","m73","m80","m93","mk3","ml1","mm3","mn0","mo5","mp1","n02","n12","n22","n33","n41","n50","n63","n73","n80","n93","nk3","nl1","nm0","nn0","no5","np1","o00","o12","o22","o33","o41","o51","o63","o73","o81","o93","ok3","ol1","om5","on0","oo1","op1","p02","p12","p21","p33","p41","p51","p63","p73","p81","p93","pk3","pl1","pm1","pn3","po1","pp1"] ', ' ', 11323, 'image/jpeg', '2015-01-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
