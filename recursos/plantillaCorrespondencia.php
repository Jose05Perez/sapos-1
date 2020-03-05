<?php
$p = ''; 
$copia=$this->copia;
foreach ($copia as $k=>$v ) {
	$p.='<p class=MsoNormal><b><span lang=ES>'.[$v]['nombre'].'</span></b></p>
<p class=MsoNormal><span class=fdestinatario><span lang=ES style=\'font-size:
12.0pt;line-height:107%\'>'.$v['rol'].' '.$v['dept'].'</span></span></p>
<br/><br/>';
}






$arch = '
<html>
<head>
<meta http-equiv=Content-Type content="text/html;>
<meta name=Generator content="Microsoft Word 15 (filtered)">
<title>'.$this->codigo_correspondencia.'</title>
<style>
<!--
 /* Font Definitions */
 #footer {
	position: absolute;
	bottom: 50;
	width: 100%;
	height: 3.5rem;            /* Footer height */
  }
 @font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	line-height:107%;
	font-size:10.0pt;
	font-family:"Arial",sans-serif;}
p.txtctr, li.txtctr, div.txtctr
	{mso-style-name:txtctr;
	margin-top:0in;
	margin-right:0in;
	margin-bottom:8.0pt;
	margin-left:0in;
	text-align:center;
	font-size:10.0pt;
	font-family:"Arial",sans-serif;}
span.ffecha
	{mso-style-name:ffecha;
	font-family:"Times New Roman",serif;}
p.lhfecha, li.lhfecha, div.lhfecha
	{mso-style-name:lhfecha;
	margin:0in;
	margin-bottom:.0001pt;
	font-size:10.0pt;
	font-family:"Arial",sans-serif;}
span.fdestinatario
	{mso-style-name:fdestinatario;
	font-family:"Calibri",sans-serif;}
.MsoChpDefault
	{font-size:10.0pt;
	font-family:"Arial",sans-serif;}
.MsoPapDefault
	{margin-bottom:8.0pt;
	line-height:107%;}
 /* Page Definitions */
 @page WordSection1
	{size:595.25pt 841.85pt;
	margin:1.0in 1.0in 1.0in 1.0in;}
div.WordSection1
	{page:WordSection1;}
-->
</style>

</head>

<body lang=Es-ES>

<div class=WordSection1>

<p class=MsoNormal align=center style=\'text-align:center\'><img width=100
height=109 id="Imagen 1" src="vista/img/logo.jpg"></p>

<p class=txtctr><span lang=ES style=\'font-family:"Calibri",sans-serif;
color:gray\'>¡Manos a la obra!</span></p>

<p class=txtctr><span lang=ES style=\'font-size:9.0pt;font-family:"Calibri",sans-serif;
color:gray\'>“Año de la Consolidación de la Seguridad Alimentaria”</span></p>

<p class=lhfecha><b><span lang=ES style=\'font-family:"Times New Roman",serif\'>&nbsp;</span></b></p>
<p class=lhfecha><b><span lang=ES style\'font-family:"Times New Roman",serif\'>'.$this->codigo_correspondencia.'</span></b></p>
<p class=lhfecha><span class=ffecha><span lang=ES style=\'font-size:12.0pt\'>Santo Domingo, DN</span></span></p>
<p class=lhfecha><span class=ffecha><span lang=ES style=\'font-size:12.0pt\'>'.$fecha.'</span></span></p>

<br/><br/><br/>

<p class=MsoNormal><b><span lang=ES>A &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp; &nbsp; &nbsp; </span></b><span
class=fdestinatario><span lang=ES style=\'font-size:12.0pt;line-height:107%\'>'.$a.'</span></p>
<p class=MsoNormal><span lang=ES>&nbsp;</span></p>

<p class=MsoNormal><b><span lang=ES>De &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; &nbsp; </span></b><span
class=fdestinatario><span lang=ES style=\'font-size:12.0pt;line-height:107%\'>'.$de.'</span></span></p>
<p class=MsoNormal><span lang=ES>&nbsp;</span></p>

<p class=MsoNormal><b><span lang=ES>Asunto &nbsp; &nbsp; &nbsp; &nbsp; :&nbsp; &nbsp; &nbsp; </span></b><span
class=fdestinatario><span lang=ES style=\'font-size:12.0pt;line-height:107%\'>'.$this->co['asunto'].'</span></span></p>
<p class=MsoNormal><span lang=ES>&nbsp;</span></p>

<br/><br/><br/>'

.$this->co['contenido'].

'<footer id="footer">
<p class=MsoNormal><b><span lang=ES>'.$_SESSION['usuario']['nombre'].'</span></b></p>
<p class=MsoNormal><span class=fdestinatario><span lang=ES style=\'font-size:
12.0pt;line-height:107%\'>'.$_SESSION['usuario']['puesto'].' '.$_SESSION['usuario']['codigo_depto'].'</span></span></p>
<br/><br/>
'.$p.'
	<p class=txtctr><span lang=ES style=\'font-family:"Calibri",sans-serif;
	color:gray\'>Av. César Nicolás Penson # 91, Plaza de la Cultura Juan Pablo Duarte, Gazcue, Santo Domingo, D. N.
	<br> RNC. 401-03133-7 / Tel.: 829-946-2674 / info@bnphu.gob.do</span></p>
	<p class=MsoNormal><span lang=ES>&nbsp;</span></p>
</footer>
</div>

</div>

</body>

</html>';
