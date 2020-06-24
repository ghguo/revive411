# ADR Adserver - An Open Source Adserver With Content Target Capability
**ADR Adserver is based on open source Revive Adserver v4.1.1.** that enables advertisers to:

* Target ads to published content using IAB Categories and keywords;
* Receive Real Time Bidding (RTB)/Header Bidding (HB) requests.

With Content Target Plugin, an advertiser can specify which IAB Categories or keywords an ad is targeted to. When a request with the targeted IAB Categories and the targeted keywords is received, the ad is matched and delivered.

You can find more about IAB Categoies at https://www.iab.com/guidelines/iab-quality-assurance-guidelines-qag-taxonomy/


# Usage Of Code

You can use the code as is for your ad server. It has all Revive Adserver v4.1.1 features/functionality plus Content Target and RTB/HB capabilities.

You can also use the code as examples to modify your own adserver to add Content Target and RTB/HB capabilities.

Yoy are welcome to migrate Content Target Plugin and RTB/HB to newer version of Revive Adserver.


# Content Target Plugin & RTB/HB

The Content Target Plugin is implemented in plugins\deliveryLimitations\Content

The RTB/HB is in www\delivery\asyncspc.php


# License

Revive Adserver is copyright; please see the COPYRIGHT file.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

------------------------------------------------------------------------
