    <!--
    // BASIC SITES INFO
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{isset($pageInfo->title) ? $pageInfo->title : 'Home'}} || {{trans('general.software_acronym')}}</title>

    <meta name="robots" content="index, follow">
    <meta name="keywords" content="{{trans('general.software_acronym')}}">
    <meta name="description" content="{{trans('general.software_name')}}">
    <meta name="application-name" content="{{str_replace(' ', '-', strtolower(trans('general.software_name')))}}">
    <meta name="author" content="{{trans('general.software_author')}}">