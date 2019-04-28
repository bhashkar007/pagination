# Pagination plugin for Craft CMS

![Screenshot](http://www.hashtagerrors.com/assets/uploads/pagination.jpg)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require hashtagerrors/pagination

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Pagination.

## Pagination Overview

This plugin helps you render the following types of paginations :
* First & Next Pagination
* Ellipsis Pagination
* Numeric Pagination

![Screenshot](http://www.hashtagerrors.com/assets/uploads/available-paginations.png)

## Using Pagination

To render paginations you need to use the following code:

    {% paginate craft.entries.section('blog').limit(1) as pageInfo, pageEntries %}
    {{ craft.pagination.render(pageInfo, type, options) }}
    
* **pageInfo** is the Craft's PaginateVariable given in `{% paginate %}` tag.
* **type** is the kind of pagination you want to render. Available values are :
  * firstNext
  * ellipsis
  * numeric
* **options** provides you a way to customize the html that is rendered through the plugin. Available options are:
  * ulClass : Class to add in `<ul>`
  * liClass : Class to add in `<li>`
  * aClass : Class to add in `<a>`
  * activeClass : Class to be added on current page`<li>`. Default **active**.
  * includeFirstLast :  Set `true` if you need to show First and Last link in pagination. Default **false**.  (Only available for Numeric Pagination)
  * firstText : The text for First Link. Default **First **.  
  * lastText : The text for Last Link. Default **last **.  
  * includePrevNext : Set `true` if you need to show Previous and Next link in pagination. (Only available for Numeric Pagination). Default **false**. (Only available for Numeric Pagination)
  * prevText : The text for Previous Link. Default **< Prev**. 
  * nextText : The text for Next Link. Default **Next >**. 
  * pageRange : Number of Previous and Next Links you want to show. Default **3**. 
  * showPageInfo : Set `true` to show  Page curent of total.  Default **false**. 

## Templating Examples

**First & Next Pagination**

	{{ craft.pagination.render(pageInfo, 'firstNext', {
		ulClass: 'pagination',
		liClass: 'page-item',
		aClass: 'page-link',
		showPageInfo : true,
		prevText: '<i class="fa fa-angle-double-left" aria-hidden="true"></i> Prev',
		nextText: 'Next <i class="fa fa-angle-double-right" aria-hidden="true"></i>'
	}) }}


**Ellipsis Pagination**

	{{ craft.pagination.render(pageInfo, 'ellipsis', {
		ulClass: 'pagination',
		liClass: 'page-item',
		aClass: 'page-link',
		activeClass: 'active',
		includeFirstLast: true,
		includePrevNext: true,
		prevText: '<i class="fa fa-angle-double-left" aria-hidden="true"></i> Prev',
		nextText: 'Next <i class="fa fa-angle-double-right" aria-hidden="true"></i>',
		pageRange: 1
	}) }}

**Numeric Pagination**

	{{ craft.pagination.render(pageInfo, 'numeric', {
		ulClass: 'pagination',
		liClass: 'page-item',
		aClass: 'page-link',
		activeClass: 'active',
		includeFirstLast: true,
		includePrevNext: true,
		pageRange: 3
	}) }}

## Pagination Roadmap

* Give users more options to make paginations much more dynamic.

New ideas are always welcome. You can post your idea or request [here](https://github.com/hashtagerrors/pagination/issues/new) 

## Attribution

Icon made by [Freepik](https://www.freepik.com) from [Flaticon](https://www.flaticon.com).

Brought to you by [Hashtag Errors](http://hashtagerrors.com)