<?php
	/* Libchart - PHP chart library
	 * Copyright (C) 2005-2011 Jean-Marc Tr�meaux (jm.tremeaux at gmail.com)
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 * 
	 */
	
	/**
	 * Pie chart demonstration
	 *
	 */

	include "../libchart/classes/libchart.php";

	$chart = new PieChart();
$a = 100;
$b = 50;
	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Lulus (".$a.")", $a));

	$dataSet->addPoint(new Point("Tidak Lulus (".$b.")", $b));
	$chart->setDataSet($dataSet);

	$chart->setTitle("Diagram Kelulusan");
	$chart->render("generated/demo3.png");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Libchart pie chart demonstration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Pie chart"  src="generated/demo3.png" style="border: 1px solid gray;"/>
</body>
</html>
