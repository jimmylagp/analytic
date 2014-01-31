(function(){

    var Tracking = {
        versionSearchString: "",
        
        urlPage: function(){
            return location.href.match(/https?:\/\/[^\/]+/i) + location.href.replace(/https?:\/\/[^\/]+/i,'');
        },
        
        dateVisit: function(){
            var d = new Date();
            return  d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        },

        hourVisit: function(){
            var d = new Date();
            return d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
        },

        browserName: function(){
            return this.getNames(this.dataBrowser) || "An unknown browser";
        },

        browserLanguage: function(){
            return navigator.language || navigator.userLanguage;
        },

        browserVersion: function(){
            return this.getVersions(navigator.userAgent || navigator.appVersion) || "An unknown version";
        },

        osName: function(){
            return this.getNames(this.dataOS) || "An unknown OS";
        },

        countryVisit: function(){
            var response = "";
            var request = this.createCORSRequest("get", "http://freegeoip.net/json/");
            if (request){
                request.onloadend = function(){
                    response = JSON.parse(request.responseText);
                };
                request.send();
            }
            return response['country_name'];
        },

        createCORSRequest: function (method, url){
            var xhr = new XMLHttpRequest();
            if ("withCredentials" in xhr){
                xhr.open(method, url, false);
            } else if (typeof XDomainRequest != "undefined"){
                xhr = new XDomainRequest();
                xhr.open(method, url);
            } else {
                xhr = null;
            }
            return xhr;
        },

        getNames: function(data){
            for (var i=0;i<data.length;i++){
                var dataString = data[i].string;
                var dataProp = data[i].prop;
                this.versionSearchString = data[i].versionSearch || data[i].identity;
                if (dataString) {
                    if (dataString.indexOf(data[i].subString) != -1)
                        return data[i].identity;
                }
                else if (dataProp)
                    return data[i].identity;
            }
        },

        getVersions: function(dataString){
            var index = dataString.indexOf(this.versionSearchString);
            if (index == -1) return;
            return parseFloat( dataString.substring( index + this.versionSearchString.length + 1 ) );
        },

        dataBrowser: [
            {       
                    string: navigator.userAgent,
                    subString: "OmniWeb",
                    versionSearch: "OmniWeb/",
                    identity: "OmniWeb"
            },
            {
                    string: navigator.userAgent,
                    subString: "OPR",
                    identity: "Opera",
                    versionSearch: "OPR"
            },
            {
                    string: navigator.vendor,
                    subString: "Apple",
                    identity: "Safari",
                    versionSearch: "Version"
            },
            {
                    string: navigator.userAgent,
                    subString: "Chrome",
                    identity: "Google Chrome",
                    versionSearch: "Chrome"
            },
            {
                    string: navigator.vendor,
                    subString: "iCab",
                    identity: "iCab"
            },
            {
                    string: navigator.vendor,
                    subString: "KDE",
                    identity: "Konqueror"
            },
            {
                    string: navigator.userAgent,
                    subString: "Firefox",
                    identity: "Firefox"
            },
            {
                    string: navigator.vendor,
                    subString: "Camino",
                    identity: "Camino"
            },
            {                // for newer Netscapes (6+)
                    string: navigator.userAgent,
                    subString: "Netscape",
                    identity: "Netscape"
            },
            {
                    string: navigator.userAgent,
                    subString: "MSIE",
                    identity: "Internet Explorer",
                    versionSearch: "MSIE"
            },
            {
                    string: navigator.userAgent,
                    subString: "Gecko",
                    identity: "Mozilla",
                    versionSearch: "rv"
            },
            {                 // for older Netscapes (4-)
                    string: navigator.userAgent,
                    subString: "Mozilla",
                    identity: "Netscape",
                    versionSearch: "Mozilla"
            }
        ],

        dataOS : [
            {
                    string: navigator.platform,
                    subString: "Win",
                    identity: "Windows"
            },
            {
                    string: navigator.platform,
                    subString: "Mac",
                    identity: "Mac OS X"
            },
            {
                    string: navigator.platform,
                    subString: "Linux",
                    identity: "Linux"
            },
            {
                    string: navigator.userAgent,
                    subString: "Android",
                    identity: "Android"
            },
            {
                    string: navigator.userAgent,
                    subString: "iPhone",
                    identity: "iOS"
            },
            {
                    string: navigator.userAgent,
                    subString: "iPod",
                    identity: "iOS"
            },
            {
                    string: navigator.userAgent,
                    subString: "iPad",
                    identity: "iOS"
            }
        ]
    }


    var data  = {
        'url'      : Tracking.urlPage(),
        'browser'  : Tracking.browserName() + " - " + Tracking.browserVersion(),
        'os'       : Tracking.osName(),
        'country'  : Tracking.countryVisit(),
        'language' : Tracking.browserLanguage(),
        'date'     : Tracking.dateVisit(),
        'hour'     : Tracking.hourVisit(),
        'website'  : _at,
    };

    var params = JSON.stringify(data);

    var xhp = new XMLHttpRequest();
    xhp.open("POST", "/index.php/traffic/", true);
    xhp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhp.onreadystatechange = function() {
        if(xhp.readyState == 4 && xhp.status == 200) {
            console.log("OK");
        }
    }
    xhp.send(params);

    console.log(xhp);
})(_at);
