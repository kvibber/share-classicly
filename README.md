# Share Classicly

Stable tag: N/A  
Tags: sharing, fediverse, mastodon, classicpress  
Tested up to: N/A  
Contributors: Kelson  
License: GPLv2 or later

Adds a link to the ShareOpenly service at the end of your posts so that readers can share to Mastodon, Bluesky, Threads and similar open social media sites.

## Description

Adds a link to the [ShareOpenly](https://shareopenly.org/) service at the end of you posts so that readers can easily share them to Mastodon, Bluesky, Threads and similar open social media sites. No remote scripts or data are loaded until the visitor clicks on the link.

The plugin is built for ClassicPress, but will probably work fine on WordPress too.

## Notes

ShareOpenly is a service [built and run by Ben Werdmuller](https://werd.io/2024/share-openly). I just used the link format described at [Add ShareOpenly links to your site](https://shareopenly.org/add/).

There is a WordPress plugin that does something similar, but it detects when it's running on ClassicPress and deactivates itself. I thought about forking it, but decided to just write my own, since I'd [already done it myself with Eleventy](https://hyperborea.org/tech-tips/share-openly/). I did not read any of that plugin's code except for the function that blocks running on forks -- which I'm obviously not using here! -- and did not reference any of it when writing this one.

## Installation

Install the plugin and activate it.

## TODO

- Testing!
- Optional pop-up instead of just opening in a new tab.
- Optionally pre-fill with excerpt along with or instead of title.
- Add to ClassicPress plugin directory.

## Changelog

### [0.1pre] - 2024-10-31

* Initial prototype.

[Source on Codeberg](https://codeberg.org/kvibber/share-classicly).  

Nothing at these links yet:  
[Mirror on GitHub](https://github.com/kvibber/share-classicly).  
[Plugin page at ClassicPress](https://directory.classicpress.net/plugins/share-classicly).

(c) 2024 [Kelson Vibber](https://kvibber.com/)
