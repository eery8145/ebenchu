/*Table structure for table `cm_ad` */

DROP TABLE IF EXISTS `cm_ad`;

CREATE TABLE `cm_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `sort` smallint(5) NOT NULL,
  `img` varchar(255) NOT NULL,
  `type` tinyint(3) DEFAULT NULL COMMENT '广告类型1首页幻灯',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `cm_ad` */

insert  into `cm_ad`(`id`,`title`,`url`,`status`,`create_time`,`sort`,`img`,`type`) values (5,'广告1','http://www.ebenchu.com/group/topic/63',1,1371789319,1,'2013-06-21/1.3717893002E+127933.jpg',1),(2,'http://www.ebenchu.com/group/topic/63','http://www.ebenchu.com/group/topic/63',1,1371789355,0,'2013-06-21/1.37178933803E+125824.jpg',1),(7,'http://www.ebenchu.com/group/topic/63','http://www.ebenchu.com/group/topic/63',1,1371789367,4,'2013-06-21/1.3717893656E+122649.jpg',1),(6,'http://www.ebenchu.com/group/topic/63','http://www.ebenchu.com/group/topic/63',1,1371789384,3,'2013-06-21/1.37178938308E+129006.jpg',1);

/*Table structure for table `cm_admins` */

DROP TABLE IF EXISTS `cm_admins`;

CREATE TABLE `cm_admins` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(50) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `ip` char(20) DEFAULT NULL COMMENT '创建ip',
  `validate` tinyint(1) DEFAULT NULL COMMENT '1代表有效，2代表无效',
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_article` */

DROP TABLE IF EXISTS `cm_article`;

