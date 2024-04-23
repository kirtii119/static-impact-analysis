# Problems

<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><title>Problems</title><style>
/* cspell:disable-file */
/* webkit printing magic: print all background colors */
html {
	-webkit-print-color-adjust: exact;
}
* {
	box-sizing: border-box;
	-webkit-print-color-adjust: exact;
}

html,
body {
	margin: 0;
	padding: 0;
}
@media only screen {
	body {
		margin: 2em auto;
		max-width: 900px;
		color: rgb(55, 53, 47);
	}
}

body {
	line-height: 1.5;
	white-space: pre-wrap;
}

a,
a.visited {
	color: inherit;
	text-decoration: underline;
}

.pdf-relative-link-path {
	font-size: 80%;
	color: #444;
}

h1,
h2,
h3 {
	letter-spacing: -0.01em;
	line-height: 1.2;
	font-weight: 600;
	margin-bottom: 0;
}

.page-title {
	font-size: 2.5rem;
	font-weight: 700;
	margin-top: 0;
	margin-bottom: 0.75em;
}

h1 {
	font-size: 1.875rem;
	margin-top: 1.875rem;
}

h2 {
	font-size: 1.5rem;
	margin-top: 1.5rem;
}

h3 {
	font-size: 1.25rem;
	margin-top: 1.25rem;
}

.source {
	border: 1px solid #ddd;
	border-radius: 3px;
	padding: 1.5em;
	word-break: break-all;
}

.callout {
	border-radius: 3px;
	padding: 1rem;
}

figure {
	margin: 1.25em 0;
	page-break-inside: avoid;
}

figcaption {
	opacity: 0.5;
	font-size: 85%;
	margin-top: 0.5em;
}

mark {
	background-color: transparent;
}

.indented {
	padding-left: 1.5em;
}

hr {
	background: transparent;
	display: block;
	width: 100%;
	height: 1px;
	visibility: visible;
	border: none;
	border-bottom: 1px solid rgba(55, 53, 47, 0.09);
}

img {
	max-width: 100%;
}

@media only print {
	img {
		max-height: 100vh;
		object-fit: contain;
	}
}

@page {
	margin: 1in;
}

.collection-content {
	font-size: 0.875rem;
}

.column-list {
	display: flex;
	justify-content: space-between;
}

.column {
	padding: 0 1em;
}

.column:first-child {
	padding-left: 0;
}

.column:last-child {
	padding-right: 0;
}

.table_of_contents-item {
	display: block;
	font-size: 0.875rem;
	line-height: 1.3;
	padding: 0.125rem;
}

.table_of_contents-indent-1 {
	margin-left: 1.5rem;
}

.table_of_contents-indent-2 {
	margin-left: 3rem;
}

.table_of_contents-indent-3 {
	margin-left: 4.5rem;
}

.table_of_contents-link {
	text-decoration: none;
	opacity: 0.7;
	border-bottom: 1px solid rgba(55, 53, 47, 0.18);
}

table,
th,
td {
	border: 1px solid rgba(55, 53, 47, 0.09);
	border-collapse: collapse;
}

table {
	border-left: none;
	border-right: none;
}

th,
td {
	font-weight: normal;
	padding: 0.25em 0.5em;
	line-height: 1.5;
	min-height: 1.5em;
	text-align: left;
}

th {
	color: rgba(55, 53, 47, 0.6);
}

ol,
ul {
	margin: 0;
	margin-block-start: 0.6em;
	margin-block-end: 0.6em;
}

li > ol:first-child,
li > ul:first-child {
	margin-block-start: 0.6em;
}

ul > li {
	list-style: disc;
}

ul.to-do-list {
	padding-inline-start: 0;
}

ul.to-do-list > li {
	list-style: none;
}

.to-do-children-checked {
	text-decoration: line-through;
	opacity: 0.375;
}

ul.toggle > li {
	list-style: none;
}

ul {
	padding-inline-start: 1.7em;
}

ul > li {
	padding-left: 0.1em;
}

ol {
	padding-inline-start: 1.6em;
}

ol > li {
	padding-left: 0.2em;
}

.mono ol {
	padding-inline-start: 2em;
}

.mono ol > li {
	text-indent: -0.4em;
}

.toggle {
	padding-inline-start: 0em;
	list-style-type: none;
}

/* Indent toggle children */
.toggle > li > details {
	padding-left: 1.7em;
}

.toggle > li > details > summary {
	margin-left: -1.1em;
}

.selected-value {
	display: inline-block;
	padding: 0 0.5em;
	background: rgba(206, 205, 202, 0.5);
	border-radius: 3px;
	margin-right: 0.5em;
	margin-top: 0.3em;
	margin-bottom: 0.3em;
	white-space: nowrap;
}

.collection-title {
	display: inline-block;
	margin-right: 1em;
}

.page-description {
    margin-bottom: 2em;
}

.simple-table {
	margin-top: 1em;
	font-size: 0.875rem;
	empty-cells: show;
}
.simple-table td {
	height: 29px;
	min-width: 120px;
}

.simple-table th {
	height: 29px;
	min-width: 120px;
}

.simple-table-header-color {
	background: rgb(247, 246, 243);
	color: black;
}
.simple-table-header {
	font-weight: 500;
}

time {
	opacity: 0.5;
}

.icon {
	display: inline-block;
	max-width: 1.2em;
	max-height: 1.2em;
	text-decoration: none;
	vertical-align: text-bottom;
	margin-right: 0.5em;
}

img.icon {
	border-radius: 3px;
}

.user-icon {
	width: 1.5em;
	height: 1.5em;
	border-radius: 100%;
	margin-right: 0.5rem;
}

.user-icon-inner {
	font-size: 0.8em;
}

.text-icon {
	border: 1px solid #000;
	text-align: center;
}

.page-cover-image {
	display: block;
	object-fit: cover;
	width: 100%;
	max-height: 30vh;
}

.page-header-icon {
	font-size: 3rem;
	margin-bottom: 1rem;
}

.page-header-icon-with-cover {
	margin-top: -0.72em;
	margin-left: 0.07em;
}

.page-header-icon img {
	border-radius: 3px;
}

.link-to-page {
	margin: 1em 0;
	padding: 0;
	border: none;
	font-weight: 500;
}

p > .user {
	opacity: 0.5;
}

td > .user,
td > time {
	white-space: nowrap;
}

