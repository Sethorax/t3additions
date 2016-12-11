#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
    t3additions_menu_depth int(11) DEFAULT '0' NOT NULL,
    t3additions_menu_rootpage int(11) DEFAULT '0' NOT NULL,
    t3additions_menu_show_hidden int(11) DEFAULT '1' NOT NULL,
    t3additions_menu_exclude_pages tinytext,

    t3additions_map_center_lat varchar(99) DEFAULT '0' NOT NULL,
    t3additions_map_center_lng varchar(99) DEFAULT '0' NOT NULL,
    t3additions_map_zoom int(11) DEFAULT '12' NOT NULL,
    t3additions_map_fit_bounds int(11) DEFAULT '0' NOT NULL,
    t3additions_map_markers tinytext,
    t3additions_map_styles text,

    t3additions_socialwall_length int(11) DEFAULT '0' NOT NULL,
    t3additions_socialwall_show_media int(11) DEFAULT '1' NOT NULL,
    t3additions_socialwall_facebook_accounts mediumtext,
    t3additions_socialwall_facebook_limit int(11) DEFAULT '0' NOT NULL,
    t3additions_socialwall_facebook_access_token varchar(99) DEFAULT '0' NOT NULL,

    t3additions_button_label tinytext,
    t3additions_button_link text,

    t3additions_cookienotice_message text,
    t3additions_cookienotice_show_more_info int(11) DEFAULT '0' NOT NULL,
    t3additions_cookienotice_more_info_label tinytext,
    t3additions_cookienotice_accept_label tinytext,
    t3additions_cookienotice_link text,
);

#
# Table structure for table 'sys_file_reference'
#
CREATE TABLE sys_file_reference (
    t3additions_map_normal_width int(11) DEFAULT '0' NOT NULL,
    t3additions_map_normal_height int(11) DEFAULT '0' NOT NULL,
    t3additions_map_scaled_width int(11) DEFAULT '0' NOT NULL,
    t3additions_map_scaled_height int(11) DEFAULT '0' NOT NULL
);


#
# Table structure for table 'tx_t3additions_domain_model_marker'
#
CREATE TABLE tx_t3additions_domain_model_marker (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumtext,
	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3_origuid int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(30) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
  t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(10) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	parent int(11) DEFAULT '0' NOT NULL,
	title tinytext,
	lat varchar(99) DEFAULT '0' NOT NULL,
	lng varchar(99) DEFAULT '0' NOT NULL,
	uri text,
	uri_title tinytext,
	icon int(11) unsigned DEFAULT '0',
	description text,

	PRIMARY KEY (uid),
	KEY parent (pid)
);