CREATE TABLE `cm_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `click` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `author` varchar(30) NOT NULL,
  `update_time` int(11) NOT NULL,
  `source` varchar(100) NOT NULL,
  `top` tinyint(1) NOT NULL,
  `sort` smallint(5) NOT NULL,
  `des` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `cm_article` */

insert  into `cm_article`(`id`,`cateId`,`pid`,`title`,`content`,`img`,`click`,`create_time`,`status`,`author`,`update_time`,`source`,`top`,`sort`,`des`,`keywords`) values (1,3,0,'新型发光树：或可代替灯照明','<span style=\"white-space:normal;\"><a href=\"http://www.ikphp.com/index.php?app=article&amp;m=index&amp;a=show&amp;id=223\" style=\"margin:0px;padding:0px;word-break:break-all;cursor:pointer;text-decoration:none;color:#825D5B;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:18px;line-height:27px;white-space:normal;background-color:#FFFFF9;\"> \r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	在集资网站Kickstarter上一个发光植物的研究项目已经引起了投资者的广泛关注。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	这个项目最初的目标是筹集6.5万美元，到现在距离结束还有1个月时间就已经筹集了24.3万美元。进行这个项目的合成生物学团队声称，未来的树木可以作为灯使用。研究人员们希望他们DIY合成生物技术和廉价照明的结合物能够成为一种开放性资源。项目负责人安Antony\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	Evans说道：“受萤火虫启发，我们团队使用现成的方法在加利福尼亚的DIY生物实验室中培育出真正的发光植物。”\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n</a>\r\n<div class=\"img_C\" style=\"margin:5px 0px;padding:0px;word-break:break-all;text-align:center;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\">\r\n	<a href=\"http://www.ikphp.com/index.php?app=article&amp;m=index&amp;a=show&amp;id=223\" style=\"margin:0px;padding:0px;word-break:break-all;cursor:pointer;text-decoration:none;color:#825D5B;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:18px;line-height:27px;white-space:normal;background-color:#FFFFF9;\"><br style=\"margin:0px;padding:0px;word-break:break-all;\" />\r\n</a><a href=\"http://www.ikphp.com/data/upload/article/2013/0514/23/20130514233949BJ6l_1000_1000.jpg?v=1369918165\" target=\"_blank\" title=\"点击查看原图\" style=\"margin:0px;padding:0px;word-break:break-all;cursor:pointer;text-decoration:none;color:#825D5B;\"><img alt=\"\" src=\"http://www.ikphp.com/data/upload/article/2013/0514/23/20130514233949BJ6l_500_500.jpg?v=1369918165\" title=\"点击查看原图\" style=\"margin:0px;padding:0px;word-break:break-all;border-style:none;vertical-align:middle;max-width:500px;\" /></a><br style=\"margin:0px;padding:0px;word-break:break-all;\" />\r\n<span class=\"img_title\" style=\"margin:0px;padding:0px;word-break:break-all;display:block;\"></span><br style=\"margin:0px;padding:0px;word-break:break-all;\" />\r\n</div>\r\n<div class=\"clear\" style=\"margin:0px;padding:0px;word-break:break-all;clear:both;font-size:0px;line-height:0px;height:0px;visibility:hidden;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';white-space:normal;background-color:#FFFFFF;\">\r\n</div>\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	<br />\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	20世纪80年代的时候，科学家们曾经培育出一颗发光的烟草。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	由合成生物学家Omri&nbsp;Amirav-Drory和植物科学家Kyle\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	Taylor所带领的这个研究团队，目标是将荧光基因移植到一种名为拟南芥的微小植物中。研究团队选择这种植物是因为它易于试验，而且传播到野外的风险最小。研究团队希望同样的过程对于玫瑰也有效，而且它更具商业吸引力。研究团队所使用的是荧光素酶，这种物质在萤火虫和一些发光的真菌和细菌中非常普遍。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	研究人员首先使用软件设计出了DNA序列，然后将DNA“打印”出来，最后将它移植到植物中。首先，基因被转移到重组质粒转化农杆菌中，由于它们能够彼此之间和与植物之间传递DNA，它们越来越多的被用于遗传工程学。这种方法只被用于原型研究，因为这种细菌会危害植物，而且这种生物体的任何使用都是严格受控的。哈弗医学院的一位遗传学教授George\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	Church支持这个项目，他说道：“生物学能够为更多的廉价光源提供灵感。生物学是非常节能的，而且能量包比电池更加密集。\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	这个团队并非是第一个培育出发光植物的团队。2008年加利福尼亚大学的科学家们使用荧光素酶培育出一株发光的烟草。2010年剑桥大学的研究人员能够使细菌发光，而且亮度足以让你在旁边阅读。研究团队的成员Theo\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	Sanderson说道：“没有人能够否认在发光树木照亮的小上散步是一个相当迷人的想法。”（过客/编译）\r\n</p>\r\n<br style=\"margin:0px;padding:0px;word-break:break-all;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;line-height:25px;white-space:normal;background-color:#FFFFFF;\" />\r\n<p style=\"margin-bottom:10px;padding:0px;word-break:break-all;line-height:23px;text-indent:2em;text-align:justify;word-wrap:break-word;color:#333333;font-family:Arial, Helvetica, sans-serif, \'Microsoft YaHei\';font-size:14px;white-space:normal;background-color:#FFFFFF;\">\r\n	转自：http://tech.qq.com/a/20130509/000046.htm\r\n</p>\r\n<span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"><span style=\"white-space:normal;\"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span>','2013-06-07/1.37053666958E+128289.jpg',635,2013,1,'联众编辑',2013,'大众网络',4,3,'在集资网站Kickstarter上一个发光植物的研究项目已经引起了投资者的广泛关注。这个项目最初的目标是筹集6.5万美元，到现在距离结束还有1个月时间就已经筹集了24.3万美元。进行这个项目的合成生物学团队声称，未来的树木可以作为灯使用。研究人员们希望他们DIY合成生物技术和廉价照明的结合物能够成为.','重要，新闻，牛逼'),(2,3,0,'习近平:坚决防止和打击破坏少儿身心健康言行','<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	中广网北京5月30日消息 (记者马闯)据中国之声报道，在“六一”国际儿童节即将到来之际，中共中央总书记、国家主席、中央军委主席习近平昨天(29日)下午来到北京市少年宫，同来京参加交流体验活动的全国56个民族、革命老区、灾区、患有先天性心脏病少年儿童和农民工子女，以及首都城乡少年儿童代表1600多人，一起参加“快乐童年 放飞希望”主题队日活动，以一个“大朋友”的名义，向全国广大少年儿童祝贺节日。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　下午3时许，习近平来到少年宫门前，身着民族服装的各族少先队员和首都少年儿童代表迎上前来问好，一名少先队员为习近平系上红领巾。他向孩子们问好。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　习近平沿途看到一些少年儿童正兴致勃勃开展“趣味足球”、“跳花筋”、“抖空竹”等活动，他向孩子们挥手致意，并加入到孩子们中间共同抖起“欢乐伞”，孩子们欢呼着表达他们的兴奋之情。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　植物园农作物区，一畦畦番茄、芥蓝、芹菜等长势喜人，少年儿童正在从事整地、播种、移栽、松土、蔬菜采收等活动。习近平走过去，观看孩子们劳动，并蹲下身子同移栽人参果苗的两个孩子交谈，询问人参果主要产自哪里、生长期多长、适合什么样的水土，孩子们一一作答。习近平对孩子们说，生活靠劳动创造，人生也靠劳动创造。你们从小就要树立劳动光荣的观念，自己的事自己做，他人的事帮着做，公益的事争着做，通过劳动播种希望、收获果实，也通过劳动磨练意志，锻炼自己。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　经过“阅读木化石”活动区，习近平认真察看。少年儿童正在老师指导下用仪器读取各种环境因子数据，习近平同孩子们交流对环保的认识和理解。他说，大自然充满乐趣、无比美丽，热爱自然是一种好习惯，少年儿童要在这方面发挥小主人的作用。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　随后，习近平前往少年宫主楼，沿途看到一些女孩子正在练习足球，他招呼她们过来，观看他们的基本功操演。在主楼二层，他看望了正在进行手工制作的几名先天性心脏病治愈儿童。习近平关切地询问他们的治疗情况，祝他们过上更幸福的生活。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　主楼三楼，来自汶川、玉树、舟曲、芦山等灾区的少年儿童正在进行“美好家园创意搭建”，习近平走过去听孩子们介绍，肯定他们建设美好家园的决心和信心，称赞他们体现先进建筑理念的创新创造意识。习近平对孩子们说，想象力、创造力从哪里来？要从刻苦的学习中来。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　习近平：知识越多越好，你们要像海绵吸水一样多学习知识。既勤学书本知识，又多学课外知识，还要勤于思考，多动脑，这样就能培养自己的创造精神。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　在主楼一层大厅，一颗心愿树上挂满了孩子们的心愿卡，一些来自革命老区的少年儿童和农村留守儿童、进城务工人员随迁子女向总书记诉说心愿。习近平频频点头，说我此刻的心愿就是你们都心想事成。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　最后，习近平牵着孩子们的手，来到大厅中央，观看各族少年儿童联欢活动。他对簇拥过来的孩子们说，少年儿童从小就要立志向、有梦想，爱学习、爱劳动、爱祖国，德智体美全面发展，长大后做对祖国建设有用的人才。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　习近平强调，孩子们成长得更好，是我们最大的心愿。党和政府要始终关心各族少年儿童，努力地为他们学习成长创造更好的条件。老师、家长要承担起教育引导少年儿童成长成才的责任。少先队组织要更好地为少年儿童服务。全社会都要关心少年儿童成长。对损害少年儿童权益、破坏少年儿童身心健康的言行，要坚决防止和依法打击。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　习近平：我们要维护好少年儿童的权益，我们不能让侵害少年儿童权益的言行发生。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　听了总书记的话，在场的孩子和教育工作者深受感动，大厅里响起阵阵热烈的掌声。习近平同孩子们和少年宫老师们合影留念，快乐洋溢在他们的笑脸上。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　离开前，习近平观看了孩子们表演的手风琴合奏和童声合唱，在《歌声与微笑》的旋律中，他同孩子和老师们告别，歌声在操场上久久回荡。\r\n</p>\r\n<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;font-size:14px;line-height:23px;color:#333333;font-family:宋体;white-space:normal;background-color:#FFFFFF;\">\r\n	　　王沪宁、刘延东、李源潮、栗战书、郭金龙、沈跃跃以及教育部、共青团中央、北京市委和市政府负责同志陪同参加活动。\r\n</p>\r\n<br />','2013-06-08/1.37067647646E+121370.jpg',4368,2013,1,'重要新闻2',2013,'重要新闻2',127,1234,'重要新闻2','重要新闻2'),(6,1,0,'阿里竞价后“华丽转身”你怎么看','<p>\r\n	<span style=\"font-size:14px;line-height:23px;white-space:normal;background-color:#F5F8FD;\">2013年6月前后，阿里先后分别与奇虎360、百度展开合作，对于360联合一淘推购物搜索，笔者没有什么话好说，毕竟是他们你情我愿的事情。但是阿里与百度的牵手，笔者提起来就恼火，开口闭口的百度一直说用户体验，在巨额资金面前又是如何的呢?</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;line-height:23px;white-space:normal;background-color:#F5F8FD;\">\r\n	<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;border:0px;outline:0px;font-size:14px;vertical-align:baseline;background-color:#F5F8FD;line-height:23px;white-space:normal;\">\r\n		阿里与百度之间的框架竞价差不多有半个月时间了，阿里的实际行动其实早在5月下旬就开始了，从再初的男装、女装，再到笔者自身的威世顿净水器，到如今笔者从事的净水器行业。\r\n	</p>\r\n	<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;border:0px;outline:0px;font-size:14px;vertical-align:baseline;background-color:#F5F8FD;line-height:23px;white-space:normal;\">\r\n		　　2008年，阿里与百度分手，阿里官方表示，此举是为了杜绝不良商家的欺诈行为。时隔5年，阿里与百度再度相逢，“婚后”的行为说明了什么呢?从绑架品牌词，再到行业长尾词的垄断，这难道不是阿里的欺诈行为么?不说这么多了，直接上图说话。\r\n	</p>\r\n	<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;border:0px;outline:0px;font-size:14px;vertical-align:baseline;background-color:#F5F8FD;line-height:23px;white-space:normal;\">\r\n		　　笔者从事的净水器行业，基本上全部被百度变相侵占了，从业内推广外推做得好的品牌词开始，再到净水器行业长尾词，净水器有用吗、净水器原理、净水器价格、净水器安装、净水器品牌、净水器滤芯、净水器市场，基本上80%的流量全部被无情的劫走，从主推栏再到后侧栏。\r\n	</p>\r\n	<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;border:0px;outline:0px;font-size:14px;vertical-align:baseline;background-color:#F5F8FD;line-height:23px;white-space:normal;\">\r\n		　　值得表扬的是，最近阿里巴巴集团已经把集团下各个平台的客服电话接入百度搜索，用户可以通过百度搜索淘宝、天猫商城、支付宝等平台的客服电话，百度还将提供“蓝色认证标志”，以保证客服电话的安全和准确，并且阿里集团还将支付宝智能客服系统接入百度应用。\r\n	</p>\r\n	<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;border:0px;outline:0px;font-size:14px;vertical-align:baseline;background-color:#F5F8FD;line-height:23px;white-space:normal;\">\r\n		　　笔者希望阿里的品牌词截流，行业词截流种种不耻行为可以停止了，特别是品牌词截流，这不是纯粹在仗着财大气粗公开耍流氓么?无论接下来百度与阿里将进行怎样的深度合作，笔者和广大站长朋友也是一样，希望双方在保证互联网良好环境下进行更利于用户体验的操作。笔者QQ：465145377，愿与广大站长互相交流，共同进步!\r\n	</p>\r\n	<p style=\"margin-top:15px;margin-bottom:15px;padding:0px;border:0px;outline:0px;font-size:14px;vertical-align:baseline;background-color:#F5F8FD;line-height:23px;white-space:normal;\">\r\n		　　本文由汉品尼斯家用纯水机：http://www.hpnsjs.com原创提供，A5首发，版权所有，文责自负，转载请注明，谢谢!\r\n	</p>\r\n<br />\r\n</span>\r\n</p>','',34,2013,1,'',2013,'',0,0,'阿里竞价后“华丽转身”你怎么看','');

/*Table structure for table `cm_assignments` */

DROP TABLE IF EXISTS `cm_assignments`;

CREATE TABLE `cm_assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cm_assignments` */

insert  into `cm_assignments`(`itemname`,`userid`,`bizrule`,`data`) values ('Authority','1','','s:0:\"\";'),('总管理','1','','s:0:\"\";'),('总管理','3','','s:0:\"\";'),('Authority','3','','s:0:\"\";');

/*Table structure for table `cm_author_connector` */

DROP TABLE IF EXISTS `cm_author_connector`;

CREATE TABLE `cm_author_connector` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `openId` char(50) DEFAULT NULL,
  `source` char(50) DEFAULT NULL,
  `accessToken` char(50) DEFAULT NULL,
  `createTime` char(30) DEFAULT NULL,
  `validate` char(3) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=260 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_caiji` */

