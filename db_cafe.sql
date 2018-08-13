-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 27 2018 г., 18:16
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `db_cafe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buy_products`
--

CREATE TABLE IF NOT EXISTS `buy_products` (
  `buy_id` int(11) NOT NULL AUTO_INCREMENT,
  `buy_id_order` int(11) NOT NULL,
  `buy_id_product` int(11) NOT NULL,
  `buy_count_product` int(11) NOT NULL,
  PRIMARY KEY (`buy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `buy_products`
--

INSERT INTO `buy_products` (`buy_id`, `buy_id_order`, `buy_id_product`, `buy_count_product`) VALUES
(5, 3, 1, 1),
(6, 4, 0, 4),
(7, 4, 4, 1),
(8, 4, 3, 1),
(9, 5, 0, 4),
(10, 5, 8, 1),
(11, 5, 6, 6),
(12, 6, 0, 4),
(13, 6, 6, 6),
(14, 7, 0, 4),
(15, 7, 1, 1),
(16, 8, 0, 4),
(17, 8, 1, 1),
(18, 9, 0, 4),
(19, 9, 1, 1),
(20, 10, 0, 4),
(21, 10, 1, 1),
(22, 11, 0, 4),
(23, 11, 1, 1),
(24, 12, 0, 4),
(25, 12, 1, 1),
(26, 13, 0, 4),
(27, 13, 1, 8),
(28, 14, 0, 4),
(29, 14, 1, 8),
(30, 15, 0, 4),
(31, 15, 1, 8),
(32, 16, 0, 4),
(33, 16, 4, 1),
(34, 17, 0, 4),
(35, 17, 1, 5),
(36, 17, 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id_products` int(11) NOT NULL,
  `cart_price` int(11) NOT NULL,
  `cart_count` int(11) NOT NULL DEFAULT '1',
  `cart_datetime` datetime NOT NULL,
  `cart_ip` varchar(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_id_products`, `cart_price`, `cart_count`, `cart_datetime`, `cart_ip`) VALUES
(1, 0, 0, 4, '2018-06-18 14:29:46', '127.0.0.1'),
(8, 1, 440, 5, '2018-06-26 11:37:15', '127.0.0.1'),
(9, 2, 440, 2, '2018-06-26 11:37:17', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `type`, `img`) VALUES
(1, 'Пицца', 'pizzas.png'),
(2, 'Бургеры', 'burgers.png'),
(3, 'Салаты', 'salads.png'),
(4, 'Пасты', 'pasta.png'),
(5, 'Супы', 'soups.png'),
(6, 'Горячее', 'hot.png'),
(7, 'Десерты', 'desserts.png'),
(8, 'Напитки', 'drinks.png');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`) VALUES
(1, 'Скидки каждые выходные!', 'Каждые выходные у нас действует скидки 5-10%!', '2018-05-09'),
(2, 'Изменения во времени работы 12.06.18', 'В связи с праздничным днем 12.06.18, наше кафе работает до 20:00!', '2018-06-10'),
(3, 'Теперь онлайн!', 'Уважаемые посетители нашего кафе! Сообщаем, что теперь вы можете оформить доставку нашей еды.', '2018-02-14'),
(5, 'Обновление меню!', 'Уважаемые посетители! Появились новые блюда в категориях: "пицца", "бургеры" и "салаты".', '2018-06-18');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_datetime` datetime NOT NULL,
  `order_confirmed` varchar(255) NOT NULL,
  `order_dostavka` varchar(100) NOT NULL,
  `order_pay` varchar(50) NOT NULL,
  `order_fio` text NOT NULL,
  `order_address` text NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_note` text NOT NULL,
  `order_email` varchar(50) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_datetime`, `order_confirmed`, `order_dostavka`, `order_pay`, `order_fio`, `order_address`, `order_phone`, `order_note`, `order_email`) VALUES
(3, '2018-06-18 11:46:07', 'yes', 'Самовывоз', 'accepted', 'Петров Олег Сергеевич', 'г.Владивосток, ул. Ленина д 18 кв 1', '89627771222', '123', 'oleg@mail.ru'),
(4, '2018-06-19 04:20:46', 'yes', 'Курьерам', 'accepted', 'Иванов Иван Иванович', 'г.Владивосток, ул. Яшина 11, кв 11', '8-909-123-33-33', 'Звоните после 18:30!!!', 'ivan-ivan@inbox.ru'),
(5, '2018-06-19 04:22:37', 'yes', 'Самовывоз', 'accepted', 'Мартынюк Федор Викторович', 'г.Владивосток, ул. Ленина 116, кв 707', '8-914-199-12-32', '', 'vik-tormart@inbox.ru'),
(6, '2018-06-19 04:25:29', 'yes', 'Самовывоз', 'accepted', 'Емельянов Виктор Андреевич', 'г.Владивосток, ул. Ленина 12, кв 15', '8-914-202-02-02', '', 'vik-torandr@inbox.ru'),
(7, '2018-06-26 00:22:45', '', 'Самовывоз', '', 'Петров Олег Сергеевич', 'г.Владивосток, ул. Ленина д 18 кв 1', '89627771222', '123', 'oleg@mail.ru'),
(8, '2018-06-26 00:23:07', '', 'Самовывоз', '', 'Петров Олег Сергеевич', 'г.Владивосток, ул. Ленина д 18 кв 1', '89627771222', '123', 'oleg@mail.ru'),
(9, '2018-06-26 01:09:20', '', 'Курьерам', '', 'Симаков Владислав Евгеньевич', 'ул.Ленина 77, кв 7', '89622221199', 'Звоните после 17:50!!!!', 'vlads199595@mail.ru'),
(10, '2018-06-26 01:13:20', '', 'Самовывоз', '', 'Симаков Владислав Евгеньевич', 'ул.Ленина 77, кв 7', '89622221199', '123', 'vlads199595@mail.ru'),
(11, '2018-06-26 01:13:48', '', 'Самовывоз', '', 'Симаков Владислав Евгеньевич', 'ул.Ленина 77, кв 7', '89622221199', '123', 'vlads199595@mail.ru'),
(12, '2018-06-26 01:14:30', '', 'Самовывоз', '', 'Симаков Владислав Евгеньевич', 'ул.Ленина 77, кв 7', '89622221199', '123', 'vlads199595@mail.ru'),
(13, '2018-06-26 01:15:43', '', 'Курьерам', '', 'Фио', 'ул Улица, д Дом, кв Квартира', '89871231234', 'Примечание', 'vas@mail.ru'),
(14, '2018-06-26 01:18:51', '', 'Курьерам', '', 'Фио', 'ул Улица, д Дом, кв Квартира', '89871231234', '', 'vas@mail.ru'),
(15, '2018-06-26 01:20:55', '', 'Самовывоз', '', 'Симаков Владислав Евгеньевич', 'ул.Ленина 77, кв 7', '89622221199', '123', 'vlads199595@mail.ru'),
(17, '2018-06-26 11:37:47', 'yes', 'Самовывоз', 'accepted', 'Петров Олег Олегович', 'г.Владивосток, ул. Ленина д 18 кв 1', '89627771222', '555', 'oleg@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_admin`
--

CREATE TABLE IF NOT EXISTS `reg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fio` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `view_orders` int(11) NOT NULL DEFAULT '0',
  `accept_orders` int(11) NOT NULL DEFAULT '0',
  `delete_orders` int(11) NOT NULL DEFAULT '0',
  `add_tovar` int(11) NOT NULL DEFAULT '0',
  `edit_tovar` int(11) NOT NULL DEFAULT '0',
  `delete_tovar` int(11) NOT NULL DEFAULT '0',
  `view_clients` int(11) NOT NULL DEFAULT '0',
  `delete_clients` int(11) NOT NULL DEFAULT '0',
  `add_news` int(11) NOT NULL DEFAULT '0',
  `delete_news` int(11) NOT NULL DEFAULT '0',
  `view_admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `reg_admin`
--

INSERT INTO `reg_admin` (`id`, `login`, `pass`, `fio`, `role`, `email`, `phone`, `view_orders`, `accept_orders`, `delete_orders`, `add_tovar`, `edit_tovar`, `delete_tovar`, `view_clients`, `delete_clients`, `add_news`, `delete_news`, `view_admin`) VALUES
(2, 'Админ', 'mb03foo51550de3138dbd63002cd40d25bdb9cd18qj2jjdp9', 'Романенко Артур Владимирович', 'Менеджер', 'anikov-ich@mail.ru', '8-909-123-23-23', 1, 1, 1, 0, 0, 0, 1, 1, 0, 0, 1),
(3, 'Адм', 'mb03foo51b7e48f19861a43c4c607a8aee0bcc728qj2jjdp9', 'Щелканов Владимир Николаевчи', 'Менеджер', 'Vladim_Nik@mail.ru', '8-909-092-11-11', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, 'admin', 'mb03foo51b7e48f19861a43c4c607a8aee0bcc728qj2jjdp9', 'Симаков Владислав Евгеньевич', 'Гл. Администратор', 'vlads199595@mail.ru', '8-962-228-76-77', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE IF NOT EXISTS `reg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`id`, `login`, `pass`, `surname`, `name`, `patronymic`, `email`, `phone`, `address`, `datetime`, `ip`) VALUES
(1, 'andrandr', '9nm2rv8qff5743b0231e8ce1f629501d91364d0a2yo6z', 'Матвиенко', 'Андрей', 'Петрович', 'asd@mail.ru', '89622287677', 'ул. Ленина 27, кв.6', '2018-06-12 18:45:26', '127.0.0.1'),
(4, 'admin', '9nm2rv8qe5c0a1d222f948a0e68c3381a9b1d03f2yo6z', 'Симаков', 'Владислав', 'Евгеньевич', 'vlads199595@mail.ru', '89092289900', 'г. Хабаровск, ул.Яшина 66, кв.199', '2018-06-12 20:20:08', '127.0.0.1'),
(5, 'adminn', '9nm2rv8qda70c317d67c464fa004aa382da55d522yo6z', 'Иванов', 'Игорь', 'Иванович', 'asd@mail.ru', '1234566789', 'ул Волочаевская 100', '2018-06-12 21:54:47', '127.0.0.1'),
(6, 'vlads1995', '9nm2rv8q95739c8b24fc0eb7ad5b2147f029aecf2yo6z', 'Симаков', 'Владислав', 'Евгеньевич', 'vlads199595@mail.ru', '89622221199', 'ул.Ленина 77, кв 7', '2018-06-26 01:08:17', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `table_products`
--

CREATE TABLE IF NOT EXISTS `table_products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mini_description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) NOT NULL,
  `gramm` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `title`, `price`, `category`, `mini_description`, `image`, `datetime`, `visible`, `type`, `gramm`, `category_id`) VALUES
(1, 'Пицца Калифорнийский анчоус', 440, 'Пицца', 'Цезарь соус, анчоусы, каперсы, помидоры, лук, сыры', 'img1.jpg', '2018-05-08 04:22:27', 1, 'Пицца', 610, 1),
(2, 'Пицца Лесные грибы', 440, 'Пицца', 'Белый соус, белые грибы, вешенки, шампиньоны, эринги, шиитаке, лук, маслины, сыры', 'img2.jpg', '2017-12-12 23:20:26', 1, 'Пицца', 710, 1),
(3, 'Пицца Кардини', 440, 'Пицца', 'Цезарь соус, курица, бекон, помидор, каперсы, сыры', 'img3.jpg', '2018-05-06 10:46:14', 1, 'Пицца', 660, 1),
(4, 'Чизбургер', 510, 'Бургеры', 'Состав: пшеничная булочка, помидор, огурец, лук, корнишон, лист салата, много сыра, говяжья котлета, соус техасский, майонез.', 'img4.jpg', '2018-06-01 16:25:07', 1, 'Бургеры', 660, 2),
(5, 'Фри-Бургер', 490, 'Бургеры', 'Пшеничная булочка, огурец, помидор, лист салата, лук, сыр, бекон, филе в сухарях, майонез.', 'img5.jpg', '2018-05-15 05:33:23', 1, 'Бургеры', 510, 2),
(6, 'Чикенбургер', 460, 'Бургеры', 'Состав: пшеничная булочка, огурец, помидор, лист салата, лук, сыр, куриная котлета в сухарях, соус цезарь.', 'img6.jpg', '2018-05-15 20:14:05', 1, 'Бургеры', 510, 2),
(7, 'Греческий', 250, 'Салаты', 'Состав: перец, огурец, лист салата, маслины, сыр фета, оливковое масло, помидоры черри, бальзамический соус', 'img7.jpg', '2018-06-01 02:23:43', 1, 'Салаты', 220, 3),
(8, 'Салат фермер', 440, 'Салаты', 'Индейка, моцарелла, черри, салат, соус песто', 'img8.jpg', '2018-06-20 00:00:00', 1, 'Салаты', 190, 3),
(9, 'Паста с грибами и курицей', 350, 'Пасты', 'Паста с куриной грудкой и свежими шампиньонами в сливочно-грибном соусе с пармезаном', 'img9.jpg', '2018-06-03 00:00:00', 1, 'Пасты', 300, 4),
(10, 'Суп лапша с курицей', 300, 'Супы', 'Суп лапша с курицей', 'img10.jpg', '2018-06-07 00:00:00', 1, 'Супы', 350, 5),
(11, 'Суп "Рамэн с курицей"', 350, 'Супы', 'Состав: лук, морковь, перец болгарский, терияки, филе куриное, яйцо, кунжут, пшеничная лапша', 'img11.jpg', '2018-06-01 00:00:00', 1, 'Супы', 300, 5),
(12, 'Стейк семги', 590, 'Горячее', 'Поперечный стейк семги на гриле с капустой брокколи', 'img12.jpg', '2018-06-07 00:00:00', 1, 'Горячее', 330, 6),
(13, 'Сырники', 200, 'Десерты', 'Классические творожные сырники со сметаной и ягодой', 'img13.jpg', '2018-06-03 00:00:00', 1, 'Десерты', 180, 7),
(14, 'Блинчики', 150, 'Десерты', 'Пять блинчиков, с начинкой на выбор (сироп, топпинг, сметана, шоколад, джем ягодный)', 'img14.jpg', '2018-06-15 00:00:00', 1, 'Десерты', 230, 7),
(15, 'Чизкейк', 200, 'Десерты', 'Классический сырный торт с топпингом на выбор гостя', 'img15.jpg', '2018-05-07 00:00:00', 1, 'Десерты', 120, 7),
(16, 'Сок «Добрый» апельсин', 130, 'Напитки', '', 'img16.jpg', '2018-06-03 00:00:00', 1, 'Напитки', 500, 8),
(17, '«Кока Кола»', 120, 'Напитки', '', 'img17.jpg', '2018-06-11 00:00:00', 1, 'Напитки', 500, 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
