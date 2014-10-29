<?php
/**
 * @Author: iat <iat.net.cn@gmail.com>
 * @Date: 2014-10-29
 * @File: suggest.php
 * @Function: 
 */
?>
<h2>需求建议</h2><br>
<h4>&emsp;&emsp;1、用户表与登录账户表合并，减少级联查询</h4>
<h4>&emsp;&emsp;2、int类型的字段需要指名长度</h4>
<h4>&emsp;&emsp;3、性别、学历、操作类型、帐号状态建议改为<code>bool</code>类型或<code>enum</code>类型</h4>
<h4>&emsp;&emsp;4、爱好特长建议使用<code>text</code>类型，页面上显示的也是<code>textarea</code></h4>
<h4>&emsp;&emsp;5、删除使用软删除、不然已经删除之后的用户<code>id</code>在操作记录里为空</h4>
<h4>&emsp;&emsp;6、操作参数为操作对象的<code>id</code>？那么类型应当为<code>int</code></h4>
<h4>&emsp;&emsp;6、登录帐号表帐号<code>id</code>可以为主键，理解为用户登录的<code>account</code>，建议直接为id自增，并且添加字段<code>account</code></h4>