DROP TABLE IF EXISTS `cm_caiji`;

CREATE TABLE `cm_caiji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL COMMENT '采集网址',
  `status` tinyint(1) DEFAULT '1' COMMENT '2采集成功 1未采集3采集失败',
  `type` tinyint(1) DEFAULT NULL COMMENT '状态0已采集1未采集',
  `start_page` int(11) DEFAULT NULL,
  `stop_page` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL COMMENT '分类id',
  `laiyuan` varchar(255) DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `cate_name` varchar(255) DEFAULT NULL,
  `bianma` tinyint(1) DEFAULT '1' COMMENT '1 utf8 2gb2312',
  `img_path` varchar(255) DEFAULT NULL COMMENT '图片存储路径',
  `host` varchar(255) DEFAULT NULL COMMENT '自己的域名',
  `guize_id` int(11) DEFAULT NULL COMMENT '规则ID',
  `caiji_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_caiji_article` */

DROP TABLE IF EXISTS `cm_caiji_article`;

CREATE TABLE `cm_caiji_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `keywords` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '0未转储 1已转储 2文章已存在不需转储',
  `mark` text,
  `caiji_id` int(11) DEFAULT NULL,
  `click` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `laiyuan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_caiji_guize` */

DROP TABLE IF EXISTS `cm_caiji_guize`;