input[type="checkbox"] {
	transform: scale(1.5);
	margin-right: 0.6em;
	vertical-align: middle;
}

p {
	margin-top: 0.5em;
	margin-bottom: 0.5em;
}

.image {
	border: none;
	margin: 1.5em 0;
	padding: 0;
	border-radius: 0;
	text-align: center;
}

.code,
code {
	background: rgba(135, 131, 120, 0.15);
	border-radius: 3px;
	padding: 0.2em 0.4em;
	border-radius: 3px;
	font-size: 85%;
	tab-size: 2;
}

code {
	color: #eb5757;
}

.code {
	padding: 1.5em 1em;
}

.code-wrap {
	white-space: pre-wrap;
	word-break: break-all;
}

.code > code {
	background: none;
	padding: 0;
	font-size: 100%;
	color: inherit;
}

blockquote {
	font-size: 1.25em;
	margin: 1em 0;
	padding-left: 1em;
	border-left: 3px solid rgb(55, 53, 47);
}

.bookmark {
	text-decoration: none;
	max-height: 8em;
	padding: 0;
	display: flex;
	width: 100%;
	align-items: stretch;
}

.bookmark-title {
	font-size: 0.85em;
	overflow: hidden;
	text-overflow: ellipsis;
	height: 1.75em;
	white-space: nowrap;
}

.bookmark-text {
	display: flex;
	flex-direction: column;
}

.bookmark-info {
	flex: 4 1 180px;
	padding: 12px 14px 14px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}

.bookmark-image {
	width: 33%;
	flex: 1 1 180px;
	display: block;
	position: relative;
	object-fit: cover;
	border-radius: 1px;
}

.bookmark-description {
	color: rgba(55, 53, 47, 0.6);
	font-size: 0.75em;
	overflow: hidden;
	max-height: 4.5em;
	word-break: break-word;
}

.bookmark-href {
	font-size: 0.75em;
	margin-top: 0.25em;
}

