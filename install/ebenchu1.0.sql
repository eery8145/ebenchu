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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Table structure for table `cm_assignments` */

DROP TABLE IF EXISTS `cm_assignments`;

CREATE TABLE `cm_assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Table structure for table `cm_hdcate` */

DROP TABLE IF EXISTS `cm_hdcate`;

CREATE TABLE `cm_hdcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL COMMENT '父id',
  `name` char(100) DEFAULT NULL COMMENT '分类名称',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Table structure for table `cm_hu` */

DROP TABLE IF EXISTS `cm_hu`;

CREATE TABLE `cm_hu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) DEFAULT NULL COMMENT '活动id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `create_time` int(11) DEFAULT NULL COMMENT '参见活动时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Table structure for table `cm_itemchildren` */

DROP TABLE IF EXISTS `cm_itemchildren`;

CREATE TABLE `cm_itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

/*Table structure for table `cm_mmember` */

DROP TABLE IF EXISTS `cm_mmember`;

CREATE TABLE `cm_mmember` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL COMMENT '用户id',
  `gid` int(11) NOT NULL COMMENT '组id',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*Table structure for table `cm_tag` */

DROP TABLE IF EXISTS `cm_tag`;

CREATE TABLE `cm_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '标签父id',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `sort` smallint(5) NOT NULL COMMENT '排序',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


insert  into `cm_ad`(`id`,`title`,`url`,`status`,`create_time`,`sort`,`img`,`type`) values (5,'广告1','http://www.ebenchu.com',1,1371287089,1,'2013-06-15/1.37128702415E+128643.jpg',1),(2,'名车','http://www.ebenchu.com/group',1,1371306206,0,'2013-06-15/1.37130620473E+128755.jpg',1),(3,'广告3','http://www.ebenchu.com',1,1371306295,0,'2013-06-15/1.37130627436E+125945.jpg',1),(4,'广告4','http://www.ebenchu.com/group',1,1371306320,0,'2013-06-15/1.37130631894E+128864.jpg',1);
insert  into `cm_assignments`(`itemname`,`userid`,`bizrule`,`data`) values ('Authority','1','','s:0:\"\";'),('总管理','1','','s:0:\"\";'),('总管理','3','','s:0:\"\";'),('Authority','3','','s:0:\"\";');
insert  into `cm_itemchildren`(`parent`,`child`) values ('总管理','ad'),('总管理','admins'),('总管理','article'),('总管理','authitem'),('总管理','cate'),('总管理','config'),('总管理','group'),('总管理','hdcate'),('总管理','huodong'),('总管理','links'),('总管理','member'),('总管理','tag'),('总管理','topic');
  insert  into `cm_items`(`name`,`type`,`description`,`bizrule`,`data`,`sort`) values ('Authority',2,NULL,NULL,NULL,NULL),('总管理',2,'','','s:0:\"\";',NULL),('authitem',1,'权限分配','','s:12:\"系统功能\";',NULL),('member',1,'会员管理','','s:12:\"网站管理\";',NULL),('add',0,'新增','','s:0:\"\";',NULL),('update',0,'修改','','s:0:\"\";',NULL),('delete',0,'删除','','s:0:\"\";',NULL),('index',0,'查看','','s:0:\"\";',NULL),('admins',1,'用户管理','','s:12:\"系统功能\";',NULL),('group',1,'小组管理','','s:12:\"社区管理\";',NULL),('topic',1,'话题管理','','s:12:\"社区管理\";',NULL),('tag',1,'标签管理','','s:12:\"社区管理\";',NULL),('cate',1,'文章分类管理','','s:12:\"内容管理\";',NULL),('article',1,'文章管理','','s:12:\"内容管理\";',NULL),('config',1,'站点设置','','s:12:\"网站管理\";',NULL),('ad',1,'广告管理','','s:12:\"内容管理\";',NULL),('links',1,'友情链接管理','','s:12:\"网站管理\";',NULL),('hdcate',1,'分类管理','','s:12:\"活动管理\";',NULL),('huodong',1,'活动管理','','s:12:\"活动管理\";',NULL);