CREATE TABLE `cm_caiji_guize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guize_name` varchar(255) DEFAULT NULL,
  `a_guize` text,
  `title_guize` text,
  `content_guize` text,
  `auto_keywords` tinyint(1) DEFAULT NULL COMMENT '自动获取关键词 1自动 0取消',
  `keywords_guize` text,
  `des_guize` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_cate` */

DROP TABLE IF EXISTS `cm_cate`;

CREATE TABLE `cm_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL,
  `sort` smallint(5) NOT NULL,
  `img` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1分类2单页',
  `con` text COMMENT '单页内容',
  `title` varchar(255) DEFAULT NULL COMMENT '单页标题',
  `des` text COMMENT '单页描述',
  `keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `cm_cate` */

insert  into `cm_cate`(`id`,`name`,`create_time`,`status`,`sort`,`img`,`pid`,`type`,`con`,`title`,`des`,`keywords`) values (1,'互联网',2013,1,9,'2013-05-30/1.36988898908E+127676.jpg',0,1,'<img src=\"http://www.ebenchu.com/assets/741c59af/plugins/emoticons/images/jx2/j_0003.gif\" border=\"0\" alt=\"\" /><br />','','',NULL),(2,'创业',2013,1,2,'2013-06-10/1.37087474112E+128145.jpg',0,1,'','','',NULL),(3,'资讯',2013,1,9,'2013-06-10/1.37087476106E+124126.jpg',0,1,'','','',NULL),(4,'关于辰木',2013,1,1,'2013-06-10/1.37087477598E+122405.jpg',0,2,'<p>\r\n	<span style=\"color:#666666;font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:#FFFFFF;\">辰木社区系统由一群技术爱好者创建。</span>\r\n</p>\r\n<p>\r\n	<span style=\"color:#666666;font-family:Arial, Helvetica, sans-serif;font-size:12px;white-space:normal;background-color:#FFFFFF;\">辰木将本着开源精神，服务草根。</span>\r\n</p>','关于辰木','关于辰木',NULL),(10,'辰木声明',2013,1,3,'2013-06-15/1.37131004818E+12364.jpg',0,2,'开源、永久免费','辰木声明','辰木声明',NULL),(9,'联系我们',2013,1,2,'2013-06-15/1.37130994877E+124391.jpg',0,2,'<p>\r\n	<strong>辰木小组成员</strong>\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;飞龙在天 QQ 57766213\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;熊大 &nbsp; &nbsp; QQ&nbsp;250433221\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"white-space:normal;\">辉哥</span>\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;凉皮\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;光头强\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;毛磕\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; 复活节\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; 沉默\r\n</p>','联系我们','联系我们',NULL);

/*Table structure for table `cm_config` */

DROP TABLE IF EXISTS `cm_config`;

CREATE TABLE `cm_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `site_url` varchar(255) DEFAULT NULL COMMENT '网站url',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL COMMENT '网站描述',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT '网站关键词',
  `site_logo` char(100) DEFAULT NULL COMMENT '网站logo',
  `site_copyright` varchar(255) DEFAULT NULL,
  `site_code` text,
  `site_slogan` text,
  `qq_key` char(50) DEFAULT NULL,
  `qq_secret` char(50) DEFAULT NULL,
  `sina_key` char(50) DEFAULT NULL,
  `sina_secret` char(50) DEFAULT NULL,
  `host` char(50) DEFAULT NULL COMMENT '邮箱host',
  `port` char(5) DEFAULT NULL COMMENT '邮件端口',
  `username` char(100) DEFAULT NULL COMMENT '用户名',
  `password` char(100) DEFAULT NULL COMMENT '密码',
  `from` char(100) DEFAULT NULL COMMENT '发件人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cm_config` */

insert  into `cm_config`(`id`,`site_name`,`site_url`,`seo_title`,`seo_description`,`seo_keywords`,`site_logo`,`site_copyright`,`site_code`,`site_slogan`,`qq_key`,`qq_secret`,`sina_key`,`sina_secret`,`host`,`port`,`username`,`password`,`from`) values (1,'辰木','辰木系统','辰木 - 开源社区','辰木是一个轻量级的开源社区系统，是一个可以用来搭建讨论组，bbs和圈子的社区系统。辰木是将sns社会化网络元素，人和圈子(讨论组)结合在一起的新型的社交系统。','辰木,SNS,开源社区,开源小组,开源网站','2013-06-15/1.37123117663E+123955.jpg','© 2005－2013 ebenchu.com, all rights reserved\r\n<br />\r\n京ICP备11027288号','<script type=\"text/javascript\">\r\n                var _bdhmProtocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");\r\n                document.write(unescape(\"%3Cscript src=\'\" + _bdhmProtocol + \"hm.baidu.com/h.js%3F2a697ada8f4019ec8c7e71a42a889ca4\' type=\'text/javascript\'%3E%3C/script%3E\"));\r\n                </script>','辰木开源社区1.0正式上线<a target=\"_blank\" href=\"http://wp.qq.com/wpa/qunwpa?idkey=622a62c547e08111706d56b075c19c8f5a3196f909a920cbb32ef2e4ed7f8b92\"><img border=\"0\" src=\"http://pub.idqqimg.com/wpa/images/group.png\" alt=\"yii辰木开源社区\" title=\"yii辰木开源社区\"></a>','','','','','','','','','');

/*Table structure for table `cm_group` */

DROP TABLE IF EXISTS `cm_group`;

