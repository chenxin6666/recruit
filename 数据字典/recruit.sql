CREATE TABLE `user` (
`user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
`pwd` char(32) NULL COMMENT '用户密码',
`user_name` varchar(50) CHARACTER SET utf8 NULL COMMENT '用户名',
`email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '邮箱',
`moblie` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '联系方式',
PRIMARY KEY (`user_id`) 
)
COMMENT='用户表';

CREATE TABLE `user_info` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`u_id` tinyint(3) NULL COMMENT '用户id',
`diploma` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '学历 文凭',
`area_id` int(11) NULL COMMENT '详细地址',
`work_experience` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '工作经历',
`work_year` int(3) NULL COMMENT '工作时间',
`introduction` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '自我简介',
PRIMARY KEY (`id`) 
)
COMMENT='用户详情表';

CREATE TABLE `company` (
`com_id` int(11) NOT NULL AUTO_INCREMENT,
`com_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '企业名称',
`com_type` tinyint(3) NULL COMMENT '企业类型',
`area_id` int(100) NULL COMMENT '企业所有城市',
`com_address` varchar(100) NULL COMMENT '企业详细地址',
`com_profile` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '企业简介',
PRIMARY KEY (`com_id`) 
)
COMMENT='企业表';

CREATE TABLE `CV` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '简历内容',
`u_id` tinyint(3) NOT NULL COMMENT '用户id',
`title` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '简历标题',
PRIMARY KEY (`id`) 
)
COMMENT='简历表';

CREATE TABLE `position` (
`pid` int NOT NULL AUTO_INCREMENT COMMENT '职位id',
`c_id` tinyint(3) NULL COMMENT '职位的分类id',
`diploma` varchar(120) NULL COMMENT '需要的文凭',
`welfare` varchar(255) NULL COMMENT '福利待遇',
`salary` decimal(10,2) NULL COMMENT '给出的薪资',
`work_exp` text NULL COMMENT '工作经历',
`work_place` varchar(120) NULL COMMENT '工作地点',
`com_id` tinyint(3) NULL COMMENT '企业id',
PRIMARY KEY (`pid`) 
);

CREATE TABLE `pos_catagory` (
`cate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '职位分类id',
`cate_name` varchar(120) NULL COMMENT '职位分类名称',
`parent_id` int(11) NULL COMMENT '父类id',
PRIMARY KEY (`cate_id`) 
);

CREATE TABLE `field` (
`f_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '行业领域id',
`f_name` varchar(80) NULL COMMENT '行业领域名称',
`parent_id` int NULL COMMENT '父类id',
PRIMARY KEY (`f_id`) 
);

CREATE TABLE `address` (
`area_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地区id',
`parent_id` int(11) NULL COMMENT '父类id',
`area_name` varchar(50) NULL COMMENT '地区名称',
`sort` int(11) NULL COMMENT '排序',
PRIMARY KEY (`area_id`) 
);


ALTER TABLE `user` ADD CONSTRAINT `用户表和用户详情表的关联` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`u_id`);
ALTER TABLE `user` ADD CONSTRAINT `用户表和简历表的关系` FOREIGN KEY (`user_id`) REFERENCES `CV` (`u_id`);
ALTER TABLE `position` ADD CONSTRAINT `职位表与职位分类表的联系` FOREIGN KEY (`c_id`) REFERENCES `pos_catagory` (`cate_id`);
ALTER TABLE `position` ADD CONSTRAINT `职位表与企业表的联系` FOREIGN KEY (`com_id`) REFERENCES `company` (`com_id`);
ALTER TABLE `company` ADD CONSTRAINT `企业表和行业领域的联系` FOREIGN KEY (`com_type`) REFERENCES `field` (`f_id`);
ALTER TABLE `user_info` ADD CONSTRAINT `用户详情和地区表的联系` FOREIGN KEY (`area_id`) REFERENCES `address` (`area_id`);
ALTER TABLE `company` ADD CONSTRAINT `企业表和地区表的联系` FOREIGN KEY (`area_id`) REFERENCES `address` (`area_id`);