.sans { font-family: ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol"; }
.code { font-family: "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace; }
.serif { font-family: Lyon-Text, Georgia, ui-serif, serif; }
.mono { font-family: iawriter-mono, Nitti, Menlo, Courier, monospace; }
.pdf .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK JP'; }
.pdf:lang(zh-CN) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK SC'; }
.pdf:lang(zh-TW) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK TC'; }
.pdf:lang(ko-KR) .sans { font-family: Inter, ui-sans-serif, -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, "Apple Color Emoji", Arial, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol", 'Twemoji', 'Noto Color Emoji', 'Noto Sans CJK KR'; }
.pdf .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK JP'; }
.pdf:lang(zh-CN) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK SC'; }
.pdf:lang(zh-TW) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK TC'; }
.pdf:lang(ko-KR) .code { font-family: Source Code Pro, "SFMono-Regular", Menlo, Consolas, "PT Mono", "Liberation Mono", Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK KR'; }
.pdf .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK JP'; }
.pdf:lang(zh-CN) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK SC'; }
.pdf:lang(zh-TW) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK TC'; }
.pdf:lang(ko-KR) .serif { font-family: PT Serif, Lyon-Text, Georgia, ui-serif, serif, 'Twemoji', 'Noto Color Emoji', 'Noto Serif CJK KR'; }
.pdf .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK JP'; }
.pdf:lang(zh-CN) .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK SC'; }
.pdf:lang(zh-TW) .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK TC'; }
.pdf:lang(ko-KR) .mono { font-family: PT Mono, iawriter-mono, Nitti, Menlo, Courier, monospace, 'Twemoji', 'Noto Color Emoji', 'Noto Sans Mono CJK KR'; }
.highlight-default {
	color: rgba(55, 53, 47, 1);
}
.highlight-gray {
	color: rgba(120, 119, 116, 1);
	fill: rgba(120, 119, 116, 1);
}
.highlight-brown {
	color: rgba(159, 107, 83, 1);
	fill: rgba(159, 107, 83, 1);
}
.highlight-orange {
	color: rgba(217, 115, 13, 1);
	fill: rgba(217, 115, 13, 1);
}
.highlight-yellow {
	color: rgba(203, 145, 47, 1);
	fill: rgba(203, 145, 47, 1);
}
.highlight-teal {
	color: rgba(68, 131, 97, 1);
	fill: rgba(68, 131, 97, 1);
}
.highlight-blue {
	color: rgba(51, 126, 169, 1);
	fill: rgba(51, 126, 169, 1);
}
.highlight-purple {
	color: rgba(144, 101, 176, 1);
	fill: rgba(144, 101, 176, 1);
}
.highlight-pink {
	color: rgba(193, 76, 138, 1);
	fill: rgba(193, 76, 138, 1);
}
.highlight-red {
	color: rgba(212, 76, 71, 1);
	fill: rgba(212, 76, 71, 1);
}
.highlight-gray_background {
	background: rgba(241, 241, 239, 1);
}
.highlight-brown_background {
	background: rgba(244, 238, 238, 1);
}
.highlight-orange_background {
	background: rgba(251, 236, 221, 1);
}
.highlight-yellow_background {
	background: rgba(251, 243, 219, 1);
}
.highlight-teal_background {
	background: rgba(237, 243, 236, 1);
}
.highlight-blue_background {
	background: rgba(231, 243, 248, 1);
}
.highlight-purple_background {
	background: rgba(244, 240, 247, 0.8);
}
.highlight-pink_background {
	background: rgba(249, 238, 243, 0.8);
}
.highlight-red_background {
	background: rgba(253, 235, 236, 1);
}
.block-color-default {
	color: inherit;
	fill: inherit;
}
.block-color-gray {
	color: rgba(120, 119, 116, 1);
	fill: rgba(120, 119, 116, 1);
}
.block-color-brown {
	color: rgba(159, 107, 83, 1);
	fill: rgba(159, 107, 83, 1);
}
.block-color-orange {
	color: rgba(217, 115, 13, 1);
	fill: rgba(217, 115, 13, 1);
}
.block-color-yellow {
	color: rgba(203, 145, 47, 1);
	fill: rgba(203, 145, 47, 1);
}
.block-color-teal {
	color: rgba(68, 131, 97, 1);
	fill: rgba(68, 131, 97, 1);
}
.block-color-blue {
	color: rgba(51, 126, 169, 1);
	fill: rgba(51, 126, 169, 1);
}
.block-color-purple {
	color: rgba(144, 101, 176, 1);
	fill: rgba(144, 101, 176, 1);
}
.block-color-pink {
	color: rgba(193, 76, 138, 1);
	fill: rgba(193, 76, 138, 1);
}
.block-color-red {
	color: rgba(212, 76, 71, 1);
	fill: rgba(212, 76, 71, 1);
}
.block-color-gray_background {
	background: rgba(241, 241, 239, 1);
}
.block-color-brown_background {
	background: rgba(244, 238, 238, 1);
}
.block-color-orange_background {
	background: rgba(251, 236, 221, 1);
}
.block-color-yellow_background {
	background: rgba(251, 243, 219, 1);
}
.block-color-teal_background {
	background: rgba(237, 243, 236, 1);
}
.block-color-blue_background {
	background: rgba(231, 243, 248, 1);
}
.block-color-purple_background {
	background: rgba(244, 240, 247, 0.8);
}
.block-color-pink_background {
	background: rgba(249, 238, 243, 0.8);
}
.block-color-red_background {
	background: rgba(253, 235, 236, 1);
}
.select-value-color-uiBlue { background-color: rgba(35, 131, 226, .07); }
.select-value-color-pink { background-color: rgba(245, 224, 233, 1); }
.select-value-color-purple { background-color: rgba(232, 222, 238, 1); }
.select-value-color-green { background-color: rgba(219, 237, 219, 1); }
.select-value-color-gray { background-color: rgba(227, 226, 224, 1); }
.select-value-color-transparentGray { background-color: rgba(227, 226, 224, 0); }
.select-value-color-translucentGray { background-color: rgba(255, 255, 255, 0.0375); }
.select-value-color-orange { background-color: rgba(250, 222, 201, 1); }
.select-value-color-brown { background-color: rgba(238, 224, 218, 1); }
.select-value-color-red { background-color: rgba(255, 226, 221, 1); }
.select-value-color-yellow { background-color: rgba(253, 236, 200, 1); }
.select-value-color-blue { background-color: rgba(211, 229, 239, 1); }
.select-value-color-pageGlass { background-color: undefined; }
.select-value-color-washGlass { background-color: undefined; }

.checkbox {
	display: inline-flex;
	vertical-align: text-bottom;
	width: 16;
	height: 16;
	background-size: 16px;
	margin-left: 2px;
	margin-right: 5px;
}

.checkbox-on {
	background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%3Crect%20width%3D%2216%22%20height%3D%2216%22%20fill%3D%22%2358A9D7%22%2F%3E%0A%3Cpath%20d%3D%22M6.71429%2012.2852L14%204.9995L12.7143%203.71436L6.71429%209.71378L3.28571%206.2831L2%207.57092L6.71429%2012.2852Z%22%20fill%3D%22white%22%2F%3E%0A%3C%2Fsvg%3E");
}

.checkbox-off {
	background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%20fill%3D%22none%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%0A%3Crect%20x%3D%220.75%22%20y%3D%220.75%22%20width%3D%2214.5%22%20height%3D%2214.5%22%20fill%3D%22white%22%20stroke%3D%22%2336352F%22%20stroke-width%3D%221.5%22%2F%3E%0A%3C%2Fsvg%3E");
}
	
</style></head><body><article id="ef9afa10-3fae-422e-a2ad-d99506a61aa4" class="page sans"><header><h1 class="page-title">Problems</h1><p class="page-description"></p></header><div class="page-body"><p id="ba3d9e5e-e82a-4511-8979-d7ec51afbefd" class="">The main problem currently lies in the first part of the project i.e. Creating function calls mapping utilising phpStan. </p><p id="9d47a271-a4d7-4368-b88f-d98fb1d34eaf" class="">Whenever we list any function call, it’s class should be known to trace it ahead. If you look at <code>run-results/meth-calls-main.txt</code>, you’ll see some weird class names like mixedty, neverty, int, float etc. These are hard coded when the type of the calling object is not directly resolvable to a class. Check <code>app/Collectors/MethodCallCollector</code><strong> </strong>for details.</p><p id="1c41356f-97f8-45d6-98c8-56855da83fe7" class="">Some of these types are due to magento’s documentation mistakes, some due to poor documented code, and some just need to be handled better in phpstan type system.</p><p id="f59624cb-5a80-4d94-92e8-751e949fb34c" class="">Check this out understand php DocTypes : <a href="https://phpstan.org/writing-php-code/phpdoc-types">https://phpstan.org/writing-php-code/phpdoc-types</a></p><p id="e1671d9a-1f83-402f-a0b1-d72fe7d88a12" class="">
</p><h2 id="3fc3cbda-f3e0-4bbc-9c2c-73eb297e406f" class=""><strong>Collector level Problems </strong></h2><ul id="1c5427ff-1021-4861-ad4d-2a83af60b9b8" class="toggle"><li><details open=""><summary>Magento php doctype is wrong</summary><ol type="1" id="989bf465-cff2-4206-9695-2fe126c36264" class="numbered-list" start="1"><li>/var/www/magento/vendor/magento/framework/View/Element/UiComponent/DataProvider/Reporting.php - 25</li></ol><ol type="1" id="320cfc4c-6b67-478a-88c9-f08bad2a06f6" class="numbered-list" start="2"><li>/var/www/magento/vendor/magento/module-catalog-inventory/Model/Spi/StockStateProviderInterface.php - 44 - see implementations </li></ol></details></li></ul><ul id="9f580e14-3a0d-4a06-aec2-28071e47111f" class="toggle"><li><details open=""><summary>Magento php doctype notation has syntax problem</summary><ol type="1" id="7ac27a2e-fa3a-4e04-ac35-acf8938c6c50" class="numbered-list" start="1"><li>/var/www/magento/vendor/magento/module-import-export/Controller/Adminhtml/Export/GetFilter.php - 27</li></ol><ol type="1" id="4b145c85-a2a8-4b90-a6c3-365591670eb5" class="numbered-list" start="2"><li>/var/www/magento/vendor/magento/framework/DB/Statement/Pdo/Mysql.php - 36</li></ol><p id="9da6ccf1-a3a0-4c9c-ae01-af0175379327" class="">Check <a href="https://phpstan.org/writing-php-code/phpdocs-basics">https://phpstan.org/writing-php-code/phpdocs-basics</a></p></details></li></ul><ul id="0cbf5044-df4f-4691-bfdd-a811114ca71a" class="toggle"><li><details open=""><summary>Handling Mixed Types</summary><ol type="1" id="d85fe227-79b0-4fb0-8d7b-ed95fdfd2d1e" class="numbered-list" start="1"><li>When php doctype is explicitly mixed - /var/www/magento/vendor/magento/module-sales/Block/Order/Totals.php - 285</li></ol><ol type="1" id="c132e46e-8e85-4f74-8592-ac64597a2a60" class="numbered-list" start="2"><li>php doc type mentioned is wrong that results in wrong identification of type - /var/www/magento/vendor/magento/module-import-export/Controller/Adminhtml/Export/GetFilter.php - 34</li></ol><p id="3b9f1aac-cabe-47d9-8fe3-1ef7fce58e70" class="">Play around with some code and check stan’s system to handle mixed types better.<div class="indented"><p id="53cf7005-7206-4037-a2d6-46808cb56a7c" class="">
</p></div></p></details></li></ul><ul id="77ffc043-0eb6-4407-8244-452ad2673cc6" class="toggle"><li><details open=""><summary>Handling obj without class type</summary><ul id="94da4dc5-757d-4eba-aa28-b066470b75ee" class="bulleted-list"><li style="list-style-type:disc">type object is mentioned directly </li></ul><p id="b0d4a841-f7dc-4da5-9712-2009a0c5247d" class="">/var/www/magento/vendor/magento/module-sales/Block/Order/Creditmemo/Items.php - 55</p><ul id="88ecdb39-5d85-4077-8993-dc6017dfc6b0" class="bulleted-list"><li style="list-style-type:disc">or in functional testing frameworks where local variable of the type object are created from object manager factory and type is not mentioned.</li></ul><ul id="059ae4af-88d2-47b0-8553-896bbb0f03fa" class="bulleted-list"><li style="list-style-type:disc">/var/www/magento/vendor/magento/framework/File/Uploader.php - line 447 : does not resolve to object and function name directly - compilation of strings. - <strong>type to note</strong></li></ul><p id="84f0a3e5-2e00-429f-8c91-45a251e0812d" class="">check for more instances</p></details></li></ul><ul id="95ac0f0b-8e07-4628-88ff-215ccdd88f4f" class="toggle"><li><details open=""><summary>Handling intersection &amp; union type</summary><ul id="55217ada-8c0f-4e3e-a36a-6096a68ceff9" class="toggle"><li><details open=""><summary>Union type is mostly b/w</summary><ul id="433b62bd-5d29-4806-9ece-966bee21464e" class="bulleted-list"><li style="list-style-type:disc">2 classes - explicitly mentioned in doc types</li></ul><ul id="08b1b1c7-09cc-407b-8b82-69cb12b9bc93" class="bulleted-list"><li style="list-style-type:disc">(class name | null/string/false/bool/int) etc</li></ul><ul id="e013d9b2-bf2f-4930-bbd1-5a01c56ef9aa" class="bulleted-list"><li style="list-style-type:disc">two intersection types - both being resolved  (166321 in meth-calls-main.txt)</li></ul><p id="006f4529-d650-4d95-8047-74626bd8610c" class="">
</p></details></li></ul><ul id="8f52ac51-e32a-49cc-ba12-3ece078ba3cf" class="toggle"><li><details open=""><summary>Intersection is b/w (2 or more)</summary><ul id="97dc8d01-46aa-4c9e-af15-80c8556f191e" class="bulleted-list"><li style="list-style-type:disc">interface &amp; interface</li></ul><ul id="7cf61aba-a30a-4555-8379-0390fa06b406" class="bulleted-list"><li style="list-style-type:disc">$this &amp; interface</li></ul><ul id="f7a8e0eb-b46a-4de7-b24e-c0609e6eb0e1" class="bulleted-list"><li style="list-style-type:disc">class and interface </li></ul><ul id="2ba8e5f8-842d-479e-8d98-e8bd25d3e963" class="bulleted-list"><li style="list-style-type:disc">2 classes where one is of the type mockobject - tests can be ignored</li></ul><ul id="baf2079c-7d2e-4858-935d-a4d0b582f455" class="bulleted-list"><li style="list-style-type:disc">Exception &amp; throwable. (classes extending exception)</li></ul><ul id="d986773c-bf56-40a1-9f22-f83c64897a47" class="bulleted-list"><li style="list-style-type:disc">class1 &amp; class2 where one class extends another</li></ul><ul id="b6eda3bd-d45c-4540-a035-832b90f82fbb" class="bulleted-list"><li style="list-style-type:disc">eg. /var/www/magento/vendor/magento/module-inventory-in-store-pickup/Model/Source/InitPickupLocationExtensionAttributes.php - 39</li></ul><ul id="1c88f046-393c-4f6b-b95a-2b7ee407679d" class="bulleted-list"><li style="list-style-type:disc">not resolvable : /var/www/magento/setup/src/Magento/Setup/Console/Command/InstallCommand.php - 383 (166321 in func-calls-main.txt)</li></ul></details></li></ul><ul id="45476e33-966d-4494-bdfc-450d375aa62d" class="bulleted-list"><li style="list-style-type:disc">Class names are sometimes resolved to something like (resource | object | $this) - these might be further resolved.</li></ul><ul id="e2f75dbd-e151-4376-af72-0c9d124553ba" class="bulleted-list"><li style="list-style-type:disc">If union type has (interface/className | null/false/int/bool) - it can be resolved to interface/className - though in this case the type hints should be better handled</li></ul><p id="120f8535-3efc-4e0b-9105-18bb9a7b31fc" class=""><a href="https://phpstan.org/blog/union-types-vs-intersection-types">https://phpstan.org/blog/union-types-vs-intersection-types</a></p><p id="417adf44-9af1-4c8f-9a2a-f2b49be97c2e" class="">
</p></details></li></ul><ul id="09d53909-5b88-48cf-8f3b-3dcd1c0947d9" class="toggle"><li><details open=""><summary>Handling Never Type</summary><p id="0ffe9381-4205-444c-910d-367eda58a95d" class="">This mostly occurs when that particular code will never be reached. Play around to understand this better</p></details></li></ul><ul id="e4fefbb7-6dd7-4fbf-9dee-1270412b6846" class="toggle"><li><details open=""><summary>Handling resource type</summary><p id="e67e4488-4a7f-42d6-bc10-37be45e48a4f" class="">resource is explicity mentioned as the type</p></details></li></ul><ul id="398dc18f-59c4-443b-80a7-c7c022c036d1" class="toggle"><li><details open=""><summary>Handling array/ string/ int/ float/ bool/ null types</summary><ul id="79d412db-9b41-44e3-9dbb-4ed5796f10ca" class="bulleted-list"><li style="list-style-type:disc">these mostly occur due to phpdoc type errors</li></ul><p id="82bb542a-e639-436e-8536-3d8596e698ff" class="">array : /var/www/magento/vendor/magento/module-catalog/Model/ProductLink/Search.php  - 64 </p><p id="9f8ab79e-91ca-4b17-b486-848486604b5f" class="">
</p></details></li></ul><ul id="072a4d23-fe31-4d32-af0e-bc1c6b7d90e5" class="toggle"><li><details open=""><summary>$this in parent class / interface can refer to calling child class object too (not necessarily current class)</summary><p id="cac6db6e-a351-404c-918a-c009ec85b18a" class="">child - /var/www/magento/vendor/magento/framework/View/Layout/Proxy.php :131</p><p id="d7263f7f-9f77-48ff-be47-d1349971501a" class="">child -  /var/www/magento/vendor/magento/framework/Translate/Inline/Proxy.php : 109</p><p id="bc14686c-8396-46cf-acd4-f1ec99267e04" class="">interface - /var/www/magento/vendor/magento/framework/Webapi/Response.php - 47</p><p id="9f39564e-225e-417d-9ca6-04b2690ceb08" class="">
</p></details></li></ul><ul id="baf137f8-8cc3-4a91-9f2d-9b2b4e554a10" class="toggle"><li><details open=""><summary>Call to methods of interface : When an interface is the data type, it needs to be mapped to it’s implementation (known from the calling class).</summary><ul id="a4006b2a-29d1-41d6-94c7-3ae9853aaf6a" class="bulleted-list"><li style="list-style-type:disc">Currently generated call graphs are unable to trace the call stack beyond the interface. That means if a function is called from an interface, the graph is unable to track further calls from classes which implement the interface.</li></ul><ul id="18d0a672-a9fa-4b07-acbe-7a59fcbeb63d" class="bulleted-list"><li style="list-style-type:disc">We feel it would be useful to map interfaces to their implemented classes.</li></ul><ul id="fa9d4870-e6f4-4994-8ae9-8202e60adf75" class="bulleted-list"><li style="list-style-type:disc">The <code>interfaceCollector</code> does the job of storing classes and the interfaces they implement in the file <code>run-results/InterfaceCollected.txt</code></li></ul><ul id="6fadf665-cbd7-42a3-8741-2fe9880a75df" class="bulleted-list"><li style="list-style-type:disc"><code>trialFiles/mapInterfacetoClass</code> takes InterfaceCollected.txt as input and creates a map of interfaces to the classes which implement the respective interface in a file present at <code>run-results/MapinterfaceClass.json</code></li></ul></details></li></ul><ul id="afb7e6df-4ea2-4b1e-b523-2a2732b19234" class="toggle"><li><details open=""><summary>Get and Set methods</summary><p id="3b8a1851-346a-44e8-9899-06a659095016" class="">Phpstan has functionality to deal with these magic methods but, not sure if it fully solves the problem.  <a href="https://phpstan.org/developing-extensions/class-reflection-extensions">https://phpstan.org/developing-extensions/class-reflection-extensions</a></p></details></li></ul><ul id="53cc38a5-49c0-45f3-b1b4-af5204c48ec9" class="toggle"><li><details open=""><summary>Check if return type is really wrong. Would you consider this and similar types wrong?</summary><ol type="1" id="ab4b43ee-a57e-450a-8e01-6aecf11c4e65" class="numbered-list" start="1"><li>/var/www/magento/vendor/magento/framework/Model/ResourceModel/Db/AbstractDb.php - 307</li></ol></details></li></ul><ul id="0b15fb57-1f70-4df3-9542-59193b09ff0d" class="toggle"><li><details open=""><summary><strong>Number of occurences of each unresolved type in the meth-calls-main file</strong></summary><ol type="1" id="299a45e4-c538-444a-a22d-2ba8056f5209" class="numbered-list" start="1"><li>String Type: 18</li></ol><ol type="1" id="554de012-1a43-481c-bf8c-9d9aae673a9f" class="numbered-list" start="2"><li>object without class Type: 281</li></ol><ol type="1" id="6ea4528e-31f6-40df-8b46-f40ed42054e8" class="numbered-list" start="3"><li>array type : 29</li></ol><ol type="1" id="fad9ea64-9dd0-4d66-bc8c-887e98404db1" class="numbered-list" start="4"><li>int type : 18</li></ol><ol type="1" id="d088c6a6-87f9-47a2-bb38-a7d212f507a1" class="numbered-list" start="5"><li>Boolean type : 1</li></ol><ol type="1" id="a55f714f-7b4d-49bd-878a-8639e40643e8" class="numbered-list" start="6"><li>Float type : 3</li></ol><ol type="1" id="d33891ce-e20e-4d26-b664-42e3995a4aa1" class="numbered-list" start="7"><li>Mixed Type: 13852</li></ol><ol type="1" id="0bd6d6fa-dbcc-4c58-9168-92e1ebe1dfe8" class="numbered-list" start="8"><li>Intersection Type &amp; : 127</li></ol><ol type="1" id="34584bb9-6274-4882-b1f8-05d6ca6d961f" class="numbered-list" start="9"><li>Union Type | : 4311</li></ol><ol type="1" id="dfeb6771-bae7-475d-979b-c612e04c67b2" class="numbered-list" start="10"><li>Null Type : 26</li></ol><ol type="1" id="81c3e38c-5660-4466-979c-ded42dd21d65" class="numbered-list" start="11"><li>Never Type : 47</li></ol><ol type="1" id="fa22107e-3d05-496b-b805-fc064012f14f" class="numbered-list" start="12"><li>Resource Type : 64</li></ol><ol type="1" id="ca1ce31b-2b54-4beb-8441-1a190bac3e54" class="numbered-list" start="13"><li>Constant type : 0 - might be present in magento test documents</li></ol><ol type="1" id="469e3e95-7100-4500-bc1e-12a86dc365e7" class="numbered-list" start="14"><li>This type &amp; Object type : Resolved</li></ol></details></li></ul><p id="acc2a839-bee0-427d-ab80-920403d2d7cb" class=""><a href="https://phpstan.org/user-guide/troubleshooting-types">https://phpstan.org/user-guide/troubleshooting-types</a></p><h2 id="73bb9b66-9756-492a-8e34-978b081e901b" class="">Return type check</h2><p id="994a4a15-b286-4dc8-9b51-f9ba931c3860" class="">To move ahead, we first have to resolve <strong>wrong doc types</strong> to get some of the above ambiguities resolved. The approach decided upon was to compare all method return types to it’s phpdoctype mentioned. Additionally also check the ambiguity in the types of class properties’ doc types. </p><ul id="9aa4b8e4-ebe1-4e22-b266-7bfb7558faa0" class="toggle"><li><details open=""><summary><strong>Try 1: </strong></summary><p id="c3edf9a5-24e9-4d69-bc59-f3342e1cdb9b" class="">You’ll find a file <code>app/Collectors/Return_DocTypeCollector.php</code> which was an attempt to achieve this using collectors. This directly compares the docType to the corresponding return expression type. But comparing it directly using an equality operator or instanceof or isSuperTypeOf is not the best choice as phpstan type system and phpdoctypes mentioned are not really the same always - it has got many edge cases.</p></details></li></ul><ul id="d4592813-220f-4d50-88ba-36b247c38b0b" class="toggle"><li><details open=""><summary><strong>Try 2: </strong></summary><p id="9276cc9c-90b9-4deb-93a3-ec68e61909c7" class="">Phpstan has handled these cases in it’s rules. So let’s use that. These are the relevant rules</p><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="cd1061d2-abad-4e1e-9697-e377b55faa86" class="code"><code class="language-Plain Text" style="white-space:pre-wrap;word-break:break-all">rules :

	- PHPStan\Rules\Functions\ArrowFunctionReturnTypeRule
	- PHPStan\Rules\Functions\ClosureReturnTypeRule
	- PHPStan\Rules\Functions\ReturnTypeRule
	- PHPStan\Rules\Methods\ReturnTypeRule
	- PHPStan\Rules\Properties\TypesAssignedToPropertiesRule</code></pre><p id="9461f730-c3e4-43cf-ac09-d67b77fcb16e" class="">Added these rules in phpstan.neon, analysed over magento framework and dumped these results in <code>run-results/framework-property-result-error.txt</code>. Works well with some exceptions discussed ahead. <code>run-results/framework-result-error.txt</code> is the same analysis just without the last rule.</p><p id="925aff29-5a58-4591-ba9c-377daadd35ea" class=""><strong>Note</strong>: Phpstan rightly identifies if the doctype mentioned is the super-type of what is actually returned. So, if an interface/abstract class is the doctype but an implementation of it is returned, it classifies under no error, but vice-a-versa will not be true.</p></details></li></ul><ul id="324ce1ed-c5cb-4a61-94c5-4b5b050cc64a" class="toggle"><li><details open=""><summary><strong>Try3:</strong></summary><p id="a85a3151-6ca1-4816-958a-572d937dc9e0" class="">Now, running this on files directly didn’t help much as everything is coupled. One thing depends on the other and any docType wrong in between affects many places. So let’s first scan the classes which have 0 dependencies and then move forward to classes with higher number of dependencies. Number of dependencies here are considered to be the number of parameters in the constructor of that corresponding class. Let’s start by finding out class dependencies.</p><p id="7d3c6301-e1f8-4c55-aeb1-9bef22a0de19" class="">For this <code>app/Collectors/ClassDependencyCollector</code> is used. This was run to get results in 2-3 ways contained in:</p><ol type="1" id="f81e02dd-801c-49fa-81fa-9fa23d1e491d" class="numbered-list" start="1"><li><code>run-results/class-dependencies-main/</code> : This directory contains files containing the class names of the constructors which have the corresponding dependencies. eg class-cons-params-0.txt contains classes with 0 dependencies and so on. <code>class-cons-params-main.txt</code> contains all possible classes with the corresponding number of dependencies.</li></ol><ol type="1" id="2e3c7e1f-038e-4352-a069-61c95a1d5a8a" class="numbered-list" start="2"><li><code>run-results/class-dependencies-fileNames-main/</code> : This directory contains the filenames of the constructors with the corresponding dependencies in the same way.</li></ol><p id="1f659fb7-84eb-40f4-af09-6b19c89b6a35" class="">This <strong>succesfully</strong> gives us all classes with it’s dependencies</p><p id="d4ec0dfd-dd68-4049-8ed6-7954f8f7bfa0" class="">
</p><p id="9ecd6b86-9878-4f39-9a7b-49b4daeed0b4" class="">Now, let’s use this and run stan’s rules on 0 dependency class files. To do this, <code>trialFiles/runClassDependencyCode</code> forms a phpstan-src/bin/phpstan analyse command compiling all these filenames and executing it. But Puff. It gives an Unable to fork error. Let’s dump the command in <code>trialFiles/command.txt</code> and run that by copy pasting it in the terminal. This exits with </p><figure id="4d7111e9-0677-4dcd-9a5a-68908a58aea7" class="image"><a href="Problems%20ef9afa103fae422ea2add99506a61aa4/Screenshot_from_2024-03-18_18-27-47.png"><img style="width:336px" src="Problems%20ef9afa103fae422ea2add99506a61aa4/Screenshot_from_2024-03-18_18-27-47.png"/></a></figure><p id="affefc8e-37dd-47c8-a835-a475a6e301f5" class="">These results weren’t resolved.</p><p id="1062beba-3c45-4c9e-b562-be154b8f47bc" class="">(Make sure to comment all collectors and uncomment just the rules before running this)</p><p id="c29a1f9e-27b2-421a-9075-be65e188669c" class="">Just to try running it, I ran this in batches of 1000 files. It worked well then. Now, the problem with the reult was that even though these seem to be classes with 0 dependencies, these extend, implement or use other classes somewhere or the other, and to resolve some undefined types we also need to pass other files from the magento codebase to phpstan. Check the results at <code>run-results/result0-OnlyFilesToBeAnalysedWODependencies.txt</code></p></details></li></ul><ul id="f5ed4b90-4338-4f47-ad3e-c63bcffae639" class="toggle"><li><details open=""><summary><strong>Try 4:</strong></summary><p id="7fe9d9b8-b4bc-4683-ab7f-73325bb64a1b" class="">Now, let’s ditch the filenames and use classnames generated. <code>app/Rules/CustomMethodsReturnTypeRule.php app/Rules/CustomTypesAssignedToPropertiesRule.php</code></p><p id="02a33076-177f-450d-91ec-35f7d0a13074" class="">Check these rules, these are phpstan rules with a filter to skip all other classnames expect for classes with 0 dependencies. Check results at <code>run-results/result0Main-FilesToBeAnalysedWithDependencies</code></p><p id="789d6caf-d76b-400c-97c8-89c3178bab8b" class="">You can make similar custom rules corresponding to phpstan rules listed above. These results also have some problems, check some of them below.</p></details></li></ul><ul id="9dd679d1-6c3a-4aea-ae89-3a5c6e9f6492" class="toggle"><li><details open=""><summary><strong>Phpstan analysing wrong return type exceptions (problems which need to be solved):</strong></summary><ul id="feecd371-92b6-461e-91cd-7151de64096f" class="toggle"><li><details open=""><summary>Not able to compare “$this” to actual object. </summary><p id="f4e1b856-dcfa-4bd6-8e46-d2afa15d832b" class="">Line   /var/www/magento/vendor/magento/framework/HTTP/Adapter/Curl.php</p><hr id="8590f0e1-14a2-40ef-bb1e-d3ccbd7672e8"/><p id="f51fc80a-0e86-47ce-9e0a-d9cd41990d1a" class="">:150   Method Magento\Framework\HTTP\Adapter\Curl::connect() should return</p><p id="65e184e5-6021-4a7b-8334-086099f9905c" class="">$this(Magento\Framework\HTTP\Adapter\Curl) but returns Magento\Framework\HTTP\Adapter\Curl.</p></details></li></ul><ul id="82d815d4-ae55-4673-bf9b-33508af39132" class="toggle"><li><details open=""><summary>Wrongly qualifies “$this” or “self”(in parent class) to the parent class / interface itself as opposed to the calling(child) class. (But expected parent and given child is considered okay in phpstan - maybe it’s not able to compare “this”)</summary><p id="b825325f-0dae-43c8-98c5-4e6cd2a03116" class="">Line   /var/www/magento/vendor/magento/framework/View/Layout/Proxy.php</p><p id="05482481-31ea-4aa1-b091-1aa6be5eb1a3" class="">:109   Method Magento\Framework\View\Layout\Proxy::setGeneratorPool() should return $this(Magento\Framework\View\Layout\Proxy) but returns Magento\Framework\View\Layout.</p><hr id="be558f8d-13d4-41e3-b9e0-5e47e6468d3a"/><p id="16231721-ef55-41b9-9420-72715ef7f053" class="">Line   /var/www/magento/vendor/magento/framework/Translate/Inline/Proxy.php</p><p id="0c9a49b1-58ca-40f8-97c2-4c54998a2872" class="">:131   Method Magento\Framework\Translate\Inline\Proxy::processResponseBody() should return $this(Magento\Framework\Translate\Inline\Proxy) but returns Magento\Framework\Translate\Inline.</p><hr id="4e28504a-5610-43a9-8859-d8afe71c7634"/><p id="59c1d379-1b6a-4885-af33-5ffba2da7c92" class="">Line   /var/www/magento/vendor/magento/framework/Webapi/Response.php</p><p id="ea02c5bb-acb8-4009-90d6-6d9aed30b7c7" class="">:47    Method Magento\Framework\Webapi\Response::setMimeType() should return</p><p id="64e45a66-a9fe-4560-bcd2-25230150de0d" class="">$this(Magento\Framework\Webapi\Response) but returns Magento\Framework\App\Response\HttpInterface.</p><hr id="c92abc52-20b6-4b9c-a6a7-dfad881442da"/></details></li></ul><ul id="d7bbc1ae-1fe2-401b-b519-a406d23bdd14" class="toggle"><li><details open=""><summary>Return Type is not mentioned so is considered void.</summary><p id="9c6415f1-dc23-4247-9cd1-84fdffe492b4" class="">Line   /var/www/magento/vendor/magento/framework/Xml/Parser.php</p><p id="68c2bad8-3d17-4a49-b59f-02bc28366913" class="">:37    Method Magento\Framework\Xml\Parser::__construct() with return type void returns $this(Magento\Framework\Xml\Parser) but should not return anything.</p></details></li></ul><ul id="dd41e15c-07cf-40ca-b7c7-91af3821ec93" class="toggle"><li><details open=""><summary>For union types if doctype is mentioned like ClassName | false and method never returns false, stan would not raise an issue.</summary><p id="ab20bc90-d090-443d-b0e4-90157552cbcc" class="">eg: /var/www/magento/vendor/magento/framework/Model/ResourceModel/Db/AbstractDb.php - 307 </p><p id="64d00d38-9cac-49df-aa18-0786f4c563e0" class="">This doesn’t seem to be returning false. This can hamper type analysis ahead.</p></details></li></ul><ul id="a73228ee-5a9f-406a-829e-9720467c6605" class="toggle"><li><details open=""><summary>Check - </summary><p id="d25af8fd-b395-4495-b2e1-52ad60354448" class=""><strong>Doc type of Sibling is mentioned</strong>  /var/www/magento/vendor/magento/framework/Data/Form/Element/AbstractElement.php</p><hr id="491487fb-eec7-4d75-a2f8-98c51e33df50"/><p id="4e46b24d-50a2-48da-b611-ac79dde3538d" class="">:131   Method Magento\Framework\Data\Form\Element\AbstractElement::addElement() should return Magento\Framework\Data\Form but returns $this(Magento\Framework\Data\Form\Element\AbstractElement).</p><p id="6718743b-7d02-4e47-8225-5df9d4fe2c01" class=""><strong>Returns an interface but mentioned class as a return type.</strong></p><p id="d257cba2-1123-420a-a8da-1e513e28cf65" class="">Line    /var/www/magento/vendor/magento/framework/View/Element/AbstractBlock.php</p><hr id="1074c27c-fe51-4720-84ef-f17f65e7d276"/><p id="113d1222-7978-40f0-bebb-ef664f29b058" class="">:402    Method Magento\Framework\View\Element\AbstractBlock::addChild() should return</p><p id="32c0c33e-2ea9-4f08-8711-b2a61d798fa0" class="">$this(Magento\Framework\View\Element\AbstractBlock) but returns</p><p id="7a11f6d8-9cf6-40bc-b5b3-b159fa593e3a" class="">Magento\Framework\View\Element\BlockInterface.</p></details></li></ul></details></li></ul><p id="7366c353-5681-4f35-a179-f20be11f336a" class="">
</p><p id="3482d6e9-e9b1-47a8-8f48-a1b3530d8df7" class="">
</p><p id="6a690568-2de6-4611-aaaa-34328cd09887" class=""><strong>Other problems:</strong></p><ul id="f7d65071-22df-4b5e-9dc8-f48b5f44fb1f" class="toggle"><li><details open=""><summary>Handling / Interpreting XML files</summary></details></li></ul><ul id="f9bccef6-ceb2-4790-9beb-730f0dd08aa2" class="toggle"><li><details open=""><summary>Handling Plugins</summary></details></li></ul><ul id="5bad1b3e-eb8a-4f4c-a961-9cd0526b4914" class="toggle"><li><details open=""><summary>Recognising exact changed function names from git commit/ PRs   - last priority</summary></details></li></ul><p id="ba97ee2e-5c70-4eb3-ae5e-b366daab7056" class="">
</p><h1 id="0db83956-8b42-4b72-8d41-7630b337d3ab" class="">Test Cases</h1><p id="ccd9b8df-04a0-48d3-961b-792bddb2d8b4" class="">We’ve written some tests and test cases to understand some problems better. Check them out at <code>tests/*</code></p><p id="01dba489-aa1f-4e2b-9889-8a7b3278bf04" class="">Setup phpunit in the <code>tools</code> directory -  <a href="https://docs.phpunit.de/en/11.0/installation.html">https://docs.phpunit.de/en/11.0/installation.html</a> </p><p id="2f46659d-1ca7-4054-a3ed-41e1dd8e1e6f" class="">Use this command to run specific tests</p><script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js" integrity="sha512-7Z9J3l1+EYfeaPKcGXu3MS/7T+w19WtKQY/n+xzmw4hZhJ9tyYmcUS+4QqAlzhicE5LAfMQSF3iFTK9bQdTxXg==" crossorigin="anonymous" referrerPolicy="no-referrer"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerPolicy="no-referrer"/><pre id="6af286ca-9914-4609-a145-3e472394d032" class="code"><code class="language-Bash">./tools/phpunit.phar ./tests/&lt;Test-name&gt;.php </code></pre><p id="0afdf160-0f24-4b17-8d60-632bdbb95c73" class="">We have divided tests into 3 types</p><ol type="1" id="b8fb7d95-a33a-472a-93f3-3bbbee2688ce" class="numbered-list" start="1"><li>Method Call Collecter Tests - based on the method call mapping<ul id="e3375067-3684-433a-af00-583ea3da34f2" class="bulleted-list"><li style="list-style-type:disc">All these are passed test cases - but consider if union type has $this as a result, that needs to be resolved further then and there. (Such cases exists in magento)</li></ul></li></ol><ol type="1" id="430fee60-a40d-4664-96b5-d268f383d8dd" class="numbered-list" start="2"><li>Callgraph Tests - based on the CallGraphBuilder<ul id="1bf49ef7-dda3-4ccd-8143-015fe599f240" class="bulleted-list"><li style="list-style-type:disc">Basic code required to run CallGraphBuilder is good to go. Intersection and union types need to be handled. </li></ul></li></ol><ol type="1" id="27bde238-eb94-443e-84d7-15a7d080babd" class="numbered-list" start="3"><li>End to End Tests - based on the start input and expected end results<ul id="f655eabb-a561-415e-80e1-bf2585f7ca06" class="bulleted-list"><li style="list-style-type:disc">This contains failings tests based on interfaces &amp; plugins.</li></ul></li></ol><p id="750a0ad6-c0ad-4e45-8a65-cca631cb6084" class=""><strong>Note: </strong></p><ol type="1" id="b10251c4-9dfc-4242-a1ee-c1d90eaec4dd" class="numbered-list" start="1"><li>Except Callgraph tests, rest of the test cases are based on MethodCallCollector, so make sure to keep it uncommented in phpstan.neon . Rest of the collectors are not tested with these tests.</li></ol><ol type="1" id="ea1f34d8-4775-403e-be78-dde91abf0240" class="numbered-list" start="2"><li>These modify call-mapping-results, because it is considered that call-mappings are intermediate and will be wiped off after every run. If you have created any call mappings that you want to save make sure to shift it to a new file in run-results or setup file versioning. </li></ol><p id="0f42701c-f544-47ca-b230-20b85b7f6d03" class="">
</p><p id="472e2a6f-f3a7-4029-8265-fb35793364d5" class="">
</p><p id="aeb78edf-fec5-4299-9215-ef8d80052a41" class="">We tried listing these to get a better view of the project, keep appending to reach an exhaustive list</p><p id="86553856-435d-4fc0-bc53-357a5cd2cfc4" class=""><strong>Track functions by tracing/ keeping track of:</strong></p><ol type="1" id="e632cee9-a784-4ec3-b4b7-3b78f217026a" class="numbered-list" start="1"><li>method calls</li></ol><ol type="1" id="dd39ab4b-d00c-443d-8aa3-4bfcabe9f340" class="numbered-list" start="2"><li>function calls</li></ol><ol type="1" id="478ff9a8-c941-4980-8b25-1881bd0ec5c5" class="numbered-list" start="3"><li>static method calls</li></ol><ol type="1" id="095ad663-dd19-4a53-9bf7-c2bed61e079d" class="numbered-list" start="4"><li>constructors - when objects are created, Dependency injection</li></ol><ol type="1" id="977d6d16-3b56-43bc-8440-0fe04bd12d80" class="numbered-list" start="3"><li>inheritance - only constructor </li></ol><ol type="1" id="5fc9ef38-e3a0-4332-a826-cce6b737c3b9" class="numbered-list" start="4"><li>XML files to see what is fired</li></ol><ol type="1" id="b3702856-6f71-43bd-97de-a40eba14622b" class="numbered-list" start="5"><li>Plugins</li></ol></div></article><span class="sans" style="font-size:14px;padding-top:2em"></span></body></html>