CREATE TABLE `cm_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '0' COMMENT 'tag分类',
  `name` varchar(30) NOT NULL COMMENT '小组名称',
  `logo` varchar(50) NOT NULL COMMENT '小组logo',
  `des` text NOT NULL COMMENT '小组简介',
  `sort` smallint(5) NOT NULL COMMENT '排序',
  `pnum` int(11) NOT NULL DEFAULT '0' COMMENT '小组成员数',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '默认禁用0 启用1',
  `type` tinyint(1) NOT NULL COMMENT '小组类型 1公开 2私有',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户id 默认系统0 管理员1',
  `tag` varchar(255) DEFAULT NULL COMMENT '标签',
  `alias` char(100) DEFAULT NULL COMMENT '小组成员别名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `cm_group` */

insert  into `cm_group`(`id`,`tid`,`name`,`logo`,`des`,`sort`,`pnum`,`create_time`,`status`,`type`,`uid`,`tag`,`alias`) values (1,4,'yii研究小组','2013-06-13/1.37111770991E+125287.jpg','Yii是一个基于组件、用于开发大型 Web 应用的 高性能 PHP 框架。Yii 几乎拥有了 所有的特性 ，包括 MVC、DAO/ActiveRecord、I18N/L10N、caching、基于 JQuery 的 AJAX 支持、用户认证和基于角色的访问控制、脚手架、输入验证、部件、事件、主题化以及 Web 服务等等。Yii 采用严格的 OOP 编写，Yii 使用简单，非常灵活，具有很好的可扩展性。',0,27,1371287089,1,1,1,'yii,php,网站技术','yii研究大师'),(2,4,'建议与意见组','2013-06-14/1.37114371416E+122144.jpg','您对本网站什么好的建议或者意见，可以在此发表我们会第一时间回复您！',0,13,1371287089,1,1,1,'旅行','成员'),(3,4,'官方小组 ','2013-06-14/1.37114406278E+123662.jpg','发布官网最新消息',10,11,1371287089,1,1,1,'官方小组 ','管理员'),(7,4,'网站建设','2013-06-13/1.37111748834E+125230.jpg','定制开发需求，联系官方小组',0,7,1371287089,1,1,5,'网站建设','站长'),(8,4,'创业故事','2013-06-14/1.37114432476E+127106.jpg','创业的路是艰辛的，也是令人骄傲的',0,5,1371287089,1,1,5,'创业','创业者'),(11,4,'BUG反馈','2013-06-13/1.37111665907E+126755.jpg','BUG反馈',0,19,1371287089,1,0,5,'BUG反馈','杀虫专家'),(14,4,'风格模板组','2013-06-13/1.37111733723E+129010.jpg','风格模板组',0,5,1371287089,1,0,5,'风格模板组','模板狂人'),(13,4,'案例展示','2013-06-13/1.37111679609E+127386.jpg','案例展示',0,7,1371287089,1,0,5,'案例展示','案例狂人'),(15,4,'APP开发','2013-06-14/1.37118130023E+125892.jpg','基于辰木的APP开发学习和交流。官方会根据用户关注度高低决定是否扩展开发相应APP。',0,6,1371287089,1,0,5,'APP开发','开发狂人'),(16,4,'开源系统','2013-06-16/1.37131746287E+122238.jpg','基于辰木系统底层建立的其他应用系统，定制开发属于您的行业系统，请点击网站下面的联系我们联系官方。',0,6,1371287089,1,0,5,'开源系统','开源者'),(18,4,'android开发组','2013-06-16/1.37139218294E+126299.jpg','android开发组',0,4,1371392186,1,0,27,'android开发组','安卓开发'),(19,0,'golang','','go语言',0,1,1371435195,2,0,47,'go',NULL),(20,0,'vb.net','','vb.net',0,1,1371435334,2,0,47,'vb',NULL),(21,0,'sss','','ss',0,1,1371438942,2,0,59,'',NULL),(22,0,'建议小组','','...',0,1,1371448201,2,0,52,'建议',NULL),(23,0,'松岛枫','2013-06-17/1.37144928965E+126343.jpg','松岛枫',0,1,1371449291,2,0,80,'松岛枫',NULL),(24,0,'茶之道','','\n<a href=\"http://www.chazhidao.cn\">测试茶之道</a>',0,1,1371524066,2,0,142,'',NULL),(25,0,'','','',0,1,1371538029,2,0,151,'',NULL),(26,0,'asdfas','','asdfasd',0,1,1371562973,2,0,71,'asdfasdf',NULL),(27,0,'测试小组','','测试一下bug',0,1,1371604825,2,0,149,'bug',NULL),(28,0,'测试小组','','我的小组',0,1,1371610140,2,0,149,'小组测试',NULL),(29,4,'山野村夫','2013-06-20/1.37170434111E+127577.jpg','闲时的来唠嗑，忙时的来宣泄。',0,3,1371704342,1,0,183,'杂谈','唠嗑儿'),(30,0,'','2013-06-20/1.37171268314E+122124.jpg','',0,1,1371712684,2,0,196,'',NULL),(31,0,'','','',0,1,1371712688,2,0,196,'',NULL),(32,0,'','','',0,1,1371712692,2,0,196,'',NULL),(33,0,'','','',0,1,1371712695,2,0,196,'',NULL);

/*Table structure for table `cm_hdcate` */

DROP TABLE IF EXISTS `cm_hdcate`;

CREATE TABLE `cm_hdcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `name` char(100) DEFAULT NULL COMMENT '分类名称',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cm_hdcate` */

insert  into `cm_hdcate`(`id`,`pid`,`name`,`create_time`) values (1,0,'音乐',1371565113),(2,1,'小型现场',1371565127);

/*Table structure for table `cm_hu` */

DROP TABLE IF EXISTS `cm_hu`;

CREATE TABLE `cm_hu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) DEFAULT NULL COMMENT '活动id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `create_time` int(11) DEFAULT NULL COMMENT '参见活动时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cm_hu` */

/*Table structure for table `cm_huodong` */

DROP TABLE IF EXISTS `cm_huodong`;

CREATE TABLE `cm_huodong` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) DEFAULT NULL COMMENT '活动组织者',
  `cid` int(10) DEFAULT NULL COMMENT '活动分类',
  `title` char(100) DEFAULT NULL COMMENT '活动标题',
  `time` char(100) DEFAULT NULL COMMENT '活动时间',
  `address` varchar(255) DEFAULT NULL COMMENT '活动地点',
  `feiyong` char(100) DEFAULT NULL COMMENT '活动费用',
  `zhuban` char(100) DEFAULT NULL COMMENT '主办方',
  `info` text COMMENT '活动详情',
  `logo` char(100) DEFAULT NULL COMMENT '活动logo',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cm_huodong` */

