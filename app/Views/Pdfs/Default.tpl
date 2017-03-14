<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<style>
* {
    margin: 0;
    padding: 0;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    font-size: 100%;
    line-height: 1.6;
}

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100%!important;
    height: 100%;
}


/* -------------------------------------
        ELEMENTS
------------------------------------- */
a {
    color: #348eda;
}

/* -------------------------------------
        BODY
------------------------------------- */
table.body-wrap {
    width: 100%;
    padding: 20px;
}

table.body-wrap .container {
    border: 1px solid #f0f0f0;
}


/* -------------------------------------
        FOOTER
------------------------------------- */
table.footer-wrap {
    width: 100%;
    clear: both!important;
}

.footer-wrap .container p {
    font-size: 12px;
    color: #666;

}

table.footer-wrap a {
    color: #999;
}


/* -------------------------------------
        TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 0px;
    line-height: 1.2;
    font-weight: 200;
}

h1 {
    font-size: 36px;
}
h2 {
    font-size: 28px;
}
h3 {
    font-size: 22px;
}

p, ul, ol {
    margin-bottom: 10px;
    font-weight: normal;
    font-size: 14px;
}

ul li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

table {
    max-width: 100%;
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
}

.table {
    width: 100%;
    margin-bottom: 20px;
}
.table th, .table td {
    padding: 8px;
    line-height: 20px;
    text-align: left;
    vertical-align: top;
    border-top: 1px solid #dddddd;
}

.table th {
    font-weight: bold;
}

.table thead th {
    vertical-align: bottom;
}

.table caption+thead tr:first-child th, .table caption+thead tr:first-child td, .table colgroup+thead tr:first-child th, .table colgroup+thead tr:first-child td, .table thead:first-child tr:first-child th, .table thead:first-child tr:first-child td {
    border-top: 0;
}

.table tbody+tbody {
    border-top: 2px solid #dddddd;
}

.table .table {
    background-color: #ffffff;
}

.table-condensed th, .table-condensed td {
    padding: 4px 5px;
}

.table-bordered {
    border: 1px solid #dddddd;
    border-collapse: separate;
    *border-collapse: collapse;
    border-left: 0;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.table-bordered th, .table-bordered td {
    border-left: 1px solid #dddddd;
}

.table-bordered caption+thead tr:first-child th, .table-bordered caption+tbody tr:first-child th, .table-bordered caption+tbody tr:first-child td, .table-bordered colgroup+thead tr:first-child th, .table-bordered colgroup+tbody tr:first-child th, .table-bordered colgroup+tbody tr:first-child td, .table-bordered thead:first-child tr:first-child th, .table-bordered tbody:first-child tr:first-child th, .table-bordered tbody:first-child tr:first-child td {
    border-top: 0;
}

.table-bordered thead:first-child tr:first-child>th:first-child, .table-bordered tbody:first-child tr:first-child>td:first-child {
    -webkit-border-top-left-radius: 4px;
    -moz-border-radius-topleft: 4px;
    border-top-left-radius: 4px;
}

.table-bordered thead:first-child tr:first-child>th:last-child, .table-bordered tbody:first-child tr:first-child>td:last-child {
    -webkit-border-top-right-radius: 4px;
    -moz-border-radius-topright: 4px;
    border-top-right-radius: 4px;
}

.table-bordered thead:last-child tr:last-child>th:first-child, .table-bordered tbody:last-child tr:last-child>td:first-child, .table-bordered tfoot:last-child tr:last-child>td:first-child {
    -webkit-border-bottom-left-radius: 4px;
    -moz-border-radius-bottomleft: 4px;
    border-bottom-left-radius: 4px;
}

.table-bordered thead:last-child tr:last-child>th:last-child, .table-bordered tbody:last-child tr:last-child>td:last-child, .table-bordered tfoot:last-child tr:last-child>td:last-child {
    -webkit-border-bottom-right-radius: 4px;
    -moz-border-radius-bottomright: 4px;
    border-bottom-right-radius: 4px;
}

.table-bordered tfoot+tbody:last-child tr:last-child td:first-child {
    -webkit-border-bottom-left-radius: 0;
    -moz-border-radius-bottomleft: 0;
    border-bottom-left-radius: 0;
}

.table-bordered tfoot+tbody:last-child tr:last-child td:last-child {
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-bottomright: 0;
    border-bottom-right-radius: 0;
}

.table-bordered caption+thead tr:first-child th:first-child, .table-bordered caption+tbody tr:first-child td:first-child, .table-bordered colgroup+thead tr:first-child th:first-child, .table-bordered colgroup+tbody tr:first-child td:first-child {
    -webkit-border-top-left-radius: 4px;
    -moz-border-radius-topleft: 4px;
    border-top-left-radius: 4px;
}

.table-bordered caption+thead tr:first-child th:last-child, .table-bordered caption+tbody tr:first-child td:last-child, .table-bordered colgroup+thead tr:first-child th:last-child, .table-bordered colgroup+tbody tr:first-child td:last-child {
    -webkit-border-top-right-radius: 4px;
    -moz-border-radius-topright: 4px;
    border-top-right-radius: 4px;
}

.table-striped tbody>tr:nth-child(odd)>td, .table-striped tbody>tr:nth-child(odd)>th {
    background-color: #f9f9f9;
}

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
    background-color: #f5f5f5;
}

table td[class*="span"], table th[class*="span"], .row-fluid table td[class*="span"], .row-fluid table th[class*="span"] {
    display: table-cell;
    float: none;
    margin-left: 0;
}

.table tbody tr.success td {
    background-color: #dff0d8;
}

.table tbody tr.error td {
    background-color: #f2dede;
}

.table tbody tr.warning td {
    background-color: #fcf8e3;
}

.table tbody tr.info td {
    background-color: #d9edf7;
}

.table-hover tbody tr.success:hover td {
    background-color: #d0e9c6;
}

.table-hover tbody tr.error:hover td {
    background-color: #ebcccc;
}

.table-hover tbody tr.warning:hover td {
    background-color: #faf2cc;
}

.table-hover tbody tr.info:hover td {
    background-color: #c4e3f3;
}

</style>
</head>

<body bgcolor="#f6f6f6">

{{ $content }}