insert  into `cm_huodong`(`id`,`uid`,`cid`,`title`,`time`,`address`,`feiyong`,`zhuban`,`info`,`logo`,`create_time`) values (1,5,2,'摇滚新势力-降噪*摇滚中坚不插电音乐会（痛仰/痛苦的信仰）','06月29日 周六 19:30-22:00','北京 东城区 保利剧院','100元(最低票价)','永乐票务','<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\"><span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">欢迎关注永乐票务豆瓣小站：</span><a href=\"http://www.douban.com/link2?url=http%3A%2F%2Fsite.douban.com%2Fylpw228%2F&amp;link2key=561c2469de\" style=\"cursor:pointer;color:#3377AA;text-decoration:none;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">http://site.douban.c<wbr>om/ylpw228/</a><span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">摇滚新势力-降噪*摇滚中坚不插电音乐会&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">演出时间：2013-06-25 ~ 2013-07-01&nbsp;<img src=\"http://www.ebenchu.com/assets/741c59af/plugins/emoticons/images/jx2/j_0002.gif\" border=\"0\" alt=\"\" /></span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">演出场馆：保利剧院&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">演出明星：木玛乐队、脑浊乐队、爽子与瓷乐队、痛苦的信仰乐队、谢天笑、子曰乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">演出票价：100 260 310(260*2) 360 410(360*2) 560 610(560*2) 660 860 （套票非常实惠哟~）&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">永乐票务&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">在线订票：</span><a href=\"http://www.douban.com/link2?url=http%3A%2F%2Fwww.228.com.cn%2Fticket-45435816.html%3Fsource%3Ddouban%26ozs%3D27&amp;link2key=561c2469de\" target=\"_blank\" rel=\"nofollow\" style=\"cursor:pointer;color:#3377AA;text-decoration:none;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">http://www.228.com.c<wbr>n/ticket-45435816.ht<wbr>ml?source=douban&amp;<wbr>;ozs=27</a><span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">电话订票：4006-228-228&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">★免费抢票活动：</span><a href=\"http://www.douban.com/link2?url=http%3A%2F%2Fwww.douban.com%2Fevent%2F19004861%2F&amp;link2key=561c2469de\" style=\"cursor:pointer;color:#3377AA;text-decoration:none;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">http://www.douban.co<wbr>m/event/19004861/</a><span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">日程安排：&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013-6-25 木玛乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013-6-26 脑浊乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013-6-27 爽子与瓷乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013-6-29 痛苦的信仰乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013-6-30 谢天笑&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013-7-1 子曰秋野乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">中国首次最纯正的摇滚不插电系列音乐会&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">集结当今摇滚乐坛最具代表性的6支乐队&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">首次集体进入标志性剧院—北京保利剧院&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">降噪，绝不是妥协，让摇滚乐，重返纯真！&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">2013年距“1994中国摇滚乐势力”历史性演出已经过去20个年头，在过去的20年里，中国摇滚乐发生了历史性的变革，摇滚乐不再只是呐喊与反叛的代名词，而更趋向于自我意识的觉醒和多元个性的表达。&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">在当今中国摇滚乐界活跃着一批有强大号召力的乐队及音乐家们，他们通过无数场现场演出得到越来越多的忠实乐迷和社会认可，他们改变着中国现代音乐文化生态，改写了摇滚乐史……他们是近年来中国乐坛最具影响力的音乐力量，而这股力量来源于他们的现场！&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">北演55周年演出季联手乐视网“LIVE生活”音乐会集结了木玛、脑浊乐队、爽子与瓷乐队、痛仰乐队、谢天笑、子曰秋野6支当今摇滚乐坛最具代表性的乐队，在标志性剧院—北京保利剧院，采用纯粹不插电的演出形式，上演6场不插电摇滚音乐会，开启中国摇滚乐新的史诗级篇章。&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">降噪，绝不是妥协！收起外露的锋芒、直面内心的力量，将摇滚乐最原始的情感用更真实、细腻的方式表达出来，让摇滚乐，灿烂涅槃！&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">痛仰乐队：&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">主唱: 高虎 吉它: 田然 吉它: 宋捷 贝司：张静&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">鼓： 大伟 手风琴／经纪人：齐静 风　格： 独立摇滚&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">乐队成立于1999年北京。素来以“即便是苦痛，也无法阻止我们仰起的头颅”为行动信条，行走在音乐的路上。至今共出版五张专辑及EP。作品取材于乐队成员在路上的真实生活感受，足迹遍布国内外各个角落，大小近千个地方，乐队成员从不同文化中挖掘出共源，汲取音乐灵感，以严谨的音乐态度，用理性牵引感性，打造出至真至情的旋律。&nbsp;</span><br style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\" />\r\n<span style=\"color:#111111;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\">在众多乐迷心目中，“痛仰“的音乐带给大家更多的是“在路上”、“信念”、“坚持”等精神的推动力，鼓励年轻人用更勇敢、率真的精神面对生活。至此也成为众多摇滚乐队中最具号召力的精神领袖。</span></span><a href=\"http://www.douban.com/event/18883690/#\" id=\"unfoldDescHook\" style=\"cursor:pointer;color:#3377AA;text-decoration:none;font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:19px;white-space:normal;background-color:#FFFFFF;\"></a>','2013-06-18/1.37156771667E+127379.jpg',1371568675);

/*Table structure for table `cm_itemchildren` */

DROP TABLE IF EXISTS `cm_itemchildren`;

CREATE TABLE `cm_itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cm_itemchildren` */

insert  into `cm_itemchildren`(`parent`,`child`) values ('总管理','ad'),('总管理','admins'),('总管理','article'),('总管理','authitem'),('总管理','cate'),('总管理','config'),('总管理','group'),('总管理','hdcate'),('总管理','huodong'),('总管理','links'),('总管理','member'),('总管理','tag'),('总管理','topic');

/*Table structure for table `cm_items` */

DROP TABLE IF EXISTS `cm_items`;

CREATE TABLE `cm_items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  `sort` tinyint(3) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cm_items` */

insert  into `cm_items`(`name`,`type`,`description`,`bizrule`,`data`,`sort`) values ('Authority',2,NULL,NULL,NULL,NULL),('总管理',2,'','','s:0:\"\";',NULL),('authitem',1,'权限分配','','s:12:\"系统功能\";',NULL),('member',1,'会员管理','','s:12:\"网站管理\";',NULL),('add',0,'新增','','s:0:\"\";',NULL),('update',0,'修改','','s:0:\"\";',NULL),('delete',0,'删除','','s:0:\"\";',NULL),('index',0,'查看','','s:0:\"\";',NULL),('admins',1,'用户管理','','s:12:\"系统功能\";',NULL),('group',1,'小组管理','','s:12:\"社区管理\";',NULL),('topic',1,'话题管理','','s:12:\"社区管理\";',NULL),('tag',1,'标签管理','','s:12:\"社区管理\";',NULL),('cate',1,'文章分类管理','','s:12:\"内容管理\";',NULL),('article',1,'文章管理','','s:12:\"内容管理\";',NULL),('config',1,'站点设置','','s:12:\"网站管理\";',NULL),('ad',1,'广告管理','','s:12:\"内容管理\";',NULL),('links',1,'友情链接管理','','s:12:\"网站管理\";',NULL),('hdcate',1,'分类管理','','s:12:\"活动管理\";',NULL),('huodong',1,'活动管理','','s:12:\"活动管理\";',NULL);

/*Table structure for table `cm_links` */

DROP TABLE IF EXISTS `cm_links`;

CREATE TABLE `cm_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL COMMENT '名称',
  `url` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `sort` smallint(5) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `cm_links` */

insert  into `cm_links`(`id`,`name`,`url`,`img`,`sort`,`create_time`,`status`) values (1,'茶之道','http://www.chazhidao.cn','2013-06-16/1.37132481356E+129752.jpg',1,1371541574,2),(2,'YinCart','http://yincart.com/','2013-06-18/1.37154151003E+122667.jpg',1,1371541511,1),(3,'mincms','http://mincms.com/','2013-06-18/1.37154195312E+126353.jpg',2,1371541956,1),(4,'YiiSpace','https://github.com/yiqing-95/yiiSpace','2013-06-18/1.37154200687E+12366.jpg',3,1371542008,1),(5,'cmshead','http://www.cmshead.com/','2013-06-19/1.37160454798E+127214.gif',4,1371604552,1);

/*Table structure for table `cm_member` */

DROP TABLE IF EXISTS `cm_member`;

CREATE TABLE `cm_member` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `nickname` varchar(50) NOT NULL COMMENT '昵称/姓名',
  `password` char(32) NOT NULL COMMENT '密码',
  `bind_account` varchar(50) NOT NULL COMMENT '绑定帐户',
  `last_login_time` int(11) unsigned DEFAULT '0' COMMENT '上次登录时间',
  `last_login_ip` varchar(40) DEFAULT NULL COMMENT '上次登录IP',
  `verify` varchar(32) DEFAULT NULL COMMENT '证验码',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `create_time` int(11) unsigned NOT NULL COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  `role_id` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '对应角色ID',
  `info` text NOT NULL COMMENT '信息',
  `salt` int(11) NOT NULL COMMENT '加盐值',
  `photo` varchar(50) NOT NULL COMMENT '头像',
  `score` int(11) DEFAULT '0' COMMENT '积分',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=261 DEFAULT CHARSET=utf8 COMMENT='后台用户表';


/*Table structure for table `cm_mmember` */

DROP TABLE IF EXISTS `cm_mmember`;

CREATE TABLE `cm_mmember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL COMMENT '用户id',
  `gid` int(11) NOT NULL COMMENT '组id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_reply` */

DROP TABLE IF EXISTS `cm_reply`;

CREATE TABLE `cm_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `content` text NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `cm_reply` */

/*Table structure for table `cm_response` */

DROP TABLE IF EXISTS `cm_response`;

CREATE TABLE `cm_response` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `tid` int(11) NOT NULL COMMENT '话题id',
  `content` text NOT NULL COMMENT '内容',
  `create_time` int(11) NOT NULL COMMENT '回应时间',
  `status` tinyint(1) NOT NULL COMMENT '状态',
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;

/*Table structure for table `cm_role` */

DROP TABLE IF EXISTS `cm_role`;

CREATE TABLE `cm_role` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `name` varchar(6) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `multiple` tinyint(4) DEFAULT '1' COMMENT '积分倍数',
  `upnum` int(11) DEFAULT NULL COMMENT '角色积分条件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_score` */

DROP TABLE IF EXISTS `cm_score`;

CREATE TABLE `cm_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zongsx` smallint(5) NOT NULL COMMENT '总上线',
  `fatie` smallint(5) DEFAULT NULL COMMENT '发帖',
  `fatiesx` smallint(5) DEFAULT NULL COMMENT '发帖上限分',
  `huitie` smallint(5) DEFAULT NULL COMMENT '回帖',
  `huitiesx` smallint(5) DEFAULT NULL COMMENT '帖回上限分',
  `xihuansx` smallint(6) DEFAULT NULL COMMENT '喜欢上限分',
  `xihuan` smallint(6) DEFAULT NULL COMMENT '喜欢',
  `zhuce` smallint(5) DEFAULT NULL COMMENT '注册送分',
  `shoujiyz` smallint(5) DEFAULT NULL COMMENT '手机验证',
  `emailyz` smallint(5) DEFAULT NULL COMMENT '邮箱验证',
  `yaoqing` smallint(5) DEFAULT NULL COMMENT '邀请',
  `yaoqingsx` smallint(5) DEFAULT NULL COMMENT '邀请上限分',
  `jiajingsx` smallint(6) DEFAULT NULL,
  `jiajing` smallint(5) DEFAULT NULL COMMENT '加精',
  `zhidingsx` smallint(6) DEFAULT NULL,
  `zhiding` smallint(5) DEFAULT NULL COMMENT '置顶',
  `denglu` smallint(5) DEFAULT NULL COMMENT '登陆',
  `shantie` smallint(5) DEFAULT NULL COMMENT '删帖扣分',
  `jiahaoyou` smallint(5) DEFAULT NULL COMMENT '加好友',
  `jiahaoyousx` smallint(5) DEFAULT NULL COMMENT '加好友上限',
  `jiangli` smallint(5) DEFAULT NULL COMMENT '奖励',
  `xiaozusx` smallint(6) DEFAULT NULL COMMENT '小组上限分',
  `xiaozu` smallint(5) DEFAULT NULL,
  `qiandao` smallint(5) DEFAULT NULL COMMENT '签到',
  `caina` smallint(5) DEFAULT NULL COMMENT '意见采纳',
  `sanfen` smallint(5) DEFAULT NULL COMMENT '散分',
  `chengfa` smallint(5) DEFAULT NULL COMMENT '惩罚',
  `jianglisx` smallint(6) DEFAULT NULL,
  `touxiang` smallint(6) DEFAULT NULL,
  `shanchu` smallint(6) DEFAULT NULL,
  `jiazu` smallint(6) DEFAULT NULL COMMENT '加入小组',
  `jiazusx` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cm_score` */

insert  into `cm_score`(`id`,`zongsx`,`fatie`,`fatiesx`,`huitie`,`huitiesx`,`xihuansx`,`xihuan`,`zhuce`,`shoujiyz`,`emailyz`,`yaoqing`,`yaoqingsx`,`jiajingsx`,`jiajing`,`zhidingsx`,`zhiding`,`denglu`,`shantie`,`jiahaoyou`,`jiahaoyousx`,`jiangli`,`xiaozusx`,`xiaozu`,`qiandao`,`caina`,`sanfen`,`chengfa`,`jianglisx`,`touxiang`,`shanchu`,`jiazu`,`jiazusx`) values (1,100,1,10,1,10,10,1,10,10,10,2,10,10,1,10,1,5,1,1,10,1,10,2,1,1,1,5,10,2,2,1,10);

/*Table structure for table `cm_tag` */

DROP TABLE IF EXISTS `cm_tag`;

CREATE TABLE `cm_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '标签父id',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `sort` smallint(5) NOT NULL COMMENT '排序',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `cm_tag` */

insert  into `cm_tag`(`id`,`pid`,`title`,`sort`,`createtime`) values (3,0,'兴趣',1,'2013-05-30 22:09:49'),(4,3,'旅行',1,'2013-05-30 22:11:04'),(5,3,'摄影',1,'2013-05-30 22:11:23'),(6,3,'影视',1,'2013-05-30 22:12:40'),(7,3,'音乐',1,'2013-05-30 22:12:53'),(8,0,'生活',1,'2013-05-30 22:19:09'),(9,8,'健康',1,'2013-05-30 22:19:35'),(10,8,'美食',1,'2013-05-30 22:19:47'),(11,3,'魔兽',1,'0000-00-00 00:00:00');

/*Table structure for table `cm_topic` */

DROP TABLE IF EXISTS `cm_topic`;

CREATE TABLE `cm_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `gid` int(11) NOT NULL COMMENT '组id',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '禁用0 启用1',
  `response_num` int(11) NOT NULL DEFAULT '0' COMMENT ' 回应总数',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `hot` int(11) NOT NULL DEFAULT '0' COMMENT '热度',
  `istop` tinyint(1) DEFAULT '2' COMMENT '是否置顶1是2否',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;


/*Table structure for table `cm_user_score` */

DROP TABLE IF EXISTS `cm_user_score`;

CREATE TABLE `cm_user_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) DEFAULT NULL COMMENT '用户id',
  `fatiedf` smallint(5) DEFAULT NULL COMMENT '发帖得分',
  `huitiedf` smallint(5) DEFAULT NULL COMMENT '回帖得分',
  `xihuandf` smallint(5) DEFAULT NULL COMMENT '喜欢得分',
  `zhuce` smallint(5) DEFAULT NULL COMMENT '注册得分',
  `shoujiyz` smallint(5) DEFAULT NULL COMMENT '手机验证得分',
  `jiajingdf` smallint(6) DEFAULT NULL,
  `emailyz` smallint(5) DEFAULT NULL COMMENT 'email验证得分',
  `yaoqingdf` smallint(5) DEFAULT NULL COMMENT '邀请得分',
  `jiahaoyoudf` smallint(5) DEFAULT NULL COMMENT '加好友得分',
  `zhidingdf` smallint(5) DEFAULT NULL COMMENT '置顶得分',
  `shanchu` smallint(5) DEFAULT NULL COMMENT '删除扣分',
  `denglu` smallint(5) DEFAULT NULL COMMENT '登陆得分',
  `xiaozudf` smallint(6) DEFAULT NULL COMMENT '奖励得分上限',
  `jianglidf` smallint(5) DEFAULT NULL COMMENT '奖励得分',
  `caina` smallint(5) DEFAULT NULL COMMENT '采纳得分',
  `sanfen` smallint(6) DEFAULT NULL COMMENT '管理员散分',
  `shantie` smallint(6) DEFAULT NULL COMMENT '删帖扣分',
  `chengfa` smallint(6) DEFAULT NULL COMMENT '惩罚',
  `qiandao` smallint(6) DEFAULT NULL COMMENT '签到',
  `touxiang` smallint(6) DEFAULT NULL COMMENT '头像',
  `jiazudf` smallint(6) DEFAULT NULL COMMENT '加组得分',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
