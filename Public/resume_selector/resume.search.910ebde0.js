
webpackJsonp([8], {
        "/7sM": function(module, exports) {},
        "/jcb": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.hindustry = {
                "list": {
                    "000": ["全部"],
                    "01": ["IT/互联网", ""],
                    "02": ["制造", ""],
                    "03": ["金融/保险", ""],
                    "04": ["医药", ""],
                    "05": ["地产", ""],
                    "06": ["消费品(快消/耐消/零售)", ""],
                    "07": ["公关/传媒", ""],
                    "08": ["汽车行业", ""],
                    "09": ["化工行业", ""],
                    "10": ["能源/新能源", ""],
                    "11": ["环保行业", ""],
                    "12": ["教育/培训", ""],
                    "13": ["通信/电子", ""],
                    "14": ["交通/物流/运输", ""],
                    "15": ["餐饮/休闲/娱乐", ""],
                    "16": ["仪器/仪表", ""],
                    "17": ["贸易", ""],
                    "18": ["农、林、牧、渔业", ""],
                    "19": ["商业服务", ""],
                    "99": ["其他领域", ""]
                },
                "relations": {
                    "all": ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "99"]
                }
            }
        },
        "15h4": function(module, exports, __webpack_require__) {
            function webpackContext(req) {
                return __webpack_require__(webpackContextResolve(req))
            }

            function webpackContextResolve(req) {
                var id = map[req];
                if(!(id + 1)) throw new Error("Cannot find module '" + req + "'.");
                return id
            }
            var map = {

                "./city": "Y4uM",
                "./city.js": "Y4uM",
                "./country": "syiX",
                "./country.js": "syiX",
                "./hindustry": "/jcb",
                "./hindustry.js": "/jcb",
                "./hjobs": "QsBD",
                "./hjobs.js": "QsBD",
                "./industry": "2gXM",
                "./industry.js": "2gXM",
                "./industry_field": "Kymm",
                "./industry_field.js": "Kymm",
                "./industry_job": "CXyO",
                "./industry_job.js": "CXyO",
                "./jobs": "tnc4",
                "./jobs.js": "tnc4",
                "./old/witkey_city": "UEs5",
                "./old/witkey_city.js": "UEs5",
                "./province": "QtjF",
                "./province.js": "QtjF",
            };
            webpackContext.keys = function() {
                return Object.keys(map)
            }, webpackContext.resolve = webpackContextResolve, module.exports = webpackContext, webpackContext.id = "15h4"
        },
        "2gXM": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.industry = {
                "list": {
                    "000": ["全部", "All"],
                    "cat-01": ["互联网·游戏·软件", "Internet · Online Games · Software"],
                    "040": ["互联网/移动互联网/电子商务", "Internet/Mobile Internet/E-Business"],
                    "420": ["网络游戏", "Online Game"],
                    "010": ["计算机软件", "Computer Software"],
                    "030": ["IT服务/系统集成", "IT Services/Systems Integration"],
                    "cat-02": ["电子·通信·硬件", "Electronics · Telecommunication · Hardware"],
                    "050": ["电子技术/半导体/集成电路", "Electronics/Microelectronics"],
                    "060": ["通信(设备/运营/增值)", "Communications (Equipment/Sales/Value-Added)"],
                    "020": ["计算机硬件/网络设备", "Computer Hardware/Network Equipment"],
                    "cat-03": ["房地产·建筑·物业", "Real estate·Construction · Property management"],
                    "080": ["房地产开发/建筑/建材/工程", "Real Estate Development/Architectural Services/Building Materials/Construction"],
                    "100": ["规划/设计/装潢", "Construction Planning/Interior Design/Decoration"],
                    "090": ["房地产服务(物业管理/地产经纪)", "Real Estate Services"],
                    "cat-04": ["金融", "Finance"],
                    "130": ["银行", "Banking"],
                    "140": ["保险", "Insurance"],
                    "150": ["基金/证券/期货/投资", "Securities/Futures/Investment Funds"],
                    "430": ["会计/审计", "Accounting/Auditing"],
                    "500": ["信托/担保/拍卖/典当", "Trust/Guarantee/Auction/Pawn Business"],
                    "cat-05": ["消费品", "Consumer Goods"],
                    "190": ["食品/饮料/烟酒/日化", "Food/Drink/Wine/Commodity"],
                    "240": ["百货/批发/零售", "General Merchandise/Wholesale/Retail"],
                    "200": ["服装服饰/纺织/皮革", "Clothing/Textiles/Furniture"],
                    "210": ["家具/家电", "Furniture/Home Appliances"],
                    "220": ["办公用品及设备", "Office Equipment/Supplies"],
                    "460": ["奢侈品/收藏品", "Luxury/Collection"],
                    "470": ["工艺品/珠宝/玩具", "Arts & Craft/Toys/Jewelry"],
                    "cat-06": ["汽车·机械·制造", "Automobiles · Machinery · Manufacturing"],
                    "350": ["汽车/摩托车", "Automobiles/Motorcycles"],
                    "360": ["机械制造/机电/重工", "Machine Manufacturing/Heavy Electrical"],
                    "180": ["印刷/包装/造纸", "Printing/Packaging/Papermaking"],
                    "370": ["原材料及加工", "Raw Materials Processing"],
                    "340": ["仪器/仪表/工业自动化/电气", "Instrumentation/Industrial Automation/Electrical"],
                    "cat-07": ["服务·外包·中介", "Service · Outsourcing · Agency"],
                    "120": ["专业服务(咨询/财会/法律/翻译等)", "Professional Services (Consult/Accounting/Legal/Translate)"],
                    "110": ["中介服务", "Intermediate Services"],
                    "440": ["外包服务", "Outsourcing Services"],
                    "450": ["检测/认证", "Testing/Certification"],
                    "230": ["旅游/酒店/餐饮服务/生活服务", "Tourism/Hospitality/Restaurant & Food Services/Personal Care & Services"],
                    "260": ["娱乐/休闲/体育", "Entertainment/Leisure/Sports & Fitness"],
                    "510": ["租赁服务", "Leasing Service"],
                    "cat-08": ["广告·传媒·教育·文化", "Advertising · Media · Education · Culture"],
                    "070": ["广告/公关/市场推广/会展", "Advertising/Public Relations/Marketing/Exhibitions"],
                    "170": ["影视/媒体/艺术/文化/出版", "Film & Television/Media/Arts/Communication"],
                    "380": ["教育/培训/学术/科研/院校", "Education/Training/Science/Research/Universities and Colleges"],
                    "cat-09": ["交通·贸易·物流", "Transportation · Trade · Logistics"],
                    "250": ["交通/物流/运输", "Transportation/Shipping/Logistics"],
                    "160": ["贸易/进出口", "Trade/Import-Export"],
                    "480": ["航空/航天", "Aerospace/Aviation/Airlines"],
                    "cat-10": ["制药·医疗", "Pharmaceutical · Healthcare"],
                    "270": ["制药/生物工程", "Pharmaceuticals/Biotechnology"],
                    "280": ["医疗/保健/美容/卫生服务", "Medical/Health and Beauty Services"],
                    "290": ["医疗设备/器械", "Medical Equipment/Devices"],
                    "cat-11": ["能源·化工·环保", "Energy · Chemical · Environmental Protection"],
                    "330": ["能源(电力/水利)", "Energy (Electricity/Water Conservation)"],
                    "310": ["石油/石化/化工", "Rock oil/Chemical Industry"],
                    "320": ["采掘/冶炼/矿产", "Mining/Metallurgy"],
                    "300": ["环保", "Environmental Protection"],
                    "490": ["新能源", "New Energy"],
                    "cat-12": ["政府·农林牧渔", "Government · Agriculture"],
                    "390": ["政府/公共事业/非营利机构", "Government/public service/Non-Profit"],
                    "410": ["农/林/牧/渔", "Farming/Forestry/Animal Husbandry and Fishery"],
                    "400": ["其他", "Other"]
                },
                "relations": {
                    "cat-01": ["040", "420", "010", "030"],
                    "cat-02": ["050", "060", "020"],
                    "cat-03": ["080", "100", "090"],
                    "cat-04": ["130", "140", "150", "430", "500"],
                    "cat-05": ["190", "240", "200", "210", "220", "460", "470"],
                    "cat-06": ["350", "360", "180", "370", "340"],
                    "cat-07": ["120", "110", "440", "450", "230", "260", "510"],
                    "cat-08": ["070", "170", "380"],
                    "cat-09": ["250", "160", "480"],
                    "cat-10": ["270", "280", "290"],
                    "cat-11": ["330", "310", "320", "300", "490"],
                    "cat-12": ["390", "410", "400"]
                }
            }
        },
        "4JSc": function(module, exports, __webpack_require__) {
            "use strict";
            (function(global) {
                function _classCallCheck(instance, Constructor) {
                    if(!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
                }
                var _createClass = function() {
                        function defineProperties(target, props) {
                            for(var i = 0; i < props.length; i++) {
                                var descriptor = props[i];
                                descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                            }
                        }
                        return function(Constructor, protoProps, staticProps) {
                            return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                        }
                    }(),
                    CoreClass = function() {
                        function CoreClass() {
                            return _classCallCheck(this, CoreClass), this.tpls = {}, this.scripts = {}, this.datas = {}, this._initTpls()._initScripts(), this
                        }
                        return _createClass(CoreClass, [{
                            "key": "_generate",
                            "value": function() {
                                return Math.random().toString().replace(".", "")
                            }
                        }, {
                            "key": "_initTpls",
                            "value": function() {
                                var $NODETPL = this;
                                return this.tpls = {
                                    "main": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid(), _ += "<style>#" + guid + " {  padding: 10px;  width: 350px;  font-size: 14px;}#" + guid + " .buttons {  text-align: center;  margin-top: 20px;}#" + guid + " .buttons a {  margin: 0 10px;}#" + guid + " .set-modifiny-title {  text-align: center;  background: url(" + __webpack_require__("icNc") + ") 0 0px no-repeat;  width: 200px;  margin: 0 auto;  height: 32px;  line-height: 32px;  padding-left: 50px;  margin-bottom: 30px;  font-size: 16px;}</style>";
                                        try {
                                            _ += '<div id="' + guid + '">\n  ', "tip_unregular_member" == $DATA.unregular_member_tips && (_ += '\n   <h3 class="set-modifiny-title">您尚未成为正式会员</h3>\n   <p class="indent">尊敬的猎头用户，您提交的认证信息正在审核中，审核通过后将对您开放全部功能。</p>\n   <div class="buttons">\n   \t<a class="btn btn-primary" href="/certification/home/">确定</a>\n   </div>\n  '), _ += "\n\n  ", "tip_improve_cert_info" == $DATA.unregular_member_tips && (_ += '\n   <h3 class="set-modifiny-title">认证信息暂未完善</h3>\n   <p class="indent">尊敬的猎头用户，您的三项认证暂未完善，请尽快完善，我们将第一时间进行审核。</p>\n   <div class="buttons">\n   \t<a class="btn btn-primary" href="/certification/home/">完善信息</a>\n   \t<a class="btn btn-light" data-selector="btn-cancel" href="javascript:;">取消</a>\n   </div>\n  '), _ += "\n\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA),
                                            function(scripts) {
                                                var cache = "undefined" != typeof window ? window : void 0 !== global ? global : {};
                                                cache._nodetpl_ = cache._nodetpl_ || {}, cache._nodetpl_[guid + "-" + duid] = scripts["main"]
                                            }($NODETPL.scripts), _ += "<script>\n", _ += "(function(){\n", _ += "  var cache = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : {};\n", _ += "  cache._nodetpl_['" + guid + "-" + duid + "']('" + guid + "', '" + duid + "');\n", _ += "  delete cache._nodetpl_['" + guid + "-" + duid + "'];\n", _ += "})();\n", _ += "<\/script>\n"
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "_initScripts",
                            "value": function() {
                                var $NODETPL = this;
                                return this.scripts = {
                                    "main": function(guid, duid) {
                                        var ROOT = document.getElementById(guid);
                                        document.getElementById(guid + duid), $NODETPL.tpls, $NODETPL.datas[duid];
                                        $(ROOT).find(".buttons a[data-selector='btn-cancel']").on("click", function() {
                                            vdialog.top.close()
                                        })
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "duid",
                            "value": function() {
                                return "nodetpl_d_" + this._generate()
                            }
                        }, {
                            "key": "guid",
                            "value": function() {
                                return "nodetpl_g_" + this._generate()
                            }
                        }, {
                            "key": "escapeHtml",
                            "value": function(html) {
                                return html ? html.toString().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;") : html
                            }
                        }, {
                            "key": "render",
                            "value": function(data, guid) {
                                return this.tpls.main(data, guid || this.guid())
                            }
                        }]), CoreClass
                    }();
                module.exports = {
                    "render": function(data) {
                        return(new CoreClass).render(data)
                    }
                }
            }).call(exports, __webpack_require__("DuR2"))
        },
        "C4Cc": function(module, exports, __webpack_require__) {
            "use strict";
            $.fn.bgIframe || function($) {
                $.fn.bgIframe = $.fn.bgiframe = function(s) {
                    if("6" == (/msie\s*(\d+)\.\d+/g.exec(navigator.userAgent.toLowerCase()) || [0, "0"])[1]) {
                        s = $.extend({
                            "top": "auto",
                            "left": "auto",
                            "width": "auto",
                            "height": "auto",
                            "opacity": !0,
                            "src": "javascript:false;"
                        }, s || {});
                        var prop = function(n) {
                                return n && n.constructor == Number ? n + "px" : n
                            },
                            html = '<iframe class="bgiframe"frameborder="0"tabindex="-1"src="' + s.src + '"style="display:block;position:absolute;z-index:-1;' + (!1 !== s.opacity ? "filter:Alpha(Opacity='0');" : "") + "top:" + ("auto" == s.top ? "expression(((parseInt(this.parentNode.currentStyle.borderTopWidth)||0)*-1)+'px')" : prop(s.top)) + ";left:" + ("auto" == s.left ? "expression(((parseInt(this.parentNode.currentStyle.borderLeftWidth)||0)*-1)+'px')" : prop(s.left)) + ";width:" + ("auto" == s.width ? "expression(this.parentNode.offsetWidth+'px')" : prop(s.width)) + ";height:" + ("auto" == s.height ? "expression(this.parentNode.offsetHeight+'px')" : prop(s.height)) + ';"/>';
                        return this.each(function() {
                            0 == $("> iframe.bgiframe", this).length && this.insertBefore(document.createElement(html), this.firstChild)
                        })
                    }
                    return this
                }
            }(jQuery),
                function($) {
                    $.fn.autoComplete = function(options) {
                        options = options || {};
                        var defaults = {
                            "ajax": !1,
                            "source": [],
                            "key": "name",
                            "readonly": !1,
                            "charlength": 0,
                            "maxlength": 10,
                            "global": !0,
                            "dock": !1,
                            "select": null,
                            "callback": null
                        };
                        return options = $.extend(defaults, options), this.each(function() {
                            var that = $(this),
                                autocompletedroplist = $("<div class='j-autocomplete'>").hide().insertAfter(this).bgiframe(),
                                itemUl = $("<ul />").appendTo(autocompletedroplist);
                            that.bind("focus", function() {
                                var position = that.position();
                                autocompletedroplist.css({
                                    "left": position.left,
                                    "top": position.top + that.outerHeight(),
                                    "width": options.dock ? "auto" : that.outerWidth() - 2
                                })
                            });
                            var _ajax, showList = function(data, v) {
                                    if(itemUl.empty(), 0 === data.length) autocompletedroplist.hide();
                                    else {
                                        for(var i = 0; i < data.length; i++) {
                                            var richArray = v.split(""),
                                                source = data[i][options.key];
                                            source = source.replace(/(.)/g, "<strong>$1</strong>");
                                            for(var j = 0; j < richArray.length; j++) source = source.replace("<strong>" + richArray[j] + "</strong>", "<span>" + richArray[j] + "</span>");
                                            itemUl.append("<li data-index=" + i + ">" + source + "</li>")
                                        }
                                        itemUl.find("li").bind("mouseover", function() {
                                            $(this).addClass("hasFocus")
                                        }).bind("mouseout", function() {
                                            $(this).removeClass("hasFocus")
                                        }).bind("click", function() {
                                            that.val($(this).text()).trigger("_init"), options.select && options.select.call(options, $(this).text(), data[$(this).attr("data-index")]), autocompletedroplist.hide(), -1 !== options.charlength && that.trigger("focus")
                                        }).bind("select", function() {
                                            $(this).addClass("hasFocus").siblings(".hasFocus").removeClass("hasFocus")
                                        }), autocompletedroplist.show()
                                    }
                                },
                                isContained = function(a, b) {
                                    if(!(a instanceof Array && b instanceof Array)) return !1;
                                    if(a.length < b.length) return !1;
                                    for(var aStr = a.toString().toLowerCase(), i = 0, len = b.length; i < len; i++)
                                        if(-1 == aStr.indexOf(b[i].toLowerCase())) return !1;
                                    return !0
                                },
                                eventname = "keyup paste";
                            return -1 === options.charlength && (that.bind("click", function(event) {
                                event.stopPropagation()
                            }), eventname += " focus"), that.bind(eventname, function(event) {
                                if(9 != event.keyCode && 13 != event.keyCode && 27 != event.keyCode && 37 != event.keyCode && 38 != event.keyCode && 39 != event.keyCode && 40 != event.keyCode) {
                                    var v = that.val(),
                                        matchArray = new Array;
                                    if(v.length >= options.charlength)
                                        if(options.ajax) {
                                            var keys = {};
                                            keys[options.ajax.keyname || "key"] = v, "" !== v && (_ajax = LT.ajax({
                                                "url": options.ajax.url,
                                                "type": options.ajax.type || "GET",
                                                "dataType": options.ajax.dataType || "json",
                                                "data": $.extend({}, options.ajax.data, keys),
                                                "cache": options.ajax.cache || !0,
                                                "success": function(data) {
                                                    for(var list = options.ajax.success.call(options.ajax, data), i = 0; i < list.length && (matchArray.push(list[i]), matchArray.length !== options.maxlength); i++);
                                                    showList(matchArray, v)
                                                }
                                            }))
                                        } else {
                                            for(var source = "function" == typeof options.source ? options.source.call(that) : options.source, i = 0; i < source.length; i++)
                                                if(options.global) {
                                                    if(isContained(source[i][options.key].split(""), v.split("")) && (matchArray.push(source[i]), matchArray.length === options.maxlength)) break
                                                } else if(matchArray.push(source[i]), matchArray.length === options.maxlength) break;
                                            showList(matchArray, v)
                                        }
                                    else showList([], v)
                                }
                            }).bind("blur", function() {
                                if(options.callback) {
                                    for(var v = that.val(), i = 0; i < options.source.length; i++)
                                        if(options.source[i][options.key] === v) return void options.callback.call(that, options.source[i]);
                                    options.callback.call(that)
                                }
                            }).attr("autocomplete", "off"), $(document).bind("keydown", function(event) {
                                if(!autocompletedroplist.is(":hidden")) {
                                    var keys = [9, 13, 27, 38, 40],
                                        focus = autocompletedroplist.find("li.hasFocus");
                                    switch(event.keyCode) {
                                        case 9:
                                            0 === focus.length ? (keys = LT.Array.remove(keys, event.keyCode), autocompletedroplist.hide()) : focus.trigger("click");
                                            break;
                                        case 13:
                                            focus.trigger("click");
                                            break;
                                        case 27:
                                            autocompletedroplist.hide();
                                            break;
                                        case 38:
                                            var nextLi = focus.prev("li");
                                            0 === nextLi.length && (nextLi = autocompletedroplist.find("li:last")), nextLi.trigger("select");
                                            break;
                                        case 40:
                                            var nextLi = focus.next("li");
                                            0 === nextLi.length && (nextLi = autocompletedroplist.find("li:first")), nextLi.trigger("select")
                                    } - 1 !== keys.indexOf(event.keyCode) && (event.preventDefault(), event.stopPropagation())
                                }
                            }).bind("click", function() {
                                autocompletedroplist.is(":visible") && autocompletedroplist.hide()
                            }), this
                        })
                    }
                }(jQuery),
                function() {
                    var css = ".j-autocomplete{position:absolute;z-index:1000;background-color:#fff;border:1px solid #ccc;}.j-autocomplete ul li{margin:0;padding:0 4px;font-size:14px;line-height:26px;cursor:pointer;word-break:break-all;}.j-autocomplete ul li.hasFocus{background-color:#639ace;color:#fff;}.j-autocomplete ul li sub{margin-left:10px;font-size:12px;color:gray;}.j-autocomplete ul li.hasFocus sub{color:#eee;}.j-autocomplete ul li sub{vertical-align:middle;}",
                        style = document.createElement("style");
                    style.setAttribute("type", "text/css"), style.styleSheet ? style.styleSheet.cssText = css : style.appendChild(document.createTextNode(css)), document.getElementsByTagName("head")[0].appendChild(style)
                }()
        },
        "CJg+": function(module, exports, __webpack_require__) {
            "use strict";
            (function(global) {
                function _classCallCheck(instance, Constructor) {
                    if(!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
                }
                var _createClass = function() {
                        function defineProperties(target, props) {
                            for(var i = 0; i < props.length; i++) {
                                var descriptor = props[i];
                                descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                            }
                        }
                        return function(Constructor, protoProps, staticProps) {
                            return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                        }
                    }(),
                    CoreClass = function() {
                        function CoreClass() {
                            return _classCallCheck(this, CoreClass), this.tpls = {}, this.scripts = {}, this.datas = {}, this._initTpls()._initScripts(), this
                        }
                        return _createClass(CoreClass, [{
                            "key": "_generate",
                            "value": function() {
                                return Math.random().toString().replace(".", "")
                            }
                        }, {
                            "key": "_initTpls",
                            "value": function() {
                                var $NODETPL = this;
                                return this.tpls = {
                                    "main": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid(), _ += "<style>#" + guid + " {  position: relative;  zoom: 1;}#" + guid + ' .clearfix:after {  visibility: hidden;  display: block;  font-size: 0;  content: " ";  clear: both;  height: 0;}#' + guid + " .clearfix {  *zoom: 1;}#" + guid + " .data-filter {  padding: 10px 20px 5px;  background-color: #fafafa;}#" + guid + " .data-filter em {  color: #999;  margin-right: 10px;  display: inline-block;  vertical-align: middle;}#" + guid + " .data-filter .filter-box {  position: relative;  display: inline-block;  vertical-align: middle;  z-index: 2;}#" + guid + " .data-filter .filter-box ul {  display: none;  position: absolute;  left: 0;  top: 100%;  min-width: 100%;  margin-left: -1px;  background-color: #fff;  border: 1px solid #e1e6ea;  box-sizing: border-box;}#" + guid + " .data-filter .filter-box ul li {  border-bottom: 1px solid #f5f5f5;}#" + guid + " .data-filter .filter-box ul li a {  display: block;  padding: 0 10px;  line-height: 26px;  color: #333;  white-space: nowrap;}#" + guid + " .data-filter .filter-box ul li.active a,#" + guid + " .data-filter .filter-box ul li a:hover {  background-color: #f5f5f5;}#" + guid + " .data-filter .filter-box ul li a sup {  vertical-align: middle;  margin-left: 10px;  opacity: .1;}#" + guid + " .data-error {  display: none;  top: 10px;  right: 10px;  padding: 5px 15px;  color: #b94a48;  border-color: #eed3d7;  background-color: #f2dede;  border-radius: 3px;  position: absolute;}#" + guid + " .data-result {  line-height: 22px;  padding: 10px 34px;}#" + guid + " .data-result em {  color: #678;  margin-right: 10px;}#" + guid + " .data-result span {  display: inline-block;  vertical-align: middle;  background-color: #29c;  border-radius: 15px;  padding: 0 14px;  color: #fff;  margin: 0 5px 2px 0;  white-space: nowrap;  cursor: pointer;}#" + guid + " .data-tabs ul {  *zoom: 1;  padding: 0 34px;}#" + guid + ' .data-tabs ul:after {  visibility: hidden;  display: block;  font-size: 0;  content: " ";  clear: both;  height: 0;}#' + guid + " .data-tabs ul li {  float: left;  position: relative;  border-width: 1px 1px 0 1px;  border-color: #d9d9d9;  border-style: solid;  line-height: 26px;  margin-right: -1px;  border-radius: 2px;}#" + guid + " .data-tabs ul li a {  display: block;  padding: 0 15px;  color: #333;}#" + guid + " .data-tabs ul li a em {  display: inline-block;  vertical-align: middle;  width: 10px;  height: 6px;  overflow: hidden;  margin-left: 15px;  margin-right: -5px;  background: url(" + __webpack_require__("Q635") + ");}#" + guid + " .data-tabs ul li a:hover,#" + guid + " .data-tabs ul li a:active,#" + guid + " .data-tabs ul li a:focus {  color: #333;  text-decoration: none;}#" + guid + " .data-tabs ul li.active {  padding-bottom: 1px;  margin-bottom: -1px;  background-color: #fcfcfc;}#" + guid + " .data-container {  min-height: 330px;  background-color: #fcfcfc;  border: 1px solid #e5e5e5;  margin: 0 34px 18px;  padding: 14px 0;  border-radius: 2px;}#" + guid + " .data-container a.d-item {  line-height: 26px;  padding: 0 10px;  display: inline-block;  vertical-align: middle;  white-space: nowrap;  margin-left: 14px;}#" + guid + " .data-container a.d-item:hover,#" + guid + " .data-container a.d-item:active,#" + guid + " .data-container a.d-item:focus {  text-decoration: none;}#" + guid + " .data-container a.d-item:hover {  background-color: #d5e9f2;}#" + guid + " .data-container a.d-item:focus {  outline: none;}#" + guid + " .data-container a.d-item label {  display: none;  font-family: Arial;  line-height: 16px;  margin-left: 4px;  background-color: #5297cc;  color: #fff;  padding: 0 4px;}#" + guid + " .data-container a.d-item-active,#" + guid + " .data-container a.d-item-active:hover {  color: #fff;  background-color: #3d9ccc;}#" + guid + " .data-container a.d-item-multies label {  display: inline-block;}#" + guid + " .data-container a.d-item-disabled {  cursor: no-drop;  color: #666;}#" + guid + " .data-container a.d-item-disabled:hover {  background-color: #fff;}#" + guid + " .data-container .data-title {  line-height: 26px;  margin-left: 25px;  font-weight: bold;  margin-bottom: 10px;}#" + guid + " .data-container .data-all {  margin-bottom: 1px;}#" + guid + " .data-container ul li {  float: left;  margin-bottom: 5px;  width: 180px;  overflow-x: hidden;  text-overflow: ellipsis;}#" + guid + " .data-container-0 ul li {  width: 104px;}#" + guid + " .data-container-1 ul li {  width: 104px;}#" + guid + " .data-container-1 .view-sub ul li {  width: auto;}#" + guid + " .data-container .others {  margin: 8px 50px 0 0;  text-align: center;}#" + guid + " .data-container .others a {  display: inline-block;  border: 1px dashed #a2b6c6;  line-height: 30px;  width: 100%;  color: #678;}</style>";
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + '">\n  ', $DATA.options.search && (_ += '\n    <div class="data-filter">\n      <em>搜索城市：</em>\n      <span class="filter-box">\n        <input data-selector="data-keywords" type="text" class="text" size="20">\n        <ul></ul>\n      </span>\n    </div>\n  '), _ += '\n  <div class="data-result"></div>\n  <div class="data-tabs">\n    <ul>\n      <li data-selector="tab-all"><a href="javascript:;"><span>全部</span><em></em></a></li>\n    </ul>\n  </div>\n  <div class="data-container data-container-', _eqstring = $NODETPL.escapeHtml($DATA.language), _ += void 0 === _eqstring ? "" : _eqstring, _ += '"></div>\n</div>'
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA),
                                            function(scripts) {
                                                var cache = "undefined" != typeof window ? window : void 0 !== global ? global : {};
                                                cache._nodetpl_ = cache._nodetpl_ || {}, cache._nodetpl_[guid + "-" + duid] = scripts["main"]
                                            }($NODETPL.scripts), _ += "<script>\n", _ += "(function(){\n", _ += "  var cache = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : {};\n", _ += "  cache._nodetpl_['" + guid + "-" + duid + "']('" + guid + "', '" + duid + "');\n", _ += "  delete cache._nodetpl_['" + guid + "-" + duid + "'];\n", _ += "})();\n", _ += "<\/script>\n"
                                    }.bind(this),
                                    "view-all": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-all">\n  ', $DATA.options.all && (_ += '\n    <div class="data-list data-list-hot">\n      <ul class="clearfix">\n        <li><a class="d-item" data-code="000" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list["000"][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      </ul>\n    </div>\n  "), _ += '\n  <p class="data-title">热门城市</p>\n  <div class="data-list data-list-hot">\n    <ul class="clearfix">\n      ', $DATA.data.category.hotcities.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      "
                                            }), _ += '\n    </ul>\n  </div>\n  <p class="data-title">全部省份</p>\n  <div class="data-list">\n    <ul class="clearfix">\n      ', $DATA.data.category.provinces.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      "
                                            }), _ += "\n    </ul>\n  </div>\n  ", $DATA.options.foreign ? _ += '\n    <div class="others text-center">\n      <a href="javascript:;" class="d-item" data-code="hwgat">＋ 海外及港澳台<label></label></a>\n    </div>\n  ' : $DATA.options.sar && (_ += '\n    <p class="data-title">港澳台地区</p>\n    <div class="data-list">\n      <ul class="clearfix">\n        ', $DATA.data.category.gangaotai.forEach(function(item, index) {
                                                _ += '\n          <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n        "
                                            }), _ += "\n      </ul>\n    </div>\n  "), _ += "\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this),
                                    "view-sub": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-sub">\n  ', -1 !== $DATA.data.category.provinces.indexOf($DATA._currentCode) ? $DATA.options.all$ && (_ += '\n      <p class="data-all">\n        <a class="d-item d-item-all" data-code="', _eqstring = $NODETPL.escapeHtml($DATA._currentCode), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[$DATA._currentCode][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a>\n      </p>\n  ") : -1 !== $DATA.data.category.district.indexOf($DATA._currentCode) ? $DATA.options.all$$ && (_ += '\n      <p class="data-all">\n        <a class="d-item d-item-all" data-code="', _eqstring = $NODETPL.escapeHtml($DATA._currentCode), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[$DATA._currentCode][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a>\n      </p>\n  ") : (_ += '\n    <p class="data-all">\n      <a class="d-item d-item-all" data-code="', _eqstring = $NODETPL.escapeHtml($DATA._currentCode), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[$DATA._currentCode][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a>\n    </p>\n  "), _ += '\n  <div class="data-list">\n    <ul class="clearfix">\n      ', $DATA.data.relations[$DATA._currentCode].forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language].length <= 6 ? $DATA.data.list[item][$DATA.language] : $DATA.data.list[item][$DATA.language].substr(0, 6) + "..."), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      "
                                            }), _ += "\n    </ul>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this),
                                    "view-hwgat": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-hwgat">\n  <p class="data-title">港澳台地区</p>\n  <div class="data-list">\n    <ul class="clearfix">\n      ', $DATA.data.category.gangaotai.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      "
                                            }), _ += '\n    </ul>\n  </div>\n  <p class="data-title">热门国家</p>\n  <div class="data-list">\n    <ul class="clearfix">\n      ', $DATA.data.category.hotcountries.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      "
                                            }), _ += '\n    </ul>\n  </div>\n  <p class="data-title">全部大洲</p>\n  <div class="data-list">\n    <ul class="clearfix">\n      ', $DATA.data.category.continents.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n      "
                                            }), _ += "\n    </ul>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "_initScripts",
                            "value": function() {
                                var $NODETPL = this;
                                return this.scripts = {
                                    "main": function(guid, duid) {
                                        var ROOT = document.getElementById(guid),
                                            $TPLS = (document.getElementById(guid + duid), $NODETPL.tpls),
                                            $DATA = $NODETPL.datas[duid],
                                            $ROOT = $(ROOT),
                                            DataClass = {},
                                            ViewClass = {};
                                        DataClass.getCode = function() {
                                            return $DATA.codes
                                        }, DataClass.getChildren = function(code) {
                                            var temp = [];
                                            return function loop(code) {
                                                var hwgat = [];
                                                code in $DATA.data.relations ? (temp = temp.concat($DATA.data.relations[code]), $DATA.data.relations[code].forEach(function(_code) {
                                                    loop(_code)
                                                })) : "hwgat" === code && (hwgat = $DATA.data.category["gangaotai"].concat($DATA.data.category["continents"]), temp = temp.concat(hwgat), hwgat.forEach(function(_code) {
                                                    loop(_code)
                                                }))
                                            }(code), temp
                                        }, DataClass.getParent = function(code) {
                                            var parentCode = "";
                                            return Object.keys($DATA.data.relations).forEach(function(key) {
                                                if(-1 !== $DATA.data.relations[key].indexOf(code)) return parentCode = key, !1
                                            }), parentCode
                                        }, DataClass.toggleData = function(code) {
                                            var temp, that = this;
                                            return "000" !== code ? (temp = that.getChildren(code), $DATA.codes = $DATA.codes.filter(function(_code) {
                                                return -1 === temp.indexOf(_code)
                                            }), -1 === $DATA.codes.indexOf(code) ? $DATA.codes.push(code) : ($DATA.codes = $DATA.codes.filter(function(_code) {
                                                return code !== _code
                                            }), function loop(code) {
                                                var find = !1,
                                                    parentCode = that.getParent(code);
                                                parentCode && (that.getChildren(parentCode).forEach(function(_code) {
                                                    if(-1 !== $DATA.codes.indexOf(_code)) return find = !0, !1
                                                }), find || ($DATA.codes = $DATA.codes.filter(function(_code) {
                                                    return parentCode !== _code
                                                }), loop(parentCode)))
                                            }(code))) : -1 !== $DATA.codes.indexOf(code) ? $DATA.codes = [] : ($DATA.codes = [], $DATA.codes.push(code)), ViewClass.showResult().refresh(), that
                                        }, DataClass.toggleSingleData = function(code) {
                                            var temp, that = this,
                                                exists = !1,
                                                districts = $DATA.data.category.district,
                                                parentCode = that.getParent(code);
                                            return -1 !== $DATA.codes.indexOf(code) && (exists = !0), -1 !== districts.indexOf(code) && (parentCode = code), -1 !== districts.indexOf(parentCode) ? (temp = that.getChildren(parentCode), $DATA.codes = $DATA.codes.filter(function(_code) {
                                                return -1 === temp.indexOf(_code)
                                            }), exists || $DATA.codes.push(code), ViewClass.showResult().refresh()) : this.toggleData(code), that
                                        }, DataClass.singleData = function(code) {
                                            return $DATA.codes = [], this.toggleData(code), this
                                        }, ViewClass.showResult = function() {
                                            var html = [],
                                                codelist = DataClass.getCode(),
                                                domResult = $ROOT.find(".data-result");
                                            return $DATA.options.max > 0 ? html.push("<em>" + (1 === $DATA.language ? "Max <strong>" + $DATA.options.max + "</strong>" : "最多选择 <strong>" + $DATA.options.max + "</strong> 项") + "</em>") : html.push("<em>请选择</em>"), codelist.length > 0 && codelist.forEach(function(r) {
                                                var text = $DATA.data.list[r][$DATA.language],
                                                    parentCode = DataClass.getParent(r); - 1 !== $DATA.data.category.district.indexOf(parentCode) && (text = $DATA.data.list[parentCode][$DATA.language] + " - " + text), html.push('<span data-code="' + r + '">' + text + "</span>")
                                            }), domResult.html(html.join("")), this
                                        }, ViewClass.showTab = function(code) {
                                            var tab, tabs = $ROOT.find(".data-tabs ul"),
                                                container = $ROOT.find(".data-container");
                                            return code = code || "", $DATA._currentCode = code, code ? ("hwgat" === code || code in $DATA.data.relations) && (tab = tabs.find('li[data-code="' + code + '"]'), 0 === tab.length && (tab = $('<li data-code="' + code + '"><a href="javascript:;"><span>' + $DATA.data.list[code][$DATA.language] + "</span><em></em></a></li>").appendTo(tabs)), tab.addClass("active").nextAll("li").remove(), tab.siblings("li.active").removeClass("active"), "hwgat" === code ? container.html($TPLS["view-hwgat"]($DATA, guid)) : container.html($TPLS["view-sub"]($DATA, guid)), ViewClass.refresh()) : (tabs.find('li[data-selector="tab-all"]').addClass("active").siblings("li").remove(), container.html($TPLS["view-all"]($DATA, guid)), ViewClass.refresh()), this
                                        }, ViewClass.refresh = function() {
                                            var codelist = DataClass.getCode(),
                                                items = $ROOT.find(".data-container a.d-item"),
                                                allItems = items.filter(".d-item-all").add(items.filter('[data-code="000"]')),
                                                dataItems = items.not(".d-item-all").not('[data-code="000"]');
                                            return items.each(function() {
                                                var subcount = 0,
                                                    code = $(this).attr("data-code"),
                                                    label = $(this).find("label"); - 1 !== codelist.indexOf(code) ? $(this).removeClass("d-item-multies").addClass("d-item-active") : (subcount = DataClass.getChildren(code).filter(function(_code) {
                                                    return -1 !== codelist.indexOf(_code)
                                                }).length, subcount > 0 ? $(this).addClass("d-item-multies") : $(this).removeClass("d-item-multies"), label.text(subcount), $(this).removeClass("d-item-active"))
                                            }), allItems.length > 0 && (allItems.hasClass("d-item-active") ? dataItems.removeClass("d-item-active d-item-multies").addClass("d-item-disabled") : dataItems.removeClass("d-item-disabled")), this
                                        };
                                        var keyWordsField = $ROOT.find('.data-filter input[data-selector="data-keywords"]'),
                                            keywordsList = keyWordsField.siblings("ul");
                                        keyWordsField.on("keyup", function() {
                                            var regExp, words = $(this).val().toUpperCase(),
                                                list = $DATA.data.list,
                                                result = [],
                                                lastWords = $(this).attr("data-words"),
                                                codelist = DataClass.getCode(),
                                                errMsg = $ROOT.find(".data-error").hide(),
                                                districts = [];
                                            lastWords !== words && ($(this).attr("data-words", words), "" !== words ? (regExp = new RegExp("^" + words.split("").join(".*"), "ig"), !1 === $DATA.options.district && $DATA.data.category.district.forEach(function(d) {
                                                districts = districts.concat($DATA.data.relations[d])
                                            }), Object.keys(list).forEach(function(code) {
                                                var item = list[code];
                                                if(regExp.test(item[0]) || regExp.test(item[1]) || regExp.test(item[2])) {
                                                    if(!$DATA.options.all && "000" === code) return;
                                                    if(!$DATA.options.foreign && -1 !== $DATA.data.category.gangaotai.indexOf(code)) return;
                                                    if(!$DATA.options.sar && -1 !== $DATA.data.category.hotcountries.indexOf(code)) return;
                                                    if(!1 === $DATA.options.district && -1 !== districts.indexOf(code)) return;
                                                    if($DATA.data.category.provinces[code]) return;
                                                    if(-1 !== codelist.indexOf(code)) return;
                                                    if($DATA.options.max > 1 && codelist.length >= $DATA.options.max) return 0 === errMsg.length && (errMsg = $("<div />").addClass("data-error").appendTo($ROOT)), errMsg.html("最多只能选择 " + $DATA.options.max + " 项").slideDown(), void(result = []);
                                                    if(!0 === $DATA.options.district && -1 !== $DATA.data.category.district.indexOf(code)) return void $DATA.data.relations[code].forEach(function(_code) {
                                                        result.push([_code, $DATA.data.list[_code]])
                                                    });
                                                    result.push([code, item])
                                                }
                                            }), result.length > 0 ? (result.sort(function(a, b) {
                                                var a1 = a[1][1].toUpperCase(),
                                                    a2 = a[1][2].toUpperCase(),
                                                    b1 = b[1][1].toUpperCase(),
                                                    b2 = b[1][2].toUpperCase(),
                                                    weight = 0;
                                                return a2 !== words && a1 !== words || (weight += 1e4), b2 !== words && b1 !== words || (weight -= 1e4), regExp.test(a2) && (weight += 1e3), regExp.test(b2) && (weight -= 1e3), 0 === a2.indexOf(words) && (weight += 100), 0 === b2.indexOf(words) && (weight -= 100), regExp.test(a1) && (weight += 10), regExp.test(b1) && (weight -= 10), -weight
                                            }), result = result.slice(0, 10), keywordsList.empty().show(), result.forEach(function(item) {
                                                var prt = DataClass.getParent(item[0]) || item[0];
                                                $('<li data-code="' + item[0] + '"><a href="javascript:;">' + $DATA.data.list[prt][$DATA.language] + " - " + item[1][$DATA.language] + "<sup>" + item[1][2] + "</sup></a></li>").appendTo(keywordsList)
                                            }), keywordsList.find("li:first").addClass("active")) : keywordsList.empty().hide()) : keywordsList.hide())
                                        }).on("keydown", function(event) {
                                            var keys = [9, 13, 27, 38, 40],
                                                focus = keywordsList.find("li.active");
                                            switch(event.keyCode) {
                                                case 9:
                                                    break;
                                                case 13:
                                                    keywordsList.is(":hidden") && keywordsList.find("li").length > 0 ? keywordsList.show() : focus.trigger("click");
                                                    break;
                                                case 27:
                                                    keywordsList.hide();
                                                    break;
                                                case 38:
                                                    var nextLi = focus.prev("li");
                                                    0 === nextLi.length && (nextLi = keywordsList.find("li:last")), nextLi.addClass("active").siblings("li.active").removeClass("active");
                                                    break;
                                                case 40:
                                                    var nextLi = focus.next("li");
                                                    0 === nextLi.length && (nextLi = keywordsList.find("li:first")), nextLi.addClass("active").siblings("li.active").removeClass("active")
                                            } - 1 !== keys.indexOf(event.keyCode) && (event.preventDefault(), event.stopPropagation())
                                        }), $ROOT.on("click", function() {
                                            keywordsList.is(":visible") && keywordsList.hide()
                                        }), keywordsList.on("click", "li", function() {
                                            var code = $(this).attr("data-code");
                                            1 === $DATA.options.max ? (DataClass.singleData(code), ViewClass.showTab()) : $DATA.options.district && "radio" === $DATA.options.districtType ? DataClass.toggleSingleData(code) : DataClass.toggleData(code), keyWordsField.val("")
                                        }), $ROOT.find(".data-result").delegate("span", "click", function() {
                                            var code = $(this).attr("data-code");
                                            $ROOT.find(".data-error").hide(), DataClass.toggleData(code)
                                        }), $ROOT.find(".data-tabs ul").delegate("li", "click", function() {
                                            var code = $(this).attr("data-code");
                                            !$(this).hasClass("active") && ViewClass.showTab(code)
                                        }), $ROOT.find(".data-container").delegate("a.d-item", "click", function() {
                                            var code = $(this).attr("data-code"),
                                                codelist = DataClass.getCode(),
                                                errMsg = $ROOT.find(".data-error").hide();
                                            return !$(this).hasClass("d-item-disabled") && ("000" !== code && $DATA.options.max > 1 && codelist.length >= $DATA.options.max && -1 === codelist.indexOf(code) && !$(this).hasClass("d-item-multies") ? (0 === errMsg.length && (errMsg = $("<div />").addClass("data-error").appendTo($ROOT)), errMsg.html("最多只能选择 " + $DATA.options.max + " 项").slideDown(), !1) : void("000" === code || $(this).hasClass("d-item-all") || !(code in $DATA.data.relations) && "hwgat" !== code || !1 === $DATA.options.district && -1 !== $DATA.data.category.district.indexOf(code) ? 1 === $DATA.options.max ? (DataClass.singleData(code), ViewClass.showTab()) : $DATA.options.district && "radio" === $DATA.options.districtType ? DataClass.toggleSingleData(code) : DataClass.toggleData(code) : ViewClass.showTab(code)))
                                        }), ViewClass.showResult().showTab(), $ROOT.width(700)
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "duid",
                            "value": function() {
                                return "nodetpl_d_" + this._generate()
                            }
                        }, {
                            "key": "guid",
                            "value": function() {
                                return "nodetpl_g_" + this._generate()
                            }
                        }, {
                            "key": "escapeHtml",
                            "value": function(html) {
                                return html ? html.toString().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;") : html
                            }
                        }, {
                            "key": "render",
                            "value": function(data, guid) {
                                return this.tpls.main(data, guid || this.guid())
                            }
                        }]), CoreClass
                    }();
                module.exports = {
                    "render": function(data) {
                        return(new CoreClass).render(data)
                    }
                }
            }).call(exports, __webpack_require__("DuR2"))
        },
        "CXyO": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.industry_job = {
                "industry": [
                    [
                        ["", "互联网·游戏·软件", "Internet · Online Games · Software"],
                        [
                            ["040", "互联网/移动互联网/电子商务", "Internet/Mobile Internet/E-Business"],
                            ["420", "网络游戏", "Online Game"],
                            ["010", "计算机软件", "Computer Software"],
                            ["030", "IT服务/系统集成", "IT Services/Systems Integration"]
                        ]
                    ],
                    [
                        ["", "电子·通信·硬件", "Electronics · Telecommunication · Hardware"],
                        [
                            ["050", "电子技术/半导体/集成电路", "Electronics/Microelectronics"],
                            ["060", "通信(设备/运营/增值)", "Communications (Equipment/Sales/Value-Added)"],
                            ["020", "计算机硬件/网络设备", "Computer Hardware/Network Equipment"]
                        ]
                    ],
                    [
                        ["", "房地产·建筑·物业", "Real estate·Construction · Property management"],
                        [
                            ["080", "房地产开发/建筑/建材/工程", "Real Estate Development/Architectural Services/Building Materials/Construction"],
                            ["100", "规划/设计/装潢", "Construction Planning/Interior Design/Decoration"],
                            ["090", "房地产服务(物业管理/地产经纪)", "Real Estate Services"]
                        ]
                    ],
                    [
                        ["", "金融", "Finance"],
                        [
                            ["130", "银行", "Banking"],
                            ["140", "保险", "Insurance"],
                            ["150", "基金/证券/期货/投资", "Securities/Futures/Investment Funds"],
                            ["430", "会计/审计", "Accounting/Auditing"],
                            ["500", "信托/担保/拍卖/典当", "Trust/Guarantee/Auction/Pawn Business"]
                        ]
                    ],
                    [
                        ["", "消费品", "Consumer Goods"],
                        [
                            ["190", "食品/饮料/烟酒/日化", "Food/Drink/Wine/Commodity"],
                            ["240", "百货/批发/零售", "General Merchandise/Wholesale/Retail"],
                            ["200", "服装服饰/纺织/皮革", "Clothing/Textiles/Furniture"],
                            ["210", "家具/家电", "Furniture/Home Appliances"],
                            ["220", "办公用品及设备", "Office Equipment/Supplies"],
                            ["460", "奢侈品/收藏品", "Luxury/Collection"],
                            ["470", "工艺品/珠宝/玩具", "Arts & Craft/Toys/Jewelry"]
                        ]
                    ],
                    [
                        ["", "汽车·机械·制造", "Automobiles · Machinery · Manufacturing"],
                        [
                            ["350", "汽车/摩托车", "Automobiles/Motorcycles"],
                            ["360", "机械制造/机电/重工", "Machine Manufacturing/Heavy Electrical"],
                            ["180", "印刷/包装/造纸", "Printing/Packaging/Papermaking"],
                            ["370", "原材料及加工", "Raw Materials Processing"],
                            ["340", "仪器/仪表/工业自动化/电气", "Instrumentation/Industrial Automation/Electrical"]
                        ]
                    ],
                    [
                        ["", "服务·外包·中介", "Service · Outsourcing · Agency"],
                        [
                            ["120", "专业服务(咨询/财会/法律/翻译等)", "Professional Services (Consult/Accounting/Legal/Translate)"],
                            ["110", "中介服务", "Intermediate Services"],
                            ["440", "外包服务", "Outsourcing Services"],
                            ["450", "检测/认证", "Testing/Certification"],
                            ["230", "旅游/酒店/餐饮服务/生活服务", "Tourism/Hospitality/Restaurant & Food Services/Personal Care & Services"],
                            ["260", "娱乐/休闲/体育", "Entertainment/Leisure/Sports & Fitness"],
                            ["510", "租赁服务", "Leasing Service"]
                        ]
                    ],
                    [
                        ["", "广告·传媒·教育·文化", "Advertising · Media · Education · Culture"],
                        [
                            ["070", "广告/公关/市场推广/会展", "Advertising/Public Relations/Marketing/Exhibitions"],
                            ["170", "影视/媒体/艺术/文化/出版", "Film & Television/Media/Arts/Communication"],
                            ["380", "教育/培训/学术/科研/院校", "Education/Training/Science/Research/Universities and Colleges"]
                        ]
                    ],
                    [
                        ["", "交通·贸易·物流", "Transportation · Trade · Logistics"],
                        [
                            ["250", "交通/物流/运输", "Transportation/Shipping/Logistics"],
                            ["160", "贸易/进出口", "Trade/Import-Export"],
                            ["480", "航空/航天", "Aerospace/Aviation/Airlines"]
                        ]
                    ],
                    [
                        ["", "制药·医疗", "Pharmaceutical · Healthcare"],
                        [
                            ["270", "制药/生物工程", "Pharmaceuticals/Biotechnology"],
                            ["280", "医疗/保健/美容/卫生服务", "Medical/Health and Beauty Services"],
                            ["290", "医疗设备/器械", "Medical Equipment/Devices"]
                        ]
                    ],
                    [
                        ["", "能源·化工·环保", "Energy · Chemical · Environmental Protection"],
                        [
                            ["330", "能源(电力/水利)", "Energy (Electricity/Water Conservation)"],
                            ["310", "石油/石化/化工", "Rock oil/Chemical Industry"],
                            ["320", "采掘/冶炼/矿产", "Mining/Metallurgy"],
                            ["300", "环保", "Environmental Protection"],
                            ["490", "新能源", "New Energy"]
                        ]
                    ],
                    [
                        ["", "政府·农林牧渔", "Government · Agriculture"],
                        [
                            ["390", "政府/公共事业/非营利机构", "Government/public service/Non-Profit"],
                            ["410", "农/林/牧/渔", "Farming/Forestry/Animal Husbandry and Fishery"],
                            ["400", "其他", "Other"]
                        ]
                    ]
                ],
                "job": [
                    [
                        ["", "互联网·游戏·软件", "Internet · Online Games · Software"],
                        [
                            [
                                ["040", "互联网/移动互联网/电子商务", "Internet/Mobile Internet/E-Business"],
                                [
                                    ["100100", "高级软件工程师", "Senior Software Engineer"],
                                    ["100090", "软件工程师", "Software Engineer"],
                                    ["360321", "架构师", "Architect"],
                                    ["100080", "系统分析师", "System Analyst"],
                                    ["350040", "需求分析师", "Demand Analyst"],
                                    ["360310", "移动开发工程师", "Mobile Development Engineer"],
                                    ["360333", "数据库开发工程师", "Database Developer"],
                                    ["350030", "ERP技术开发", "ERP R&D"],
                                    ["100290", "多媒体/游戏开发工程师", "Multimedia/Game Development Engineer"],
                                    ["100280", "语音/视频/图形开发工程师", "Audio/Video/Graphics Development Engineer"],
                                    ["110070", "嵌入式软件开发", "Embedded Software Engineer"],
                                    ["360334", "算法工程师", "Algorithm Engineer"],
                                    ["100140", "系统集成工程师", "Systems Integration Engineer"],
                                    ["360300", "WEB前端开发工程师", "WEB Front-end Developer"],
                                    ["360335", "移动前端开发工程师", "Mobile Front-end Developer"],
                                    ["360320", "BI工程师", "Business Intelligence Engineer"],
                                    ["360332", "数据分析师", "Data Analyst"],
                                    ["360336", "数据挖掘工程师", "Data Mining Engineer"],
                                    ["100350", "计算机辅助设计工程师", "Computer Aided Design Engineer"],
                                    ["350020", "仿真应用工程师", "Simulation Application Engineer"],
                                    ["360040", "产品总监", "Product Director"],
                                    ["100071", "产品经理/主管", "Product Manager/Supervisor"],
                                    ["360050", "产品专员/助理", "Product Specialist/Assistant"],
                                    ["360180", "游戏策划师", "Game Planner"],
                                    ["360270", "用户研究总监/经理", "User Research Director/Manager"],
                                    ["360280", "用户研究员", "User Researcher"],
                                    ["360010", "运营总监", "Operations Director"],
                                    ["360020", "运营经理/主管", "Operations Manager/Supervisor"],
                                    ["360030", "运营专员", "Operations Specialist"],
                                    ["100300", "网站营运管理", "Web Operations Management"],
                                    ["100320", "网站策划", "Site Planning"],
                                    ["100310", "网站编辑", "Website Editor"],
                                    ["360070", "网络推广总监", "Online Marketing Director"],
                                    ["360080", "网络推广经理/主管", "Online Marketing Manager/Supervisor"],
                                    ["360090", "网络推广专员", "Online Marketing Specialist"],
                                    ["360060", "SEO搜索引擎优化", "SEO"],
                                    ["060210", "SEM搜索引擎营销", "SEM"],
                                    ["360100", "电子商务总监", "E-Commerce Director"],
                                    ["360110", "电子商务经理/主管", "E-Commerce Manager/Supervisor"],
                                    ["360120", "电子商务专员", "E-Commerce Specialist"],
                                    ["100340", "网页设计/制作/美工", "Web Designer/Production/Creative"],
                                    ["360290", "视觉设计总监/经理", "Visual Design Director/Manager"],
                                    ["360220", "视觉设计师", "Visual Effects Designer"],
                                    ["350010", "UI设计师", "UI Designer"],
                                    ["360260", "交互设计总监/经理", "Interaction Design Director/Manager"],
                                    ["360150", "UE交互设计师", "UE Interaction Designer"],
                                    ["360240", "三维/3D设计/制作", "Three-dimensional/3D Design/Production"],
                                    ["360190", "游戏界面设计师", "Game UI Designer"],
                                    ["360200", "Flash设计/开发", "Flash Designer/Developer"],
                                    ["360210", "特效设计师", "Special Effects Designer"],
                                    ["360230", "音效设计师", "Sound Effects Designer"],
                                    ["360322", "测试经理/主管", "Testing Manager/Supervisor"],
                                    ["360323", "测试工程师", "Testing Engineer"],
                                    ["360327", "测试开发", "Test Development Engineer"],
                                    ["360324", "自动化测试", "Automation Testing Engineer"],
                                    ["360325", "功能测试", "Functional Testing Engineer"],
                                    ["360326", "性能测试", "Performance Testing Engineer"],
                                    ["360340", "软件测试", "Software Testing"],
                                    ["100250", "硬件测试", "Hardware Testing"],
                                    ["100235", "计量/标准化工程师", "Measure/Standardization Engineer"],
                                    ["360338", "配置管理经理/主管", "Configuration Management Manager/Supervisor"],
                                    ["360337", "配置管理工程师", "Configuration Management Engineer"],
                                    ["010030", "首席技术官CTO/首席信息官CIO", "Chief Technology Officer/Chief Information Officer"],
                                    ["100020", "技术/研发总监", "Technology Director"],
                                    ["360339", "技术/研发经理", "Technology Manager"],
                                    ["100170", "工程与项目实施", "Engineering and Project Implementation"],
                                    ["100370", "项目总监", "Project Director"],
                                    ["100060", "项目经理/主管", "Project Manager/Supervisor"],
                                    ["100070", "项目执行/协调人员", "Project Specialist/Coordinator"],
                                    ["360329", "运维总监", "OPS Director"],
                                    ["630020", "运维经理/主管", "OPS Manager/Supervisor"],
                                    ["360160", "运维工程师", "Maintenance Engineer"],
                                    ["360330", "运维开发", "OPS Developer"],
                                    ["100030", "信息技术经理/主管", "IT Manager/Supervisor"],
                                    ["100040", "信息技术专员", "Information Technology Specialist"],
                                    ["360331", "系统工程师", "System Engineer"],
                                    ["100330", "网络工程师", "Network Engineer"],
                                    ["100190", "数据库管理员(DBA)", "Database Administrator"],
                                    ["360328", "IT支持", "IT Surpport"],
                                    ["390001", "硬件维护工程师", "Hardware maintenance engineer"],
                                    ["100230", "网络信息安全工程师", "Network and Information Security Engineer"],
                                    ["100180", "ERP实施顾问", "ERP Implementation"],
                                    ["100260", "文档工程师", "Documentation Engineer"],
                                    ["010010", "首席执行官CEO/总裁/总经理", "CEO/President/General Manager"],
                                    ["010020", "首席运营官COO", "Chief Operating Officer/COO"],
                                    ["010060", "合伙人", "Partner"],
                                    ["010050", "副总裁/副总经理", "Vice President/Deputy General Manager"],
                                    ["010102", "分公司/代表处负责人", "Head of Branch Company"],
                                    ["010070", "部门/事业部管理", "Department Management"],
                                    ["010101", "投资者关系", "Investor Relations"],
                                    ["010080", "总裁助理/总经理助理", "Executive Assistant/General Manager Assistant"],
                                    ["010103", "企业秘书/董事会秘书", "Corporate/Board Secretary"],
                                    ["010121", "首席人力资源官CHO/HRVP", "Chief Human Resource Officer/Vice President"],
                                    ["070010", "人力资源总监", "Director of Human Resources"],
                                    ["070020", "人力资源经理/主管", "Human Resources Manager/Supervisor"],
                                    ["070040", "人力资源专员/助理", "HR Specialist/Assistant"],
                                    ["070050", "招聘经理/主管", "Recruiting Manager/Supervisor"],
                                    ["070051", "招聘专员/助理", "Recruiting Specialist/Assistant"],
                                    ["070070", "培训经理/主管", "Training Manager/Supervisor"],
                                    ["070080", "培训专员/助理", "Training Specialist/Assistant"],
                                    ["070161", "企业培训师/讲师", "Staff Trainer"],
                                    ["070100", "薪资福利经理/主管", "Compensation and Benefits Manager/Director"],
                                    ["070101", "薪资福利专员/助理", "Compensation & Benefits Specialist/Assistant"],
                                    ["070120", "绩效经理/主管", "Performance Assessment Manager/Supervisor"],
                                    ["070121", "绩效专员/助理", "Performance Assessment Specialist/Assistant"],
                                    ["070140", "员工关系/企业文化/工会", "Employee Relations/Corporate Culture/Unions"],
                                    ["070143", "组织发展(OD)", "Organization Development"],
                                    ["070141", "人力资源信息系统", "HRIS"],
                                    ["070142", "人力资源伙伴(HRBP)", "HR Business Partner"],
                                    ["070162", "猎头顾问/助理", "Headhunter/Assistant"],
                                    ["010040", "首席财务官CFO", "Chief Financial Officer/CFO"],
                                    ["090020", "财务总监", "Chief Financial Officer"],
                                    ["090030", "财务经理", "Financial Manager"],
                                    ["090040", "财务主管/总帐主管", "Financial Director/General Accounts Director"],
                                    ["090200", "财务顾问", "Finance Consultant"],
                                    ["090140", "财务助理", "Finance Assistant"],
                                    ["090050", "会计经理/主管", "Accounting Manager/Supervisor"],
                                    ["090060", "会计/会计师", "Accountant"],
                                    ["090201", "会计助理/文员", "Accounting Clerk"],
                                    ["090202", "出纳员", "Cashier"],
                                    ["090120", "审计经理/主管", "Audit Manager/Supervisor"],
                                    ["090130", "审计专员/助理", "Audit Executive/Assistant"],
                                    ["090160", "税务经理/主管", "Tax Manager/Supervisor"],
                                    ["090170", "税务专员/助理", "Tax Executive/Assistant"],
                                    ["090080", "财务分析经理/主管", "Financial Analysis Manager/Supervisor"],
                                    ["090090", "财务分析员", "Financial Analyst"],
                                    ["090100", "成本经理/主管", "Cost Accounting Manager/Supervisor"],
                                    ["090110", "成本管理员", "Capital Manager"],
                                    ["090180", "投融资经理/主管", "Investment and Finance Manager/Supervisor"],
                                    ["090203", "资产/资金管理", "Treasury Manager/Supervisor"],
                                    ["090150", "统计员", "Statistician"],
                                    ["060010", "市场总监", "Marketing Director"],
                                    ["060020", "市场经理/主管", "Marketing Manager/Supervisor"],
                                    ["060200", "市场专员/助理", "Marketing Specialist/Assistant"],
                                    ["060130", "市场企划经理/主管", "Marketing Planning Manager/Supervisor"],
                                    ["060207", "市场企划专员/助理", "Marketing Planning Specialist/Assistant"],
                                    ["060201", "市场拓展经理/主管", "BD manager/Supervisor"],
                                    ["060202", "市场拓展专员/助理", "BD Specialist/Assistant"],
                                    ["060205", "市场通路经理/主管", "Trade Marketing Manager/Supervisor"],
                                    ["060206", "市场通路专员/助理", "Trade Marketing Specialist/Assistant"],
                                    ["060090", "产品经理/主管", "Product Manager/Supervisor"],
                                    ["060204", "产品专员/助理", "Product Specialist/Assistant"],
                                    ["060203", "品牌经理/主管", "Brand Manager/Supervisor"],
                                    ["060209", "品牌专员/助理", "Brand Specialist/Assistant"],
                                    ["060110", "促销经理/主管", "Promotion Manager/ Supervisor"],
                                    ["460005", "活动策划", "Event Planner"],
                                    ["460006", "活动执行", "Event Excution"],
                                    ["060060", "市场调研与分析", "Market Research and Analysis"],
                                    ["060208", "选址拓展/新店开发", "Site Development"],
                                    ["460001", "公关总监", "Public Relations Director"],
                                    ["060040", "公关经理/主管", "Public Relations Manager/Supervisor"],
                                    ["460002", "公关专员/助理", "Public Relations Specialist/Assistant"],
                                    ["290100", "政府事务管理", "Government Affairs"],
                                    ["460003", "媒介经理/主管", "Media Manager/Supervisor"],
                                    ["460004", "媒介专员/助理", "Media Specialist/Assistant"],
                                    ["460009", "媒介策划", "Media Planning"],
                                    ["460007", "媒介销售", "Media Sales"],
                                    ["020125", "销售总经理/销售副总裁", "Sales General Manager/Vice President"],
                                    ["020010", "销售总监", "Sales Director"],
                                    ["020020", "销售经理/主管", "Sales Manager/Supervisor"],
                                    ["020005", "区域销售总监", "Regional Sales Director"],
                                    ["020025", "区域销售经理/主管", "Regional Sales Manager/Supervisor"],
                                    ["020040", "渠道/分销总监", "Channel/Distribution Director"],
                                    ["020050", "渠道/分销经理/主管", "Channel/Distribution Manager/Supervisor"],
                                    ["020127", "客户总监", "Account Director"],
                                    ["020122", "客户经理/主管", "Sales Account Manager/Supervisor"],
                                    ["020121", "大客户销售管理", "Key Account Sales Management"],
                                    ["020120", "业务拓展经理/主管", "Business Development Supervisor/Manager"],
                                    ["020126", "团购经理/主管", "Team Buying Manager/Supervisor"],
                                    ["370001", "销售代表", "Sales Representative"],
                                    ["370012", "区域销售专员/助理", "Regional Sales Specialist/Assistant"],
                                    ["370002", "渠道/分销专员", "Channel/Distribution Representative"],
                                    ["370003", "客户代表", "Sales Account Representative"],
                                    ["370007", "大客户销售", "Key Account Sales"],
                                    ["370013", "业务拓展专员/助理", "BD Specialist/Assistant"],
                                    ["370005", "电话销售", "Telesales"],
                                    ["370004", "销售工程师", "Sales Engineer"],
                                    ["370008", "医药销售代表", "Pharmaceutical Sales Representative"],
                                    ["370010", "团购业务员", "Team Buying Sales"],
                                    ["370011", "网络/在线销售", "Online Sales"],
                                    ["370006", "经销商", "Distributor"],
                                    ["380001", "销售行政经理/主管", "Sales Admin. Manager/Supervisor"],
                                    ["380002", "销售行政专员/助理", "Sales Admin. Executive/Assistant"],
                                    ["380004", "销售运营经理/主管", "Sales Operations Manager/Supervisor"],
                                    ["380005", "销售运营专员/助理", "Sales Operations Executive/Assistant"],
                                    ["380008", "业务分析经理/主管", "Business Analysis Manager/Supervisor"],
                                    ["380009", "业务分析专员/助理", "Business Analysis Specialist/Assistant"],
                                    ["020100", "商务经理/主管", "Business Manager/Supervisor"],
                                    ["380003", "商务专员/助理", "Business Executive/Assistant"],
                                    ["380007", "销售培训讲师", "Sales trainer"],
                                    ["030010", "客户服务总监", "Director of Customer Service"],
                                    ["030085", "客户服务经理/主管", "Customer Service Manager/Specialist"],
                                    ["030081", "客户服务专员/助理", "Customer Service Specialist/Assistant"],
                                    ["030082", "咨询热线/呼叫中心人员", "Hotline/Call Center Staff"],
                                    ["030083", "投诉处理专员", "Complaint Coordinator"],
                                    ["030084", "会员/VIP管理", "VIP Member Management"],
                                    ["360130", "网店店长/客服管理", "Online Shop Manager/Customer Service Management"],
                                    ["030086", "网络/在线客服", "Online Customer Service"],
                                    ["020070", "售前支持经理/主管", "Pre-Sales Support Manager/Supervisor"],
                                    ["020080", "售前支持工程师", "Pre-Sales Support Engineer"],
                                    ["030060", "售后支持经理/主管", "After-Sales Support Manager/Supervisor"],
                                    ["030070", "售后支持工程师", "Sales Support Engineer"],
                                    ["270010", "律师", "Lawyer"],
                                    ["270060", "律师助理", "Paralegal"],
                                    ["270040", "法务经理/主管", "Legal manager/Supervisor"],
                                    ["270041", "法务专员/助理", "Lega Specialist/Assistant"],
                                    ["270020", "法律顾问", "Legal Adviser"],
                                    ["270043", "合规经理", "Compliance Manager"],
                                    ["270044", "合规主管/专员", "Compliance Supervisor/Specialist"],
                                    ["270042", "知识产权/专利/商标代理人", " Intellectual Property/Patent Advisor"],
                                    ["080010", "行政总监", "Executive Director"],
                                    ["080020", "行政经理/主管/办公室主任", "Administration Manager/Supervisor"],
                                    ["080021", "行政专员/助理", "Administration Specialist/Assistant"],
                                    ["080061", "助理/秘书/文员", "Executive Assistant/Secretary"],
                                    ["080062", "前台/总机/接待", "Receptionist"],
                                    ["080060", "图书/资料/档案管理", "Document Keeper"],
                                    ["080063", "电脑操作/打字/录入员", "Computer Operator/Typist"],
                                    ["080065", "后勤/总务", "Logistics/General Affairs"],
                                    ["040010", "项目总监", "Project Director"],
                                    ["040020", "项目经理/主管", "Project Manager/Supervisor"],
                                    ["040040", "项目专员/助理", "Project Specialist/Assistant"]
                                ]
                            ],
                            [
                                ["420", "网络游戏", "Online Game"],
                                []
                            ],
                            [
                                ["010", "计算机软件", "Computer Software"],
                                []
                            ],
                            [
                                ["030", "IT服务/系统集成", "IT Services/Systems Integration"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "电子·通信·硬件", "Electronics · Telecommunication · Hardware"],
                        [
                            [
                                ["050", "电子技术/半导体/集成电路", "Electronics/Microelectronics"],
                                [
                                    ["110020", "电子/电器工程师", "Electronic/Electrical Equipment Engineer"],
                                    ["110180", "电子技术研发工程师", "Electronics Development Engineer"],
                                    ["110170", "电气工程师", "Electrical Engineer"],
                                    ["110400", "电气线路设计", "Electrical Circuit Design"],
                                    ["110401", "线路结构设计", "Route structure design"],
                                    ["110010", "电路工程师/技术员", "Electronic Circuit Engineer"],
                                    ["110040", "工艺/制程工程师(PE)", "PE Engineer"],
                                    ["110404", "模拟电路设计/应用工程师", "Analogical Electronic Design / Application Engineer"],
                                    ["110130", "集成电路IC设计/应用工程师", "IC Design/Application Engineer"],
                                    ["110330", "版图设计工程师", "Engineer Layout Design Engineer"],
                                    ["110380", "IC验证工程师", "IC Verification Engineer"],
                                    ["110403", "自动化工程师", "Automation Engineer"],
                                    ["110350", "自动控制工程师/技术员", "Autocontrol Engineer/Technician"],
                                    ["110060", "家用电器/数码产品研发", "Household Electronics/Digital Products Development"],
                                    ["110405", "空调工程/设计", "Air Conditioning Engineering/Design"],
                                    ["110050", "电声/音响工程师/技术员", "Electroacoustics Engineer"],
                                    ["110360", "电池/电源开发", "Battery/Power Engineer"],
                                    ["110090", "半导体技术", "Semiconductor Technology"],
                                    ["110100", "电子元器件工程师", "Electronic Component Engineer"],
                                    ["110310", "射频工程师", "RF Engineer"],
                                    ["110320", "变压器与磁电工程师", "Transformer and Magnetoelectricity"],
                                    ["110340", "激光/光电子技术", "Laser/Optoelectronics Technology"],
                                    ["110402", "机电工程师", "Electrical & Mechanical Engineer"],
                                    ["110407", "安防系统工程师", "Security Systems Engineer"],
                                    ["110120", "光源与照明工程师", "Light Source and Lighting Engineer"],
                                    ["110406", "仪器/仪表/计量", "Instrument/Measurement Analyst"],
                                    ["110370", "FAE现场应用工程师", "Field Application Engineer(FAE)"],
                                    ["110110", "电子/电器维修", "Electronics/Electronics Repair"],
                                    ["110190", "工程与项目实施", "Engineering and Project Implementation"],
                                    ["110140", "技术文档工程师", "Technical Documentation Engineer"],
                                    ["210090", "技术或工艺设计经理", "Technology or Process Design Manager"],
                                    ["210170", "工艺/制程工程师(PE)", "PE Engineer"],
                                    ["210180", "工业工程师(IE)", "Industrial Engineer"],
                                    ["210190", "制造工程师", "Manufacturing Engineer"],
                                    ["210080", "产品管理", "Product Management"],
                                    ["210250", "包装工程师", "Packaging Engineer"],
                                    ["210040", "采购管理", "Purchasing Management"],
                                    ["160210", "供应链总监", "Supply Chain Director"],
                                    ["160095", "供应链经理/主管", "Supply Chain Executive/Manager/Director"],
                                    ["160220", "供应链专员/助理", "Supply Chain Specialist/Assistant"],
                                    ["210050", "生产物料管理(PMC)", "Production Material Control(PMC)"],
                                    ["210060", "生产设备管理", "Production Equipment Management"],
                                    ["210130", "维修工程师", "Maintenance Engineer"],
                                    ["210210", "工厂经理/厂长", "Plant/Factory Manager"],
                                    ["210020", "总工程师/副总工程师", "Chief Engineer/Deputy Chief Engineer"],
                                    ["210240", "生产总监", "Production Director"],
                                    ["210140", "生产经理/车间主任", "Production Manager/Workshop Supervisor"],
                                    ["210150", "组长/拉长", "Group Leader"],
                                    ["210260", "生产文员", "Production Clerk"],
                                    ["210220", "生产项目总监", "Production Project Director"],
                                    ["210230", "生产项目经理/主管", "Production Project Manager/Supervisor"],
                                    ["210030", "生产项目工程师", "Production Project Engineer"],
                                    ["210015", "运营经理/主管", "Operations Manager/Supervisor"],
                                    ["210160", "生产计划/调度", "Production Planning/Scheduling"],
                                    ["210270", "维修经理/主管", "Maintenance Manager/Supervisor"],
                                    ["210110", "生产质量管理", "Production Quality Management"],
                                    ["210070", "安全/健康/环境管理", "Safety/Health/Environmental Management"]
                                ]
                            ],
                            [
                                ["060", "通信(设备/运营/增值)", "Communications (Equipment/Sales/Value-Added)"],
                                [
                                    ["110030", "电信/通讯工程师", "Telecommunications/Communications Engineer"],
                                    ["110210", "通信技术工程师", "Communication Engineer"],
                                    ["110240", "数据通信工程师", "Data Communication Engineer"],
                                    ["110250", "移动通信工程师", "Mobile Communication Engineer"],
                                    ["110260", "电信网络工程师", "Telecommunication Network Engineer"],
                                    ["110230", "电信交换工程师", "Telecommunication Exchange Engineer"],
                                    ["110220", "有线传输工程师", "Wired Transmission Engineer"],
                                    ["110080", "无线/射频通信工程师", "RF/ Communication Engineer"],
                                    ["110270", "通信电源工程师", "Communication Power Supply Engineer"],
                                    ["110280", "增值产品开发工程师", "Value-Added Product Development Engineer"],
                                    ["110300", "通信标准化工程师", "Communication Standardization Engineer"],
                                    ["110290", "通信项目管理", "Communication Project Management"]
                                ]
                            ],
                            [
                                ["020", "计算机硬件/网络设备", "Computer Hardware/Network Equipment"],
                                [
                                    ["100130", "高级硬件工程师", "Senior Hardware Engineer"],
                                    ["100150", "硬件工程师", "Hardware Engineer"],
                                    ["110065", "嵌入式硬件开发(主板机…)", "Embedded Hardware Engineer(PCB…)"]
                                ]
                            ]
                        ]
                    ],
                    [
                        ["", "房地产·建筑·物业", "Real estate·Construction · Property management"],
                        [
                            [
                                ["080", "房地产开发/建筑/建材/工程", "Real Estate Development/Architectural Services/Building Materials/Construction"],
                                [
                                    ["170070", "房地产项目策划经理/主管", "Real Estate Planning Manager/Supervisor"],
                                    ["510001", "房地产项目策划专员/助理", "Real Estate Planning Specialist/Assistant"],
                                    ["510003", "房地产项目招投标", "Real Estate Tender /Bidding"],
                                    ["170198", "开发报建经理/主管", "Applying for Construction Manager/Supervisor"],
                                    ["170204", "开发报建专员/助理", "Applying for Construction Specialist/Assistant"],
                                    ["510011", "规划设计总监", "Planning Director"],
                                    ["510019", "规划设计经理/主管", "Planning Manager/Supervisor"],
                                    ["510012", "规划设计师", "Planning Designer"],
                                    ["510002", "配套经理/主管", "Real Estate Supporting Manager/Supervisor"],
                                    ["510010", "配套工程师", "Real Estate Supporting Engineer"],
                                    ["510016", "房地产项目管理", "Real Estate Project Management"],
                                    ["510017", "房地产项目运营", "Real Estate Project Operation"],
                                    ["510014", "成本总监", "Cost Accounting Director"],
                                    ["510015", "成本经理/主管", "Cost Accounting Manager/Supervisor"],
                                    ["510005", "房地产资产管理", "Real Estate Asset Management"],
                                    ["510004", "房地产投资分析", "Real Estate Investment Analysis"],
                                    ["170191", "高级建筑工程师/总工", "Senior Architect"],
                                    ["170010", "建筑工程师", "Architect"],
                                    ["340040", "测绘/测量", "Mapping/Surveyor"],
                                    ["170207", "爆破工程师", "Blast Engineer"],
                                    ["170202", "智能大厦/综合布线/安防/弱电", "Intelligent Building/Integrated Wiring/Defence&Security/Weak Current"],
                                    ["170195", "建筑机电工程师", "Building Electrical Engineer"],
                                    ["170199", "市政工程师", "Municipal Project Engineer"],
                                    ["170210", "土建造价工程师", "Civil Engineering Cost Engineer "],
                                    ["170209", "安装造价工程师", "Installation Cost Engineer"],
                                    ["170170", "公路桥梁预算师", "Road and Bridge Estimator"],
                                    ["170100", "工程预结算管理", "Construction Budget/Cost Management"],
                                    ["170205", "现场/施工管理", "Construction Management"],
                                    ["170180", "施工员", "Construction Worker"],
                                    ["170090", "建筑设备工程师", "Construction Equipment Engineer"],
                                    ["170050", "工程监理", "Project Management"],
                                    ["170040", "建筑工程管理/项目经理", "Construction Management"],
                                    ["170201", "建筑工程安全管理", "Construction Security Management"],
                                    ["170192", "建筑工程验收", "Construction Project Inspector"],
                                    ["170200", "合同管理", "Contract Management"],
                                    ["170203", "资料员", "Data Management Specialist"],
                                    ["170030", "建筑设计师", "Architectural Designer"],
                                    ["170020", "土木/土建工程师", "Civil Engineer"],
                                    ["170211", "结构工程师", "Structural Engineer"],
                                    ["170206", "钢结构工程师", "Steel Structure Engineer"],
                                    ["170193", "岩土工程", "Geotechnical Engineer"],
                                    ["170212", "水利/港口工程技术", "Water Conservancy/Port Engineering Technology"],
                                    ["170110", "道路/桥梁/隧道工程技术", "Road/Bridge/Tunnel Technology"],
                                    ["170197", "建筑制图/模型/渲染", "CAD Drafter/Building Model/Rendering"],
                                    ["170214", "架线和管道工程技术", "Pipeline Engineering Technology"],
                                    ["170194", "楼宇自动化", "Building Automation"],
                                    ["170060", "给排水/制冷暖通", "Drainage / refrigeration HVAC"],
                                    ["170208", "空调工程师", "Air Conditioner Engineer"],
                                    ["170150", "城市规划与设计", "Urban Planning and Design"],
                                    ["170120", "园艺/园林/景观设计", "Gardenning Designer"],
                                    ["170130", "室内装潢设计", "Interior Design"],
                                    ["170213", "软装设计师", "Soft outfit Designer"],
                                    ["170196", "幕墙工程师", "Curtain Wall Engineer"]
                                ]
                            ],
                            [
                                ["100", "规划/设计/装潢", "Construction Planning/Interior Design/Decoration"],
                                []
                            ],
                            [
                                ["090", "房地产服务(物业管理/地产经纪)", "Real Estate Services"],
                                [
                                    ["170160", "房地产交易/中介", "Real Estate Agent/Broker"],
                                    ["510006", "房地产销售经理/主管", "Real Estate Sales Manager/Supervisor"],
                                    ["510007", "房地产销售人员", "Real Estate Sales"],
                                    ["510008", "房地产招商", "Real Estate Investment"],
                                    ["170080", "房地产评估", "Real Estate Appraisal"],
                                    ["170140", "物业管理经理/主管", "Property Management Manager/Supervisor"],
                                    ["520001", "物业管理专员/助理", "Property Management"],
                                    ["520002", "高级物业顾问/物业顾问", "Senior Property Advisor/Property Advisor"],
                                    ["520003", "物业招商/租赁/租售", "Property Lease/Rent"],
                                    ["520004", "物业设施管理人员", "Property Establishment Management"],
                                    ["520005", "物业机电工程师", "Property Mechanical Engineer"]
                                ]
                            ]
                        ]
                    ],
                    [
                        ["", "金融", "Finance"],
                        [
                            [
                                ["130", "银行", "Banking"],
                                [
                                    ["140020", "行长/副行长", "President/Vice-President/Branch Manager"],
                                    ["410022", "客户总监", "Account Director"],
                                    ["140060", "客户经理/主管", "Account Manager/Supervisor"],
                                    ["410002", "客户代表", "Account Representative"],
                                    ["410007", "综合业务经理/主管", "Integrated Service Manager/Supervisor"],
                                    ["410008", "综合业务专员/助理", "Integrated Service Executive/Assistant"],
                                    ["410003", "公司业务部门经理/主管", "Corporate Banking Manager"],
                                    ["410004", "公司业务客户经理", "Corporate Banking Account Manager"],
                                    ["410005", "个人业务部门经理/主管", "Personal Banking Manager/Supervisor"],
                                    ["410006", "个人业务客户经理", "Personal Banking Account Manager"],
                                    ["410001", "银行经理/主任", "Bank Manager/Supervisor"],
                                    ["410009", "大堂经理", "Hall Manager"],
                                    ["140110", "柜员/银行会计", "Bank Teller/Bank Accountan"],
                                    ["410020", "信用卡中心", "Credit Card Center"],
                                    ["140120", "银行卡/电子银行/新业务开拓", "Bank card/Electronic Banking/New Business"],
                                    ["140130", "国际结算/外汇交易", "International Account Settlement/Foreign Exchange"],
                                    ["410010", "进出口/信用证结算", "Trading / LC Officer"],
                                    ["140090", "信贷管理/资信评估/分析", "Loan/Credit Officer、Assets/Credit Valuation/Analyst"],
                                    ["410011", "风险控制", "Risk Management"],
                                    ["410012", "信审核查", "Credit Review"],
                                    ["140100", "清算人员", "Settlement Officer"],
                                    ["410014", "资金管理", "Fund Management"],
                                    ["410016", "资产管理", "Asset Management"],
                                    ["410017", "金融同业", "Interbank"],
                                    ["410015", "行业研究", "Industry Research"],
                                    ["410019", "基金托管", "Trust Fund"]
                                ]
                            ],
                            [
                                ["140", "保险", "Insurance"],
                                [
                                    ["150040", "保险代理人/经纪人/客户经理", "Insurance Agent/Broker/Account Manager"],
                                    ["150100", "保险顾问/财务规划师", " Insurance Consultant"],
                                    ["150080", "业务经理/主管", "Business Manager/Supervisor"],
                                    ["150050", "客户服务/续期管理", "Customer Service/Account Renewals Management"],
                                    ["150010", "稽核/法律/合规", "Compliance/Audit"],
                                    ["150020", "核保/理赔", "Underwriting/Claim Management"],
                                    ["150130", "契约管理", "Policy Management"],
                                    ["150070", "保险精算师", "Actuary"],
                                    ["150090", "产品开发/项目策划", "Product Development/Planner"],
                                    ["150030", "保险培训师", "Insurance Trainer"],
                                    ["150131", "再保险", "Reinsurance"],
                                    ["150132", "行业研究", "Industry Research"],
                                    ["150110", "保险内勤", "Staff"],
                                    ["150120", "储备经理人", "Agency Management Associate"]
                                ]
                            ],
                            [
                                ["150", "基金/证券/期货/投资", "Securities/Futures/Investment Funds"],
                                [
                                    ["140010", "证券/外汇/期货经纪人", "Securities/Foreign Exchange/Futures/Brokerage"],
                                    ["140143", "证券交易员", "Securities Trader"],
                                    ["140144", "投资/理财顾问", "Investment/Financial Management Advisor"],
                                    ["140146", "基金管理", "Fund Management"],
                                    ["140152", "证券投资", "Securities Investment/Portfolio Investment"],
                                    ["140153", "机构客户服务", "Institutional Investor Service"],
                                    ["140149", "零售客户服务", "Retail Banking"],
                                    ["140040", "投资银行业务", "Investment Banking"],
                                    ["140141", "融资总监", "Treasury Director"],
                                    ["140050", "融资经理/主管", "Treasury Manager/Supervisor"],
                                    ["140142", "融资专员/助理", "Treasury Executive/Assistant"],
                                    ["140151", "经纪业务", "Brokerage"],
                                    ["140148", "固定收益业务", "Fixed Income"],
                                    ["140154", "资产管理", "Asset Management"],
                                    ["140160", "PE/VC投资", "Private Equity/Venture Capital"],
                                    ["140070", "资产评估", "Asset Evaluation"],
                                    ["140080", "风险管理/控制", "Risk Management/Control"],
                                    ["140150", "合规稽查", "Compliance And Audit"],
                                    ["140145", "金融产品经理", "Financial Product Manager"],
                                    ["140147", "行业研究", "Industry Research"],
                                    ["140030", "证券分析/金融研究", "Security Analysis/Financial Research"]
                                ]
                            ],
                            [
                                ["430", "会计/审计", "Accounting/Auditing"],
                                []
                            ],
                            [
                                ["500", "信托/担保/拍卖/典当", "Trust/Guarantee/Auction/Pawn Business"],
                                [
                                    ["140157", "信托业务", "Trust"],
                                    ["140155", "房地产信托/物业投资", "Real Estate Investment Trust/REITS"],
                                    ["640020", "担保业务", "Guarantee Business"],
                                    ["640030", "拍卖师", "Auctioneer"],
                                    ["640040", "典当业务", "Pawn Business"],
                                    ["640010", "珠宝/收藏品鉴定", "Jewellery /Collection Appraiser"]
                                ]
                            ]
                        ]
                    ],
                    [
                        ["", "消费品", "Consumer Goods"],
                        [
                            [
                                ["190", "食品/饮料/烟酒/日化", "Food/Drink/Wine/Commodity"],
                                []
                            ],
                            [
                                ["240", "百货/批发/零售", "General Merchandise/Wholesale/Retail"],
                                [
                                    ["291010", "店长/卖场管理", "Store Manager/Floor Manager"],
                                    ["291040", "品类管理", "Category Management"],
                                    ["291050", "安防主管", "Security Technical Service Executive"]
                                ]
                            ],
                            [
                                ["200", "服装服饰/纺织/皮革", "Clothing/Textiles/Furniture"],
                                [
                                    ["440001", "服装/纺织设计总监", "Fashion/Textiles Design Director"],
                                    ["240040", "服装/纺织设计", "Fashion/Textiles Designer"],
                                    ["440006", "服装/纺织/皮革工艺师", "Apparels/Textiles/Leather Goods Technologist"],
                                    ["240050", "服装打样/制版", "Sample Production"],
                                    ["440009", "质量管理/验货员(QA/QC)", "Quality Management QA/QC"],
                                    ["440003", "面料辅料开发", "Fabric/Accessories Development"],
                                    ["440004", "面料辅料采购", "Fabric/Accessories Purchasing"],
                                    ["440005", "服装/纺织/皮革跟单", "Apparels/Textiles/Leather Goods Merchandiser"]
                                ]
                            ],
                            [
                                ["210", "家具/家电", "Furniture/Home Appliances"],
                                []
                            ],
                            [
                                ["220", "办公用品及设备", "Office Equipment/Supplies"],
                                []
                            ],
                            [
                                ["460", "奢侈品/收藏品", "Luxury/Collection"],
                                []
                            ],
                            [
                                ["470", "工艺品/珠宝/玩具", "Arts & Craft/Toys/Jewelry"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "汽车·机械·制造", "Automobiles · Machinery · Manufacturing"],
                        [
                            [
                                ["350", "汽车/摩托车", "Automobiles/Motorcycles"],
                                [
                                    ["420003", "汽车设计工程师", "Automotive Design Engineer"],
                                    ["420002", "汽车机构工程师", "Automotive Structural Engineer"],
                                    ["420010", "汽车动力系统工程师", "Automobile Power System Engineers"],
                                    ["420008", "汽车底盘/总装工程师", "Automobile Chassis/Assembly Engineer"],
                                    ["420004", "汽车电子工程师", "Automotive Electronic Engineer"],
                                    ["420007", "汽车装配工艺工程师", "Assembly Engineer"],
                                    ["420005", "汽车质量工程师", "Automotive Quality Engineer"],
                                    ["420006", "汽车安全性能工程师", "Safety Performance Engineer"],
                                    ["420001", "汽车项目管理", "Automotive Project Management"],
                                    ["430003", "4S店管理", "4S Shop Management"],
                                    ["430001", "汽车销售", "Automobile Sales"],
                                    ["430004", "零配件销售", "Parts Sales"],
                                    ["430002", "售后服务客户服务", "After-Sales Service/Customer Service"],
                                    ["430006", "汽车质量管理", "Automotive Quality Management"],
                                    ["430007", "检验检测", "Check/Test"],
                                    ["430008", "二手车评估师", "Second-Hand Car Appraisers"],
                                    ["430011", "汽车定损/车险理赔", "Automobile Insurance"]
                                ]
                            ],
                            [
                                ["360", "机械制造/机电/重工", "Machine Manufacturing/Heavy Electrical"],
                                [
                                    ["220010", "机械工程师", "Mechanical Engineer"],
                                    ["220030", "机械设计师", "Mechanical Designer"],
                                    ["220040", "机械制图员", "Mechanical Draftsman"],
                                    ["220240", "机械结构工程师", "Mechanical Structural Engineer"],
                                    ["220282", "工艺/制程工程师(PE)", "PE Engineer"],
                                    ["220230", "工业工程师(IE)", "IE Engineer"],
                                    ["220090", "CNC工程师", "CNC Engineer"],
                                    ["220100", "冲压工程师/技师", "Punch Engineer"],
                                    ["220110", "夹具工程师/技师", "Clamp Engineer"],
                                    ["220020", "模具工程师", "Mold Engineer"],
                                    ["220130", "焊接工程师/技师", "Welding Engineer"],
                                    ["220080", "注塑工程师/技师", "Injection Engineer"],
                                    ["220070", "铸造/锻造工程师/技师", "Casting/Forging Engineer"],
                                    ["220120", "锅炉工程师/技师", "Boiler Engineer"],
                                    ["220281", "气动工程师", "Pneumatic Engineer"],
                                    ["220270", "轨道交通工程师/技师", "Railway Engineer/Technician"],
                                    ["220160", "飞机设计与制造", "Aircraft Design & Manufacture"],
                                    ["220140", "列车设计与制造", "Train Design & Manufacture"],
                                    ["220150", "船舶设计与制造", "Watercraft Design & Manufacture"],
                                    ["220190", "食品机械", "Food Machinery"],
                                    ["220200", "纺织机械", "Textile Machinery"],
                                    ["220060", "精密机械", "Precision Machinery"],
                                    ["220280", "材料工程师", "Material Engineer"],
                                    ["120130", "制冷/暖通", "HVAC/Refrigeration"],
                                    ["220050", "机电工程师", "Electrical and Mechanical Engineers"],
                                    ["220250", "飞机维修/保养", "Aircraft Repair/Maintenance"],
                                    ["220284", "列车维修/保养", "Train Repair/Maintenance"],
                                    ["220283", "船舶维修/保养", "Watercraft Repair/Maintenance"],
                                    ["220005", "机械设备经理", "Mechanical Equipment Manager"],
                                    ["220285", "机械设备工程师", "Mechanical Equipment Engineer"],
                                    ["220260", "维修经理/主管", "Maintenance Manager/Supervisor"],
                                    ["220170", "维修工程师", "Maintenance Engineer"],
                                    ["220210", "设备修理", "Equipment Repair"]
                                ]
                            ],
                            [
                                ["180", "印刷/包装/造纸", "Printing/Packaging/Papermaking"],
                                []
                            ],
                            [
                                ["370", "原材料及加工", "Raw Materials Processing"],
                                []
                            ],
                            [
                                ["340", "仪器/仪表/工业自动化/电气", "Instrumentation/Industrial Automation/Electrical"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "服务·外包·中介", "Service · Outsourcing · Agency"],
                        [
                            [
                                ["120", "专业服务(咨询/财会/法律/翻译等)", "Professional Services (Consult/Accounting/Legal/Translate)"],
                                [
                                    ["130020", "咨询总监", "Advisory Director"],
                                    ["130030", "咨询经理/主管", "Consulting Manager/Supervisor"],
                                    ["130040", "咨询顾问/咨询员", "Consultant"],
                                    ["130010", "企管顾问/专业顾问/策划师", "Business Management/Consultant/Adviser/Professional Planner"],
                                    ["130070", "涉外咨询师", "Foreign Consultants"],
                                    ["130060", "培训师", "Trainers"],
                                    ["130050", "调研员", "Researcher"],
                                    ["130071", "情报信息分析师", "Intelligence Analyst"],
                                    ["130073", "咨询项目管理", "Consulting Project Management"],
                                    ["180010", "英语翻译", "English Translator"],
                                    ["180030", "法语翻译", "French Translator"],
                                    ["180040", "德语翻译", "German Translator"],
                                    ["180050", "俄语翻译", "Russian Translator"],
                                    ["180020", "日语翻译", "Japanese Translator"],
                                    ["180070", "韩语/朝鲜语翻译", "Korean Translator"],
                                    ["180060", "西班牙语翻译", "Spanish Translator"],
                                    ["180073", "葡萄牙语翻译", "Portuguese Translator"],
                                    ["180072", "意大利语翻译", "Italian Translator"],
                                    ["180071", "阿拉伯语翻译", "Arabic Translator"],
                                    ["180074", "泰语翻译", "Thai Translator"],
                                    ["180075", "中国方言翻译", "Chinese Dialect Translator"]
                                ]
                            ],
                            [
                                ["110", "中介服务", "Intermediate Services"],
                                []
                            ],
                            [
                                ["440", "外包服务", "Outsourcing Services"],
                                []
                            ],
                            [
                                ["450", "检测/认证", "Testing/Certification"],
                                [
                                    ["050010", "质量管理/测试经理(QA/QC经理)", "QA/QC Manager"],
                                    ["050020", "质量管理/测试主管(QA/QC主管)", "QA/QC Supervisor"],
                                    ["050030", "质量检测员/测试员", "Quality Inspector/Tester"],
                                    ["050070", "认证工程师/审核员", "Certification Engineer/Auditor"],
                                    ["050080", "体系工程师/审核员", "Systems Engineer/Auditor"],
                                    ["050060", "环境/健康/安全(EHS)经理/主管", "EHS Manager/Supervisor"],
                                    ["050110", "环境/健康/安全(EHS)工程师", "EHS Engineer"],
                                    ["050090", "可靠度工程师", "Reliability Engineer"],
                                    ["050100", "故障分析工程师", "Failure Analysis Engineer"],
                                    ["340020", "安全防护/安全管理", "Safety Protection"],
                                    ["050040", "供应商/采购质量管理", "Supplier/Purchasing Quality Management"]
                                ]
                            ],
                            [
                                ["230", "旅游/酒店/餐饮服务/生活服务", "Tourism/Hospitality/Restaurant & Food Services/Personal Care & Services"],
                                [
                                    ["190010", "酒店/宾馆管理", "Hotel Management"],
                                    ["190020", "餐饮/娱乐管理", "Restaurant & Food / Entertainment Services Management"],
                                    ["190030", "大堂经理/领班", "Lobby Manager/Supervisor"],
                                    ["190040", "楼面管理", "Floor Management"],
                                    ["190200", "宴会管理", "Banquet Management"],
                                    ["190220", "管家部经理/主管", "Housekeeping Manager"],
                                    ["190230", "宾客服务经理", "Guest Service Manager"],
                                    ["190240", "预定部主管", "Reservation Supervisor"],
                                    ["190180", "酒店/宾馆营销", "Hotel Sales"],
                                    ["190060", "营养师", "Dietitian"],
                                    ["470011", "婚礼策划服务", "Wedding Planning Service"],
                                    ["190260", "旅游产品销售", "Tourism Product Sales"],
                                    ["190100", "导游/旅行顾问", "Tour Guide/Travel Consultant"],
                                    ["190270", "行程管理/计调", "Travel Management"],
                                    ["190190", "票务服务", "Ticket Service"],
                                    ["190210", "机场代表", "Hotel Airport Representatives"],
                                    ["190280", "签证专员", "Visa Specialist"]
                                ]
                            ],
                            [
                                ["260", "娱乐/休闲/体育", "Entertainment/Leisure/Sports & Fitness"],
                                []
                            ],
                            [
                                ["510", "租赁服务", "Leasing Service"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "广告·传媒·教育·文化", "Advertising · Media · Education · Culture"],
                        [
                            [
                                ["070", "广告/公关/市场推广/会展", "Advertising/Public Relations/Marketing/Exhibitions"],
                                [
                                    ["470003", "广告创意/设计总监", "Advertising Creative Director"],
                                    ["060150", "广告创意/设计经理/主管", "Advertising Creative Manager/Supervisor"],
                                    ["470004", "广告创意/设计师", "Advertising Designer"],
                                    ["470005", "文案/策划", "Copywriter/Planner"],
                                    ["470008", "美术指导", "Art Director"],
                                    ["470012", "制作执行", "Event executive"],
                                    ["470014", "广告/会展项目管理", "Advertising/Exhibition Project Management"],
                                    ["470001", "广告客户总监", "Advertising Account Director"],
                                    ["060170", "广告客户经理/主管", "Advertising Account Manager/Supervisor"],
                                    ["470002", "广告客户专员", "Advertising Account Executive"],
                                    ["470006", "广告/会展业务拓展", "Advertising/Exhibition BD"],
                                    ["060070", "会务/会展经理/主管", "Exhibition/Event Manager/Supervisor"],
                                    ["470009", "会务/会展专员/助理", " Exhibition Specialist/Assistant"],
                                    ["470010", "会展策划/设计", "Exhibition Planning /Design"]
                                ]
                            ],
                            [
                                ["170", "影视/媒体/艺术/文化/出版", "Film & Television/Media/Arts/Communication"],
                                [
                                    ["250100", "影视策划/制作/发行", "Film Planning/Production/Distribution"],
                                    ["250110", "导演/编导", "Director/Choreographer"],
                                    ["250090", "艺术/设计总监", "Artistic/Design Director"],
                                    ["250120", "摄影/摄像", "Photographer/Videographer"],
                                    ["250130", "录音/音效师", "Recording/Audio Engineer"],
                                    ["250160", "主持人/播音员", "Host/Broadcaster"],
                                    ["480001", "后期制作", "Postproduction"],
                                    ["480002", "放映管理", "Projection Management"],
                                    ["250020", "总编/副总编", "General Editor/Deputy Editor"],
                                    ["250250", "记者/采编", "Reporter"],
                                    ["250190", "电话采编", "Telephone Reporter"],
                                    ["250030", "文字编辑/组稿", "Copy Editor"],
                                    ["250040", "美术编辑", "Art Editor"],
                                    ["250070", "校对/录入", "Proofreading/Copy Entry"],
                                    ["250010", "作家/编剧/撰稿人", "Writer/Screenwriter"],
                                    ["250080", "排版设计", "Layout Design"],
                                    ["250050", "发行管理", "Distribution Management"],
                                    ["250210", "印刷排版/制版", "Layout Designer"],
                                    ["250200", "电分操作员", "Operator-Colour Distinguishing"],
                                    ["250230", "调墨技师", "Ink Technician"],
                                    ["250220", "数码直印/菲林输出", "Digital/Film Printing"],
                                    ["250240", "印刷机械机长", "Printing Machine Operator"],
                                    ["220180", "包装/印刷", "Packaging/Printing"],
                                    ["240151", "创意指导/总监", "Creative Director/Director"],
                                    ["240153", "平面设计总监/经理", "Graphic Design Director/Manager"],
                                    ["240010", "平面设计经理/主管", "Graphic Design Manager/Supervisor"],
                                    ["240080", "平面设计师", "Graphic Designer"],
                                    ["240020", "美术/图形设计", "Art/Graphic Design"],
                                    ["240152", "绘画", "Graphic Illustrator"],
                                    ["240157", "原画师", "Original Artist"],
                                    ["240120", "3D设计/制作", "3D Design/Production"],
                                    ["240110", "多媒体/动画设计", "Multimedia/Animation Design"],
                                    ["240156", "CAD设计/制图", "CAD design/drafting"],
                                    ["240090", "媒体广告设计", "Media Advertising"],
                                    ["240030", "工业/产品设计", "Industrial/Product Design"],
                                    ["240060", "工艺品/珠宝设计", "Crafts/Jewelry Design"],
                                    ["240070", "家具/家居设计", "Furniture/Household Product Design"],
                                    ["240155", "玩具设计", "Toy Design"],
                                    ["240130", "展示/陈列设计", "Exhibition/Display Design"],
                                    ["240125", "包装设计", "Packaging Design"]
                                ]
                            ],
                            [
                                ["380", "教育/培训/学术/科研/院校", "Education/Training/Science/Research/Universities and Colleges"],
                                [
                                    ["260009", "校长", "School Principal"],
                                    ["260010", "教学/教务管理人员", "Teaching/Educational Administration"],
                                    ["260030", "大学教师/教授", "Professor"],
                                    ["260052", "职业中专/技校教师", "Vocational Technical Secondary School/Technical School Teacher"],
                                    ["260051", "高中教师", "High School Teacher"],
                                    ["260053", "初中教师", "Junior high school teacher"],
                                    ["260054", "小学教师", "Grade School Teacher"],
                                    ["260020", "幼教", "Preschool Education"],
                                    ["260057", "理科教师", "Science teacher"],
                                    ["260058", "文科教师", "Liberal Arts Teacher"],
                                    ["260059", "外语教师", "Foreign language teacher"],
                                    ["260055", "音乐教师", "Music Teacher"],
                                    ["260056", "美术教师", "Art Teacher"],
                                    ["260070", "体育教师/教练", "Physical Teacher/Coach"],
                                    ["260072", "培训督导", "Supervision Training"],
                                    ["260071", "培训师/讲师", "Teacher/Trainer"],
                                    ["260073", "培训助理/助教", "Training Assistant"],
                                    ["260075", "培训策划", "Training Planning"],
                                    ["260074", "培训/招生/课程顾问", "Enrollment/Course Consultant"],
                                    ["260077", "教育产品开发", "Education Product Development"]
                                ]
                            ]
                        ]
                    ],
                    [
                        ["", "交通·贸易·物流", "Transportation · Trade · Logistics"],
                        [
                            [
                                ["250", "交通/物流/运输", "Transportation/Shipping/Logistics"],
                                [
                                    ["340018", "列车车长/司机", "Train Driver"],
                                    ["292050", "列车乘务", "Train Crew"],
                                    ["292030", "船长/副船长", "Fleet Captain"],
                                    ["292070", "船舶乘务", "Shipping Service"],
                                    ["340015", "飞机机长/副机长", "Flight Captain"],
                                    ["292010", "航空乘务", "Airline Crew"],
                                    ["292020", "地勤人员", "Ground Attendant"],
                                    ["160190", "物流总监", "Logistics Director"],
                                    ["160090", "物流经理/主管", "Logistics manager/Supervisor"],
                                    ["160200", "物流专员/助理", "Logistics Specialist/Assistant"],
                                    ["160140", "货运代理", "Freight Forwarder"],
                                    ["160130", "运输经理/主管", "Transport Management/Executive"],
                                    ["160050", "水运/空运/陆运操作", "Transport Operation"],
                                    ["160110", "物料经理/主管", "Materials Manager/Supervisor"],
                                    ["160230", "物料专员/助理", "Materials Specialist/Assistant"],
                                    ["160250", "海关事务管理", "Customs Affairs Management"],
                                    ["160040", "报关员", "Document Management/Customs Agent"],
                                    ["160260", "单证员", "Documentation Specialist"],
                                    ["160120", "仓库经理/主管", "Warehouse Manager/Supervisor"],
                                    ["160160", "物流/仓储调度", "Logistics/Warehousing Dispatcher"],
                                    ["160240", "集装箱业务", "Container Operator"],
                                    ["160270", "物流/仓储项目管理", "Logistics/Warehousing Project Management"]
                                ]
                            ],
                            [
                                ["160", "贸易/进出口", "Trade/Import-Export"],
                                [
                                    ["160010", "外贸经理/主管", "Trading Manager/Supervisor"],
                                    ["450005", "外贸专员/助理", "Trading Specialist/Assistant"],
                                    ["160020", "国内贸易经理/主管", "Domestic Trade manager/Supervisor"],
                                    ["450006", "国内贸易专员/助理", "Domestic Trade Specialist/Assistant"],
                                    ["160021", "商务经理/主管", "Business Manager/Supervisor"],
                                    ["450007", "商务专员/助理", "Business Specialist/Assistant"],
                                    ["450008", "业务跟单经理/主管", "Merchandising Manager/Supervisor"],
                                    ["450009", "业务跟单员", "Merchandiser"],
                                    ["450001", "采购总监", "Purchasing Director"],
                                    ["160070", "采购经理/主管", "Purchasing Executive/Manager/Director"],
                                    ["450002", "采购专员/助理", "Purchasing Specialist/Assistant"],
                                    ["450003", "买手", "Buyer"],
                                    ["450004", "供应商开发", "Supplier Development"]
                                ]
                            ],
                            [
                                ["480", "航空/航天", "Aerospace/Aviation/Airlines"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "制药·医疗", "Pharmaceutical · Healthcare"],
                        [
                            [
                                ["270", "制药/生物工程", "Pharmaceuticals/Biotechnology"],
                                [
                                    ["280070", "医药技术研发管理人员", "Pharmaceutical Technology R&D Management"],
                                    ["290010", "生物工程/生物制药", "Biopharmaceutical/Biotechnology"],
                                    ["290030", "药品研发", "Medicine R&D"],
                                    ["290040", "药品生产/质量管理", "Drug Manufacturing/Quality Management"],
                                    ["290094", "医疗器械研发", "Medical Equipment R&D"],
                                    ["290097", "医疗器械生产/质量管理", "Medical Equipment Manufacturing/Quality Control"],
                                    ["290020", "临床研究员", "Clinical Researcher"],
                                    ["290090", "临床数据分析员", "Clinical Data Analyst"],
                                    ["290096", "化学分析测试员", "Chemical Analyst"],
                                    ["280130", "药品注册", "Drug Registration"],
                                    ["290095", "医疗器械注册", "Medical Equipment Registration"],
                                    ["290093", "医药销售经理/主管", "Pharmaceutical Sales Manager"],
                                    ["280150", "医药代表", "Medical Representative"],
                                    ["290098", "医疗器械销售代表", "Medical Equipment Sales"],
                                    ["290102", "医药招商经理/主管", "Pharmaceutical Business Development Manager/Supervisor"],
                                    ["290099", "医药招商专员/助理", "Pharmaceutical Business Development Specialist/Assistant"],
                                    ["290091", "药品市场推广经理/主管", "Pharmaceutical Promotion Manager/Supervisor"],
                                    ["290092", "药品市场推广专员/助理", "Pharmaceutical Promotion Specialist/Assistant"],
                                    ["290055", "医疗器械市场推广", "Medical Equipment Marketing"],
                                    ["290101", "招投标管理", "Tendering Coordinator"]
                                ]
                            ],
                            [
                                ["280", "医疗/保健/美容/卫生服务", "Medical/Health and Beauty Services"],
                                [
                                    ["280010", "医院管理人员", "Hospital Management"],
                                    ["280175", "综合门诊/全科医生", "General Practitioner (GP)"],
                                    ["280161", "内科医生", "Doctor Internal Medicine"],
                                    ["280166", "外科医生", "Doctor Surgeial"],
                                    ["280172", "儿科医生", "Pediatrician"],
                                    ["280168", "牙科医生", "Dentist"],
                                    ["280167", "专科医生", "Doctor Specialist"],
                                    ["280090", "美容/整形师", "Beautician/Plastic Surgeon"],
                                    ["280169", "中医科医生", "Chinese Medicine Practioners"],
                                    ["280163", "麻醉医生", "Anesthesiologist"],
                                    ["280164", "心理医生", "Psychologist/Psychiatrist"],
                                    ["280174", "放射科医师", "Radiologist"],
                                    ["280173", "验光师", "Optometrist"],
                                    ["280110", "药库主任/药剂师", "Drug Storehouse Director/Pharmacist"],
                                    ["280020", "医疗技术人员", "Medical Technicians"],
                                    ["280030", "理疗师", "Physical Therapist"],
                                    ["280120", "针灸推拿", "Acupuncture and Massage"],
                                    ["280100", "兽医/宠物医生", "Veterinarian/Pet Doctor"],
                                    ["280171", "护理主任/护士长", "Nursing Officer"],
                                    ["280162", "护士/护理人员", "Nurse/Medical Assistant"],
                                    ["280050", "医药学检验", "Clinical Laboratory"],
                                    ["280080", "疾病控制/公共卫生", "Disease Control/Public Health"],
                                    ["280165", "营养师", "Dietitian"]
                                ]
                            ],
                            [
                                ["290", "医疗设备/器械", "Medical Equipment/Devices"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "能源·化工·环保", "Energy · Chemical · Environmental Protection"],
                        [
                            [
                                ["330", "能源(电力/水利)", "Energy (Electricity/Water Conservation)"],
                                [
                                    ["120060", "电力工程师/技术员", "Electric Power Engineer"],
                                    ["120040", "输电线路工程师", "Transmission Line Engineer"],
                                    ["120070", "电力维修技术员", "Electricity Maintenance Technician"],
                                    ["120080", "水利/水电工程师", "Water Resources/Water and Electric Engineer"],
                                    ["120090", "核力/火力工程师", "Nuclear Power/Fire Engineer"],
                                    ["120100", "空调/热能工程师", "Air-Conditioning/Energy Engineers"],
                                    ["340050", "地质勘查/选矿/采矿", "Geological Exploration"],
                                    ["120110", "石油/天然气技术人员", "Oil/Gas Technician"],
                                    ["120160", "冶金工程师", "Metallurgical Engineer"],
                                    ["120170", "光伏技术工程师", "Photovoltaic Technology Engineer"],
                                    ["120150", "能源/矿产项目管理", "Energy/Mining Project Management"]
                                ]
                            ],
                            [
                                ["310", "石油/石化/化工", "Rock oil/Chemical Industry"],
                                [
                                    ["290060", "化工技术应用/化工工程师", "Chemical Technical Application/Chemical Engineer"],
                                    ["490001", "化工实验室研究员/技术员", "Chemical Lab Scientist / Technician"],
                                    ["490002", "涂料研发工程师", "R&D Chemist Scientist"],
                                    ["490003", "配色技术员", "Color Matcher (Technician)"],
                                    ["490004", "塑料工程师", "Plastics Engineer"],
                                    ["490005", "化妆品研发", "Cosmetics Scientist"],
                                    ["490006", "食品/饮料研发", "Food / Beverage Scientist"],
                                    ["490007", "造纸研发", "Paper Making Scientist"]
                                ]
                            ],
                            [
                                ["320", "采掘/冶炼/矿产", "Mining/Metallurgy"],
                                []
                            ],
                            [
                                ["300", "环保", "Environmental Protection"],
                                [
                                    ["290070", "环保工程师", "Environmental Engineer"],
                                    ["500002", "环境评价工程师", "Environmental Assessment Engineer"],
                                    ["500003", "环保检测", "Environmental Inspector"],
                                    ["500007", "EHS管理", "EHS Management"],
                                    ["500004", "水质检测员", "Water Quality Inspector"],
                                    ["500001", "水处理工程师", "Water Treatment Engineer"],
                                    ["500005", "固废处理工程师", "Solid Waste Treatment Engineer"],
                                    ["500006", "废气处理工程师", "Waste Gas Treatment Engineer"]
                                ]
                            ],
                            [
                                ["490", "新能源", "New Energy"],
                                []
                            ]
                        ]
                    ],
                    [
                        ["", "政府·农林牧渔", "Government · Agriculture"],
                        [
                            [
                                ["390", "政府/公共事业/非营利机构", "Government/public service/Non-Profit"],
                                [
                                    ["300021", "公务员/事业单位人员", "Civil Servant"],
                                    ["300010", "科研管理人员", "Research Management"],
                                    ["300020", "科研人员", "Researchers"],
                                    ["310010", "志愿者", "Volunteer"]
                                ]
                            ],
                            [
                                ["410", "农/林/牧/渔", "Farming/Forestry/Animal Husbandry and Fishery"],
                                [
                                    ["320040", "农艺师", "Agronomist"],
                                    ["340070", "园艺师", "Gardener/Horticulturist"],
                                    ["320020", "畜牧师", "Animal Husbandry Technician"],
                                    ["320030", "动物营养/饲料研发", "Animal nutrition/Feed Development"]
                                ]
                            ],
                            [
                                ["400", "其他", "Other"],
                                [
                                    ["340080", "其他", "Others"],
                                    ["310020", "实习生", "Intern"],
                                    ["310040", "培训生", "Trainee"],
                                    ["310050", "储备干部", "Associate Trainee"]
                                ]
                            ]
                        ]
                    ]
                ],
                "industryJob": {
                    "530": [
                        ["530", "高级管理", "Senior Management"],
                        [
                            ["010010", "首席执行官CEO/总裁/总经理", "CEO/President/General Manager"],
                            ["010020", "首席运营官COO", "Chief Operating Officer/COO"],
                            ["010060", "合伙人", "Partner"],
                            ["010050", "副总裁/副总经理", "Vice President/Deputy General Manager"],
                            ["010102", "分公司/代表处负责人", "Head of Branch Company"],
                            ["010070", "部门/事业部管理", "Department Management"],
                            ["010101", "投资者关系", "Investor Relations"],
                            ["010080", "总裁助理/总经理助理", "Executive Assistant/General Manager Assistant"],
                            ["010103", "企业秘书/董事会秘书", "Corporate/Board Secretary"]
                        ]
                    ],
                    "531": [
                        ["531", "人力资源", "Human Resource"],
                        [
                            ["010121", "首席人力资源官CHO/HRVP", "Chief Human Resource Officer/Vice President"],
                            ["070010", "人力资源总监", "Director of Human Resources"],
                            ["070020", "人力资源经理/主管", "Human Resources Manager/Supervisor"],
                            ["070040", "人力资源专员/助理", "HR Specialist/Assistant"],
                            ["070050", "招聘经理/主管", "Recruiting Manager/Supervisor"],
                            ["070051", "招聘专员/助理", "Recruiting Specialist/Assistant"],
                            ["070070", "培训经理/主管", "Training Manager/Supervisor"],
                            ["070080", "培训专员/助理", "Training Specialist/Assistant"],
                            ["070161", "企业培训师/讲师", "Staff Trainer"],
                            ["070100", "薪资福利经理/主管", "Compensation and Benefits Manager/Director"],
                            ["070101", "薪资福利专员/助理", "Compensation & Benefits Specialist/Assistant"],
                            ["070120", "绩效经理/主管", "Performance Assessment Manager/Supervisor"],
                            ["070121", "绩效专员/助理", "Performance Assessment Specialist/Assistant"],
                            ["070140", "员工关系/企业文化/工会", "Employee Relations/Corporate Culture/Unions"],
                            ["070143", "组织发展(OD)", "Organization Development"],
                            ["070141", "人力资源信息系统", "HRIS"],
                            ["070142", "人力资源伙伴(HRBP)", "HR Business Partner"],
                            ["070162", "猎头顾问/助理", "Headhunter/Assistant"]
                        ]
                    ],
                    "532": [
                        ["532", "财务/审计/税务", "Financial Affairs"],
                        [
                            ["010040", "首席财务官CFO", "Chief Financial Officer/CFO"],
                            ["090020", "财务总监", "Chief Financial Officer"],
                            ["090030", "财务经理", "Financial Manager"],
                            ["090040", "财务主管/总帐主管", "Financial Director/General Accounts Director"],
                            ["090200", "财务顾问", "Finance Consultant"],
                            ["090140", "财务助理", "Finance Assistant"],
                            ["090050", "会计经理/主管", "Accounting Manager/Supervisor"],
                            ["090060", "会计/会计师", "Accountant"],
                            ["090201", "会计助理/文员", "Accounting Clerk"],
                            ["090202", "出纳员", "Cashier"],
                            ["090120", "审计经理/主管", "Audit Manager/Supervisor"],
                            ["090130", "审计专员/助理", "Audit Executive/Assistant"],
                            ["090160", "税务经理/主管", "Tax Manager/Supervisor"],
                            ["090170", "税务专员/助理", "Tax Executive/Assistant"],
                            ["090080", "财务分析经理/主管", "Financial Analysis Manager/Supervisor"],
                            ["090090", "财务分析员", "Financial Analyst"],
                            ["090100", "成本经理/主管", "Cost Accounting Manager/Supervisor"],
                            ["090110", "成本管理员", "Capital Manager"],
                            ["090180", "投融资经理/主管", "Investment and Finance Manager/Supervisor"],
                            ["090203", "资产/资金管理", "Treasury Manager/Supervisor"],
                            ["090150", "统计员", "Statistician"]
                        ]
                    ],
                    "533": [
                        ["533", "市场", "Marketing Management"],
                        [
                            ["060010", "市场总监", "Marketing Director"],
                            ["060020", "市场经理/主管", "Marketing Manager/Supervisor"],
                            ["060200", "市场专员/助理", "Marketing Specialist/Assistant"],
                            ["060130", "市场企划经理/主管", "Marketing Planning Manager/Supervisor"],
                            ["060207", "市场企划专员/助理", "Marketing Planning Specialist/Assistant"],
                            ["060201", "市场拓展经理/主管", "BD manager/Supervisor"],
                            ["060202", "市场拓展专员/助理", "BD Specialist/Assistant"],
                            ["060205", "市场通路经理/主管", "Trade Marketing Manager/Supervisor"],
                            ["060206", "市场通路专员/助理", "Trade Marketing Specialist/Assistant"],
                            ["060090", "产品经理/主管", "Product Manager/Supervisor"],
                            ["060204", "产品专员/助理", "Product Specialist/Assistant"],
                            ["060203", "品牌经理/主管", "Brand Manager/Supervisor"],
                            ["060209", "品牌专员/助理", "Brand Specialist/Assistant"],
                            ["060110", "促销经理/主管", "Promotion Manager/ Supervisor"],
                            ["460005", "活动策划", "Event Planner"],
                            ["460006", "活动执行", "Event Excution"],
                            ["060060", "市场调研与分析", "Market Research and Analysis"],
                            ["060208", "选址拓展/新店开发", "Site Development"]
                        ]
                    ],
                    "534": [
                        ["534", "公关/媒介", "Public Relations/Media"],
                        [
                            ["460001", "公关总监", "Public Relations Director"],
                            ["060040", "公关经理/主管", "Public Relations Manager/Supervisor"],
                            ["460002", "公关专员/助理", "Public Relations Specialist/Assistant"],
                            ["290100", "政府事务管理", "Government Affairs"],
                            ["460003", "媒介经理/主管", "Media Manager/Supervisor"],
                            ["460004", "媒介专员/助理", "Media Specialist/Assistant"],
                            ["460009", "媒介策划", "Media Planning"],
                            ["460007", "媒介销售", "Media Sales"]
                        ]
                    ],
                    "535": [
                        ["535", "销售管理", "Sales Management"],
                        [
                            ["020125", "销售总经理/销售副总裁", "Sales General Manager/Vice President"],
                            ["020010", "销售总监", "Sales Director"],
                            ["020020", "销售经理/主管", "Sales Manager/Supervisor"],
                            ["020005", "区域销售总监", "Regional Sales Director"],
                            ["020025", "区域销售经理/主管", "Regional Sales Manager/Supervisor"],
                            ["020040", "渠道/分销总监", "Channel/Distribution Director"],
                            ["020050", "渠道/分销经理/主管", "Channel/Distribution Manager/Supervisor"],
                            ["020127", "客户总监", "Account Director"],
                            ["020122", "客户经理/主管", "Sales Account Manager/Supervisor"],
                            ["020121", "大客户销售管理", "Key Account Sales Management"],
                            ["020120", "业务拓展经理/主管", "Business Development Supervisor/Manager"],
                            ["020126", "团购经理/主管", "Team Buying Manager/Supervisor"]
                        ]
                    ],
                    "536": [
                        ["536", "销售人员", "Salespersons"],
                        [
                            ["370001", "销售代表", "Sales Representative"],
                            ["370012", "区域销售专员/助理", "Regional Sales Specialist/Assistant"],
                            ["370002", "渠道/分销专员", "Channel/Distribution Representative"],
                            ["370003", "客户代表", "Sales Account Representative"],
                            ["370007", "大客户销售", "Key Account Sales"],
                            ["370013", "业务拓展专员/助理", "BD Specialist/Assistant"],
                            ["370005", "电话销售", "Telesales"],
                            ["370004", "销售工程师", "Sales Engineer"],
                            ["370008", "医药销售代表", "Pharmaceutical Sales Representative"],
                            ["370010", "团购业务员", "Team Buying Sales"],
                            ["370011", "网络/在线销售", "Online Sales"],
                            ["370006", "经销商", "Distributor"]
                        ]
                    ],
                    "537": [
                        ["537", "销售行政/商务", "Sales Administration"],
                        [
                            ["380001", "销售行政经理/主管", "Sales Admin. Manager/Supervisor"],
                            ["380002", "销售行政专员/助理", "Sales Admin. Executive/Assistant"],
                            ["380004", "销售运营经理/主管", "Sales Operations Manager/Supervisor"],
                            ["380005", "销售运营专员/助理", "Sales Operations Executive/Assistant"],
                            ["380008", "业务分析经理/主管", "Business Analysis Manager/Supervisor"],
                            ["380009", "业务分析专员/助理", "Business Analysis Specialist/Assistant"],
                            ["020100", "商务经理/主管", "Business Manager/Supervisor"],
                            ["380003", "商务专员/助理", "Business Executive/Assistant"],
                            ["380007", "销售培训讲师", "Sales trainer"]
                        ]
                    ],
                    "538": [
                        ["538", "客户服务/技术支持", "Customer Service and Technical Support"],
                        [
                            ["030010", "客户服务总监", "Director of Customer Service"],
                            ["030085", "客户服务经理/主管", "Customer Service Manager/Specialist"],
                            ["030081", "客户服务专员/助理", "Customer Service Specialist/Assistant"],
                            ["030082", "咨询热线/呼叫中心人员", "Hotline/Call Center Staff"],
                            ["030083", "投诉处理专员", "Complaint Coordinator"],
                            ["030084", "会员/VIP管理", "VIP Member Management"],
                            ["360130", "网店店长/客服管理", "Online Shop Manager/Customer Service Management"],
                            ["030086", "网络/在线客服", "Online Customer Service"],
                            ["020070", "售前支持经理/主管", "Pre-Sales Support Manager/Supervisor"],
                            ["020080", "售前支持工程师", "Pre-Sales Support Engineer"],
                            ["030060", "售后支持经理/主管", "After-Sales Support Manager/Supervisor"],
                            ["030070", "售后支持工程师", "Sales Support Engineer"]
                        ]
                    ],
                    "539": [
                        ["539", "法务", "Legal"],
                        [
                            ["270010", "律师", "Lawyer"],
                            ["270060", "律师助理", "Paralegal"],
                            ["270040", "法务经理/主管", "Legal manager/Supervisor"],
                            ["270041", "法务专员/助理", "Lega Specialist/Assistant"],
                            ["270020", "法律顾问", "Legal Adviser"],
                            ["270043", "合规经理", "Compliance Manager"],
                            ["270044", "合规主管/专员", "Compliance Supervisor/Specialist"],
                            ["270042", "知识产权/专利/商标代理人", " Intellectual Property/Patent Advisor"]
                        ]
                    ],
                    "540": [
                        ["540", "行政/后勤/文秘", "Administration"],
                        [
                            ["080010", "行政总监", "Executive Director"],
                            ["080020", "行政经理/主管/办公室主任", "Administration Manager/Supervisor"],
                            ["080021", "行政专员/助理", "Administration Specialist/Assistant"],
                            ["080061", "助理/秘书/文员", "Executive Assistant/Secretary"],
                            ["080062", "前台/总机/接待", "Receptionist"],
                            ["080060", "图书/资料/档案管理", "Document Keeper"],
                            ["080063", "电脑操作/打字/录入员", "Computer Operator/Typist"],
                            ["080065", "后勤/总务", "Logistics/General Affairs"]
                        ]
                    ],
                    "542": [
                        ["542", "后端开发", "Back-end Development"],
                        [
                            ["100100", "高级软件工程师", "Senior Software Engineer"],
                            ["100090", "软件工程师", "Software Engineer"],
                            ["360321", "架构师", "Architect"],
                            ["100080", "系统分析师", "System Analyst"],
                            ["350040", "需求分析师", "Demand Analyst"],
                            ["360310", "移动开发工程师", "Mobile Development Engineer"],
                            ["360333", "数据库开发工程师", "Database Developer"],
                            ["350030", "ERP技术开发", "ERP R&D"],
                            ["100290", "多媒体/游戏开发工程师", "Multimedia/Game Development Engineer"],
                            ["100280", "语音/视频/图形开发工程师", "Audio/Video/Graphics Development Engineer"],
                            ["110070", "嵌入式软件开发", "Embedded Software Engineer"],
                            ["360334", "算法工程师", "Algorithm Engineer"],
                            ["100140", "系统集成工程师", "Systems Integration Engineer"]
                        ]
                    ],
                    "543": [
                        ["543", "IT质量管理", "IT QA"],
                        [
                            ["360322", "测试经理/主管", "Testing Manager/Supervisor"],
                            ["360323", "测试工程师", "Testing Engineer"],
                            ["360327", "测试开发", "Test Development Engineer"],
                            ["360324", "自动化测试", "Automation Testing Engineer"],
                            ["360325", "功能测试", "Functional Testing Engineer"],
                            ["360326", "性能测试", "Performance Testing Engineer"],
                            ["360340", "软件测试", "Software Testing"],
                            ["100250", "硬件测试", "Hardware Testing"],
                            ["100235", "计量/标准化工程师", "Measure/Standardization Engineer"]
                        ]
                    ],
                    "545": [
                        ["545", "运营", "Operations"],
                        [
                            ["360010", "运营总监", "Operations Director"],
                            ["360020", "运营经理/主管", "Operations Manager/Supervisor"],
                            ["360030", "运营专员", "Operations Specialist"],
                            ["100300", "网站营运管理", "Web Operations Management"],
                            ["100320", "网站策划", "Site Planning"],
                            ["100310", "网站编辑", "Website Editor"],
                            ["360070", "网络推广总监", "Online Marketing Director"],
                            ["360080", "网络推广经理/主管", "Online Marketing Manager/Supervisor"],
                            ["360090", "网络推广专员", "Online Marketing Specialist"],
                            ["360060", "SEO搜索引擎优化", "SEO"],
                            ["060210", "SEM搜索引擎营销", "SEM"],
                            ["360100", "电子商务总监", "E-Commerce Director"],
                            ["360110", "电子商务经理/主管", "E-Commerce Manager/Supervisor"],
                            ["360120", "电子商务专员", "E-Commerce Specialist"]
                        ]
                    ],
                    "546": [
                        ["546", "产品", "Product"],
                        [
                            ["360040", "产品总监", "Product Director"],
                            ["100071", "产品经理/主管", "Product Manager/Supervisor"],
                            ["360050", "产品专员/助理", "Product Specialist/Assistant"],
                            ["360180", "游戏策划师", "Game Planner"],
                            ["360270", "用户研究总监/经理", "User Research Director/Manager"],
                            ["360280", "用户研究员", "User Researcher"]
                        ]
                    ],
                    "547": [
                        ["547", "UI/UE/平面设计", "UI/UE/Graphic Design"],
                        [
                            ["100340", "网页设计/制作/美工", "Web Designer/Production/Creative"],
                            ["360290", "视觉设计总监/经理", "Visual Design Director/Manager"],
                            ["360220", "视觉设计师", "Visual Effects Designer"],
                            ["350010", "UI设计师", "UI Designer"],
                            ["360260", "交互设计总监/经理", "Interaction Design Director/Manager"],
                            ["360150", "UE交互设计师", "UE Interaction Designer"],
                            ["360240", "三维/3D设计/制作", "Three-dimensional/3D Design/Production"],
                            ["360190", "游戏界面设计师", "Game UI Designer"],
                            ["360200", "Flash设计/开发", "Flash Designer/Developer"],
                            ["360210", "特效设计师", "Special Effects Designer"],
                            ["360230", "音效设计师", "Sound Effects Designer"]
                        ]
                    ],
                    "549": [
                        ["549", "电子/电器/半导体/仪器", "Electronics/Wiring/Semiconductor/Instrument"],
                        [
                            ["110020", "电子/电器工程师", "Electronic/Electrical Equipment Engineer"],
                            ["110180", "电子技术研发工程师", "Electronics Development Engineer"],
                            ["110170", "电气工程师", "Electrical Engineer"],
                            ["110400", "电气线路设计", "Electrical Circuit Design"],
                            ["110401", "线路结构设计", "Route structure design"],
                            ["110010", "电路工程师/技术员", "Electronic Circuit Engineer"],
                            ["110040", "工艺/制程工程师(PE)", "PE Engineer"],
                            ["110404", "模拟电路设计/应用工程师", "Analogical Electronic Design / Application Engineer"],
                            ["110130", "集成电路IC设计/应用工程师", "IC Design/Application Engineer"],
                            ["110330", "版图设计工程师", "Engineer Layout Design Engineer"],
                            ["110380", "IC验证工程师", "IC Verification Engineer"],
                            ["110403", "自动化工程师", "Automation Engineer"],
                            ["110350", "自动控制工程师/技术员", "Autocontrol Engineer/Technician"],
                            ["110060", "家用电器/数码产品研发", "Household Electronics/Digital Products Development"],
                            ["110405", "空调工程/设计", "Air Conditioning Engineering/Design"],
                            ["110050", "电声/音响工程师/技术员", "Electroacoustics Engineer"],
                            ["110360", "电池/电源开发", "Battery/Power Engineer"],
                            ["110090", "半导体技术", "Semiconductor Technology"],
                            ["110100", "电子元器件工程师", "Electronic Component Engineer"],
                            ["110310", "射频工程师", "RF Engineer"],
                            ["110320", "变压器与磁电工程师", "Transformer and Magnetoelectricity"],
                            ["110340", "激光/光电子技术", "Laser/Optoelectronics Technology"],
                            ["110402", "机电工程师", "Electrical & Mechanical Engineer"],
                            ["110407", "安防系统工程师", "Security Systems Engineer"],
                            ["110120", "光源与照明工程师", "Light Source and Lighting Engineer"],
                            ["110406", "仪器/仪表/计量", "Instrument/Measurement Analyst"],
                            ["110370", "FAE现场应用工程师", "Field Application Engineer(FAE)"],
                            ["110110", "电子/电器维修", "Electronics/Electronics Repair"],
                            ["110190", "工程与项目实施", "Engineering and Project Implementation"],
                            ["110140", "技术文档工程师", "Technical Documentation Engineer"]
                        ]
                    ],
                    "550": [
                        ["550", "电信/通信技术", "Telecommunication/Communication Techonlogy"],
                        [
                            ["110030", "电信/通讯工程师", "Telecommunications/Communications Engineer"],
                            ["110210", "通信技术工程师", "Communication Engineer"],
                            ["110240", "数据通信工程师", "Data Communication Engineer"],
                            ["110250", "移动通信工程师", "Mobile Communication Engineer"],
                            ["110260", "电信网络工程师", "Telecommunication Network Engineer"],
                            ["110230", "电信交换工程师", "Telecommunication Exchange Engineer"],
                            ["110220", "有线传输工程师", "Wired Transmission Engineer"],
                            ["110080", "无线/射频通信工程师", "RF/ Communication Engineer"],
                            ["110270", "通信电源工程师", "Communication Power Supply Engineer"],
                            ["110280", "增值产品开发工程师", "Value-Added Product Development Engineer"],
                            ["110300", "通信标准化工程师", "Communication Standardization Engineer"],
                            ["110290", "通信项目管理", "Communication Project Management"]
                        ]
                    ],
                    "551": [
                        ["551", "硬件开发", "Hardware Development"],
                        [
                            ["100130", "高级硬件工程师", "Senior Hardware Engineer"],
                            ["100150", "硬件工程师", "Hardware Engineer"],
                            ["110065", "嵌入式硬件开发(主板机…)", "Embedded Hardware Engineer(PCB…)"]
                        ]
                    ],
                    "553": [
                        ["553", "建筑工程", "Construction"],
                        [
                            ["170191", "高级建筑工程师/总工", "Senior Architect"],
                            ["170010", "建筑工程师", "Architect"],
                            ["340040", "测绘/测量", "Mapping/Surveyor"],
                            ["170207", "爆破工程师", "Blast Engineer"],
                            ["170202", "智能大厦/综合布线/安防/弱电", "Intelligent Building/Integrated Wiring/Defence&Security/Weak Current"],
                            ["170195", "建筑机电工程师", "Building Electrical Engineer"],
                            ["170199", "市政工程师", "Municipal Project Engineer"],
                            ["170210", "土建造价工程师", "Civil Engineering Cost Engineer "],
                            ["170209", "安装造价工程师", "Installation Cost Engineer"],
                            ["170170", "公路桥梁预算师", "Road and Bridge Estimator"],
                            ["170100", "工程预结算管理", "Construction Budget/Cost Management"],
                            ["170205", "现场/施工管理", "Construction Management"],
                            ["170180", "施工员", "Construction Worker"],
                            ["170090", "建筑设备工程师", "Construction Equipment Engineer"],
                            ["170050", "工程监理", "Project Management"],
                            ["170040", "建筑工程管理/项目经理", "Construction Management"],
                            ["170201", "建筑工程安全管理", "Construction Security Management"],
                            ["170192", "建筑工程验收", "Construction Project Inspector"],
                            ["170200", "合同管理", "Contract Management"],
                            ["170203", "资料员", "Data Management Specialist"]
                        ]
                    ],
                    "554": [
                        ["554", "土木/土建规划设计", "Civil Planning/Design"],
                        [
                            ["170030", "建筑设计师", "Architectural Designer"],
                            ["170020", "土木/土建工程师", "Civil Engineer"],
                            ["170211", "结构工程师", "Structural Engineer"],
                            ["170206", "钢结构工程师", "Steel Structure Engineer"],
                            ["170193", "岩土工程", "Geotechnical Engineer"],
                            ["170212", "水利/港口工程技术", "Water Conservancy/Port Engineering Technology"],
                            ["170110", "道路/桥梁/隧道工程技术", "Road/Bridge/Tunnel Technology"],
                            ["170197", "建筑制图/模型/渲染", "CAD Drafter/Building Model/Rendering"],
                            ["170214", "架线和管道工程技术", "Pipeline Engineering Technology"],
                            ["170194", "楼宇自动化", "Building Automation"],
                            ["170060", "给排水/制冷暖通", "Drainage / refrigeration HVAC"],
                            ["170208", "空调工程师", "Air Conditioner Engineer"],
                            ["170150", "城市规划与设计", "Urban Planning and Design"],
                            ["170120", "园艺/园林/景观设计", "Gardenning Designer"]
                        ]
                    ],
                    "555": [
                        ["555", "物业管理", "Property Management"],
                        [
                            ["170140", "物业管理经理/主管", "Property Management Manager/Supervisor"],
                            ["520001", "物业管理专员/助理", "Property Management"],
                            ["520002", "高级物业顾问/物业顾问", "Senior Property Advisor/Property Advisor"],
                            ["520003", "物业招商/租赁/租售", "Property Lease/Rent"],
                            ["520004", "物业设施管理人员", "Property Establishment Management"],
                            ["520005", "物业机电工程师", "Property Mechanical Engineer"]
                        ]
                    ],
                    "556": [
                        ["556", "银行", "Banking"],
                        [
                            ["140020", "行长/副行长", "President/Vice-President/Branch Manager"],
                            ["410022", "客户总监", "Account Director"],
                            ["140060", "客户经理/主管", "Account Manager/Supervisor"],
                            ["410002", "客户代表", "Account Representative"],
                            ["410007", "综合业务经理/主管", "Integrated Service Manager/Supervisor"],
                            ["410008", "综合业务专员/助理", "Integrated Service Executive/Assistant"],
                            ["410003", "公司业务部门经理/主管", "Corporate Banking Manager"],
                            ["410004", "公司业务客户经理", "Corporate Banking Account Manager"],
                            ["410005", "个人业务部门经理/主管", "Personal Banking Manager/Supervisor"],
                            ["410006", "个人业务客户经理", "Personal Banking Account Manager"],
                            ["410001", "银行经理/主任", "Bank Manager/Supervisor"],
                            ["410009", "大堂经理", "Hall Manager"],
                            ["140110", "柜员/银行会计", "Bank Teller/Bank Accountan"],
                            ["410020", "信用卡中心", "Credit Card Center"],
                            ["140120", "银行卡/电子银行/新业务开拓", "Bank card/Electronic Banking/New Business"],
                            ["140130", "国际结算/外汇交易", "International Account Settlement/Foreign Exchange"],
                            ["410010", "进出口/信用证结算", "Trading / LC Officer"],
                            ["140090", "信贷管理/资信评估/分析", "Loan/Credit Officer、Assets/Credit Valuation/Analyst"],
                            ["410011", "风险控制", "Risk Management"],
                            ["410012", "信审核查", "Credit Review"],
                            ["140100", "清算人员", "Settlement Officer"],
                            ["410014", "资金管理", "Fund Management"],
                            ["410016", "资产管理", "Asset Management"],
                            ["410017", "金融同业", "Interbank"],
                            ["410015", "行业研究", "Industry Research"],
                            ["410019", "基金托管", "Trust Fund"]
                        ]
                    ],
                    "557": [
                        ["557", "保险", "Insurance"],
                        [
                            ["150040", "保险代理人/经纪人/客户经理", "Insurance Agent/Broker/Account Manager"],
                            ["150100", "保险顾问/财务规划师", " Insurance Consultant"],
                            ["150080", "业务经理/主管", "Business Manager/Supervisor"],
                            ["150050", "客户服务/续期管理", "Customer Service/Account Renewals Management"],
                            ["150010", "稽核/法律/合规", "Compliance/Audit"],
                            ["150020", "核保/理赔", "Underwriting/Claim Management"],
                            ["150130", "契约管理", "Policy Management"],
                            ["150070", "保险精算师", "Actuary"],
                            ["150090", "产品开发/项目策划", "Product Development/Planner"],
                            ["150030", "保险培训师", "Insurance Trainer"],
                            ["150131", "再保险", "Reinsurance"],
                            ["150132", "行业研究", "Industry Research"],
                            ["150110", "保险内勤", "Staff"],
                            ["150120", "储备经理人", "Agency Management Associate"]
                        ]
                    ],
                    "558": [
                        ["558", "业务服务", "Financial Service"],
                        [
                            ["140010", "证券/外汇/期货经纪人", "Securities/Foreign Exchange/Futures/Brokerage"],
                            ["140143", "证券交易员", "Securities Trader"],
                            ["140144", "投资/理财顾问", "Investment/Financial Management Advisor"],
                            ["140146", "基金管理", "Fund Management"],
                            ["140152", "证券投资", "Securities Investment/Portfolio Investment"],
                            ["140153", "机构客户服务", "Institutional Investor Service"],
                            ["140149", "零售客户服务", "Retail Banking"],
                            ["140040", "投资银行业务", "Investment Banking"],
                            ["140141", "融资总监", "Treasury Director"],
                            ["140050", "融资经理/主管", "Treasury Manager/Supervisor"],
                            ["140142", "融资专员/助理", "Treasury Executive/Assistant"],
                            ["140151", "经纪业务", "Brokerage"],
                            ["140148", "固定收益业务", "Fixed Income"],
                            ["140154", "资产管理", "Asset Management"],
                            ["140160", "PE/VC投资", "Private Equity/Venture Capital"]
                        ]
                    ],
                    "559": [
                        ["559", "金融产品/行业研究/风控", "Financial Product/Industry Research/Risk Management"],
                        [
                            ["140070", "资产评估", "Asset Evaluation"],
                            ["140080", "风险管理/控制", "Risk Management/Control"],
                            ["140150", "合规稽查", "Compliance And Audit"],
                            ["140145", "金融产品经理", "Financial Product Manager"],
                            ["140147", "行业研究", "Industry Research"],
                            ["140030", "证券分析/金融研究", "Security Analysis/Financial Research"]
                        ]
                    ],
                    "563": [
                        ["563", "信托/担保/拍卖/典当", "Other"],
                        [
                            ["140157", "信托业务", "Trust"],
                            ["140155", "房地产信托/物业投资", "Real Estate Investment Trust/REITS"],
                            ["640020", "担保业务", "Guarantee Business"],
                            ["640030", "拍卖师", "Auctioneer"],
                            ["640040", "典当业务", "Pawn Business"],
                            ["640010", "珠宝/收藏品鉴定", "Jewellery /Collection Appraiser"]
                        ]
                    ],
                    "564": [
                        ["564", "生产工艺", "Production Technology"],
                        [
                            ["210090", "技术或工艺设计经理", "Technology or Process Design Manager"],
                            ["210170", "工艺/制程工程师(PE)", "PE Engineer"],
                            ["210180", "工业工程师(IE)", "Industrial Engineer"],
                            ["210190", "制造工程师", "Manufacturing Engineer"],
                            ["210080", "产品管理", "Product Management"],
                            ["210250", "包装工程师", "Packaging Engineer"]
                        ]
                    ],
                    "565": [
                        ["565", "采购/物料/设备管理", "Purchasing/Material/Equipment Management"],
                        [
                            ["210040", "采购管理", "Purchasing Management"],
                            ["160210", "供应链总监", "Supply Chain Director"],
                            ["160095", "供应链经理/主管", "Supply Chain Executive/Manager/Director"],
                            ["160220", "供应链专员/助理", "Supply Chain Specialist/Assistant"],
                            ["210050", "生产物料管理(PMC)", "Production Material Control(PMC)"],
                            ["210060", "生产设备管理", "Production Equipment Management"],
                            ["210130", "维修工程师", "Maintenance Engineer"]
                        ]
                    ],
                    "566": [
                        ["566", "生产管理/维修", "Production Management/Maintenance"],
                        [
                            ["210210", "工厂经理/厂长", "Plant/Factory Manager"],
                            ["210020", "总工程师/副总工程师", "Chief Engineer/Deputy Chief Engineer"],
                            ["210240", "生产总监", "Production Director"],
                            ["210140", "生产经理/车间主任", "Production Manager/Workshop Supervisor"],
                            ["210150", "组长/拉长", "Group Leader"],
                            ["210260", "生产文员", "Production Clerk"],
                            ["210220", "生产项目总监", "Production Project Director"],
                            ["210230", "生产项目经理/主管", "Production Project Manager/Supervisor"],
                            ["210030", "生产项目工程师", "Production Project Engineer"],
                            ["210015", "运营经理/主管", "Operations Manager/Supervisor"],
                            ["210160", "生产计划/调度", "Production Planning/Scheduling"],
                            ["210270", "维修经理/主管", "Maintenance Manager/Supervisor"],
                            ["210110", "生产质量管理", "Production Quality Management"],
                            ["210070", "安全/健康/环境管理", "Safety/Health/Environmental Management"]
                        ]
                    ],
                    "569": [
                        ["569", "百货/连锁/零售服务", "Department Store/Chain Shops/Retail"],
                        [
                            ["291010", "店长/卖场管理", "Store Manager/Floor Manager"],
                            ["291040", "品类管理", "Category Management"],
                            ["291050", "安防主管", "Security Technical Service Executive"]
                        ]
                    ],
                    "571": [
                        ["571", "服装/纺织/皮革", "Apparels/Textiles/Leather Goods"],
                        [
                            ["440001", "服装/纺织设计总监", "Fashion/Textiles Design Director"],
                            ["240040", "服装/纺织设计", "Fashion/Textiles Designer"],
                            ["440006", "服装/纺织/皮革工艺师", "Apparels/Textiles/Leather Goods Technologist"],
                            ["240050", "服装打样/制版", "Sample Production"],
                            ["440009", "质量管理/验货员(QA/QC)", "Quality Management QA/QC"],
                            ["440003", "面料辅料开发", "Fabric/Accessories Development"],
                            ["440004", "面料辅料采购", "Fabric/Accessories Purchasing"],
                            ["440005", "服装/纺织/皮革跟单", "Apparels/Textiles/Leather Goods Merchandiser"]
                        ]
                    ],
                    "579": [
                        ["579", "汽车销售与服务", "Automotive Sales and Service"],
                        [
                            ["430003", "4S店管理", "4S Shop Management"],
                            ["430001", "汽车销售", "Automobile Sales"],
                            ["430004", "零配件销售", "Parts Sales"],
                            ["430002", "售后服务客户服务", "After-Sales Service/Customer Service"],
                            ["430006", "汽车质量管理", "Automotive Quality Management"],
                            ["430007", "检验检测", "Check/Test"],
                            ["430008", "二手车评估师", "Second-Hand Car Appraisers"],
                            ["430011", "汽车定损/车险理赔", "Automobile Insurance"]
                        ]
                    ],
                    "585": [
                        ["585", "印刷/包装", "Packaging/Printing"],
                        [
                            ["250210", "印刷排版/制版", "Layout Designer"],
                            ["250200", "电分操作员", "Operator-Colour Distinguishing"],
                            ["250230", "调墨技师", "Ink Technician"],
                            ["250220", "数码直印/菲林输出", "Digital/Film Printing"],
                            ["250240", "印刷机械机长", "Printing Machine Operator"],
                            ["220180", "包装/印刷", "Packaging/Printing"]
                        ]
                    ],
                    "589": [
                        ["589", "咨询/调研", "Consultant/Research"],
                        [
                            ["130020", "咨询总监", "Advisory Director"],
                            ["130030", "咨询经理/主管", "Consulting Manager/Supervisor"],
                            ["130040", "咨询顾问/咨询员", "Consultant"],
                            ["130010", "企管顾问/专业顾问/策划师", "Business Management/Consultant/Adviser/Professional Planner"],
                            ["130070", "涉外咨询师", "Foreign Consultants"],
                            ["130060", "培训师", "Trainers"],
                            ["130050", "调研员", "Researcher"],
                            ["130071", "情报信息分析师", "Intelligence Analyst"],
                            ["130073", "咨询项目管理", "Consulting Project Management"]
                        ]
                    ],
                    "591": [
                        ["591", "翻译", "Translator"],
                        [
                            ["180010", "英语翻译", "English Translator"],
                            ["180030", "法语翻译", "French Translator"],
                            ["180040", "德语翻译", "German Translator"],
                            ["180050", "俄语翻译", "Russian Translator"],
                            ["180020", "日语翻译", "Japanese Translator"],
                            ["180070", "韩语/朝鲜语翻译", "Korean Translator"],
                            ["180060", "西班牙语翻译", "Spanish Translator"],
                            ["180073", "葡萄牙语翻译", "Portuguese Translator"],
                            ["180072", "意大利语翻译", "Italian Translator"],
                            ["180071", "阿拉伯语翻译", "Arabic Translator"],
                            ["180074", "泰语翻译", "Thai Translator"],
                            ["180075", "中国方言翻译", "Chinese Dialect Translator"]
                        ]
                    ],
                    "592": [
                        ["592", "旅游/出入境服务", "Tourism/Exit and Entry Service"],
                        [
                            ["190260", "旅游产品销售", "Tourism Product Sales"],
                            ["190100", "导游/旅行顾问", "Tour Guide/Travel Consultant"],
                            ["190270", "行程管理/计调", "Travel Management"],
                            ["190190", "票务服务", "Ticket Service"],
                            ["190210", "机场代表", "Hotel Airport Representatives"],
                            ["190280", "签证专员", "Visa Specialist"]
                        ]
                    ],
                    "593": [
                        ["593", "酒店/餐饮/娱乐/生活服务", "Hospitality/Restaurant/Entertainmen/Life Service"],
                        [
                            ["190010", "酒店/宾馆管理", "Hotel Management"],
                            ["190020", "餐饮/娱乐管理", "Restaurant & Food / Entertainment Services Management"],
                            ["190030", "大堂经理/领班", "Lobby Manager/Supervisor"],
                            ["190040", "楼面管理", "Floor Management"],
                            ["190200", "宴会管理", "Banquet Management"],
                            ["190220", "管家部经理/主管", "Housekeeping Manager"],
                            ["190230", "宾客服务经理", "Guest Service Manager"],
                            ["190240", "预定部主管", "Reservation Supervisor"],
                            ["190180", "酒店/宾馆营销", "Hotel Sales"],
                            ["190060", "营养师", "Dietitian"],
                            ["470011", "婚礼策划服务", "Wedding Planning Service"]
                        ]
                    ],
                    "594": [
                        ["594", "广告/会展", "Advertising/Exhibition"],
                        [
                            ["470003", "广告创意/设计总监", "Advertising Creative Director"],
                            ["060150", "广告创意/设计经理/主管", "Advertising Creative Manager/Supervisor"],
                            ["470004", "广告创意/设计师", "Advertising Designer"],
                            ["470005", "文案/策划", "Copywriter/Planner"],
                            ["470008", "美术指导", "Art Director"],
                            ["470012", "制作执行", "Event executive"],
                            ["470014", "广告/会展项目管理", "Advertising/Exhibition Project Management"],
                            ["470001", "广告客户总监", "Advertising Account Director"],
                            ["060170", "广告客户经理/主管", "Advertising Account Manager/Supervisor"],
                            ["470002", "广告客户专员", "Advertising Account Executive"],
                            ["470006", "广告/会展业务拓展", "Advertising/Exhibition BD"],
                            ["060070", "会务/会展经理/主管", "Exhibition/Event Manager/Supervisor"],
                            ["470009", "会务/会展专员/助理", " Exhibition Specialist/Assistant"],
                            ["470010", "会展策划/设计", "Exhibition Planning /Design"]
                        ]
                    ],
                    "595": [
                        ["595", "影视/媒体", "Film Entertainment/Media"],
                        [
                            ["250100", "影视策划/制作/发行", "Film Planning/Production/Distribution"],
                            ["250110", "导演/编导", "Director/Choreographer"],
                            ["250090", "艺术/设计总监", "Artistic/Design Director"],
                            ["250120", "摄影/摄像", "Photographer/Videographer"],
                            ["250130", "录音/音效师", "Recording/Audio Engineer"],
                            ["250160", "主持人/播音员", "Host/Broadcaster"],
                            ["480001", "后期制作", "Postproduction"],
                            ["480002", "放映管理", "Projection Management"]
                        ]
                    ],
                    "596": [
                        ["596", "艺术/设计", "Art/Design"],
                        [
                            ["240151", "创意指导/总监", "Creative Director/Director"],
                            ["240153", "平面设计总监/经理", "Graphic Design Director/Manager"],
                            ["240010", "平面设计经理/主管", "Graphic Design Manager/Supervisor"],
                            ["240080", "平面设计师", "Graphic Designer"],
                            ["240020", "美术/图形设计", "Art/Graphic Design"],
                            ["240152", "绘画", "Graphic Illustrator"],
                            ["240157", "原画师", "Original Artist"],
                            ["240120", "3D设计/制作", "3D Design/Production"],
                            ["240110", "多媒体/动画设计", "Multimedia/Animation Design"],
                            ["240156", "CAD设计/制图", "CAD design/drafting"],
                            ["240090", "媒体广告设计", "Media Advertising"],
                            ["240030", "工业/产品设计", "Industrial/Product Design"],
                            ["240060", "工艺品/珠宝设计", "Crafts/Jewelry Design"],
                            ["240070", "家具/家居设计", "Furniture/Household Product Design"],
                            ["240155", "玩具设计", "Toy Design"],
                            ["240130", "展示/陈列设计", "Exhibition/Display Design"],
                            ["240125", "包装设计", "Packaging Design"]
                        ]
                    ],
                    "597": [
                        ["597", "教育/培训", "Education/Training"],
                        [
                            ["260009", "校长", "School Principal"],
                            ["260010", "教学/教务管理人员", "Teaching/Educational Administration"],
                            ["260030", "大学教师/教授", "Professor"],
                            ["260052", "职业中专/技校教师", "Vocational Technical Secondary School/Technical School Teacher"],
                            ["260051", "高中教师", "High School Teacher"],
                            ["260053", "初中教师", "Junior high school teacher"],
                            ["260054", "小学教师", "Grade School Teacher"],
                            ["260020", "幼教", "Preschool Education"],
                            ["260057", "理科老师", "Science teacher"],
                            ["260058", "文科老师", "Liberal Arts Teacher"],
                            ["260059", "外语老师", "Foreign language teacher"],
                            ["260055", "音乐教师", "Music Teacher"],
                            ["260056", "美术教师", "Art Teacher"],
                            ["260070", "体育教师/教练", "Physical Teacher/Coach"],
                            ["260072", "培训督导", "Supervision Training"],
                            ["260071", "培训师/讲师", "Teacher/Trainer"],
                            ["260073", "培训助理/助教", "Training Assistant"],
                            ["260075", "培训策划", "Training Planning"],
                            ["260074", "培训/招生/课程顾问", "Enrollment/Course Consultant"],
                            ["260077", "教育产品开发", "Education Product Development"]
                        ]
                    ],
                    "598": [
                        ["598", "实习生/培训生/储备干部", "Intern/Trainee/Associate Trainee"],
                        [
                            ["310020", "实习生", "Intern"],
                            ["310040", "培训生", "Trainee"],
                            ["310050", "储备干部", "Associate Trainee"]
                        ]
                    ],
                    "599": [
                        ["599", "交通/运输", "Traffic Service"],
                        [
                            ["340018", "列车车长/司机", "Train Driver"],
                            ["292050", "列车乘务", "Train Crew"],
                            ["292030", "船长/副船长", "Fleet Captain"],
                            ["292070", "船舶乘务", "Shipping Service"],
                            ["340015", "飞机机长/副机长", "Flight Captain"],
                            ["292010", "航空乘务", "Airline Crew"],
                            ["292020", "地勤人员", "Ground Attendant"]
                        ]
                    ],
                    "600": [
                        ["600", "物流/仓储", "Logistics/Warehouse"],
                        [
                            ["160190", "物流总监", "Logistics Director"],
                            ["160090", "物流经理/主管", "Logistics manager/Supervisor"],
                            ["160200", "物流专员/助理", "Logistics Specialist/Assistant"],
                            ["160140", "货运代理", "Freight Forwarder"],
                            ["160130", "运输经理/主管", "Transport Management/Executive"],
                            ["160050", "水运/空运/陆运操作", "Transport Operation"],
                            ["160110", "物料经理/主管", "Materials Manager/Supervisor"],
                            ["160230", "物料专员/助理", "Materials Specialist/Assistant"],
                            ["160250", "海关事务管理", "Customs Affairs Management"],
                            ["160040", "报关员", "Document Management/Customs Agent"],
                            ["160260", "单证员", "Documentation Specialist"],
                            ["160120", "仓库经理/主管", "Warehouse Manager/Supervisor"],
                            ["160160", "物流/仓储调度", "Logistics/Warehousing Dispatcher"],
                            ["160240", "集装箱业务", "Container Operator"],
                            ["160270", "物流/仓储项目管理", "Logistics/Warehousing Project Management"]
                        ]
                    ],
                    "602": [
                        ["602", "贸易", "Trade"],
                        [
                            ["160010", "外贸经理/主管", "Trading Manager/Supervisor"],
                            ["450005", "外贸专员/助理", "Trading Specialist/Assistant"],
                            ["160020", "国内贸易经理/主管", "Domestic Trade manager/Supervisor"],
                            ["450006", "国内贸易专员/助理", "Domestic Trade Specialist/Assistant"],
                            ["160021", "商务经理/主管", "Business Manager/Supervisor"],
                            ["450007", "商务专员/助理", "Business Specialist/Assistant"],
                            ["450008", "业务跟单经理/主管", "Merchandising Manager/Supervisor"],
                            ["450009", "业务跟单员", "Merchandiser"]
                        ]
                    ],
                    "603": [
                        ["603", "医学研发/临床试验", "Medical Research /Clinical Trials"],
                        [
                            ["280070", "医药技术研发管理人员", "Pharmaceutical Technology R&D Management"],
                            ["290010", "生物工程/生物制药", "Biopharmaceutical/Biotechnology"],
                            ["290030", "药品研发", "Medicine R&D"],
                            ["290040", "药品生产/质量管理", "Drug Manufacturing/Quality Management"],
                            ["290094", "医疗器械研发", "Medical Equipment R&D"],
                            ["290097", "医疗器械生产/质量管理", "Medical Equipment Manufacturing/Quality Control"],
                            ["290020", "临床研究员", "Clinical Researcher"],
                            ["290090", "临床数据分析员", "Clinical Data Analyst"],
                            ["290096", "化学分析测试员", "Chemical Analyst"]
                        ]
                    ],
                    "610": [
                        ["610", "医院/医疗/护理", "Hospital/Medicine/Nursing"],
                        [
                            ["280010", "医院管理人员", "Hospital Management"],
                            ["280175", "综合门诊/全科医生", "General Practitioner (GP)"],
                            ["280161", "内科医生", "Doctor Internal Medicine"],
                            ["280166", "外科医生", "Doctor Surgeial"],
                            ["280172", "儿科医生", "Pediatrician"],
                            ["280168", "牙科医生", "Dentist"],
                            ["280167", "专科医生", "Doctor Specialist"],
                            ["280090", "美容/整形师", "Beautician/Plastic Surgeon"],
                            ["280169", "中医科医生", "Chinese Medicine Practioners"],
                            ["280163", "麻醉医生", "Anesthesiologist"],
                            ["280164", "心理医生", "Psychologist/Psychiatrist"],
                            ["280174", "放射科医师", "Radiologist"],
                            ["280173", "验光师", "Optometrist"],
                            ["280110", "药库主任/药剂师", "Drug Storehouse Director/Pharmacist"],
                            ["280020", "医疗技术人员", "Medical Technicians"],
                            ["280030", "理疗师", "Physical Therapist"],
                            ["280120", "针灸推拿", "Acupuncture and Massage"],
                            ["280100", "兽医/宠物医生", "Veterinarian/Pet Doctor"],
                            ["280171", "护理主任/护士长", "Nursing Officer"],
                            ["280162", "护士/护理人员", "Nurse/Medical Assistant"],
                            ["280050", "医药学检验", "Clinical Laboratory"],
                            ["280080", "疾病控制/公共卫生", "Disease Control/Public Health"],
                            ["280165", "营养师", "Dietitian"]
                        ]
                    ],
                    "611": [
                        ["611", "电力/能源/矿产/地质勘查", "Electricity/Energy/Mining/Geological Survey"],
                        [
                            ["120060", "电力工程师/技术员", "Electric Power Engineer"],
                            ["120040", "输电线路工程师", "Transmission Line Engineer"],
                            ["120070", "电力维修技术员", "Electricity Maintenance Technician"],
                            ["120080", "水利/水电工程师", "Water Resources/Water and Electric Engineer"],
                            ["120090", "核力/火力工程师", "Nuclear Power/Fire Engineer"],
                            ["120100", "空调/热能工程师", "Air-Conditioning/Energy Engineers"],
                            ["340050", "地质勘查/选矿/采矿", "Geological Exploration"],
                            ["120110", "石油/天然气技术人员", "Oil/Gas Technician"],
                            ["120160", "冶金工程师", "Metallurgical Engineer"],
                            ["120170", "光伏技术工程师", "Photovoltaic Technology Engineer"],
                            ["120150", "能源/矿产项目管理", "Energy/Mining Project Management"]
                        ]
                    ],
                    "613": [
                        ["613", "化工", "Chemical"],
                        [
                            ["290060", "化工技术应用/化工工程师", "Chemical Technical Application/Chemical Engineer"],
                            ["490001", "化工实验室研究员/技术员", "Chemical Lab Scientist / Technician"],
                            ["490002", "涂料研发工程师", "R&D Chemist Scientist"],
                            ["490003", "配色技术员", "Color Matcher (Technician)"],
                            ["490004", "塑料工程师", "Plastics Engineer"],
                            ["490005", "化妆品研发", "Cosmetics Scientist"],
                            ["490006", "食品/饮料研发", "Food / Beverage Scientist"],
                            ["490007", "造纸研发", "Paper Making Scientist"]
                        ]
                    ],
                    "614": [
                        ["614", "环境科学/环保", "Environmental Science/Environmental"],
                        [
                            ["290070", "环保工程师", "Environmental Engineer"],
                            ["500002", "环境评价工程师", "Environmental Assessment Engineer"],
                            ["500003", "环保检测", "Environmental Inspector"],
                            ["500007", "EHS管理", "EHS Management"],
                            ["500004", "水质检测员", "Water Quality Inspector"],
                            ["500001", "水处理工程师", "Water Treatment Engineer"],
                            ["500005", "固废处理工程师", "Solid Waste Treatment Engineer"],
                            ["500006", "废气处理工程师", "Waste Gas Treatment Engineer"]
                        ]
                    ],
                    "615": [
                        ["615", "公务员/公益事业/科研", "Official/Public Service/Science Research"],
                        [
                            ["300021", "公务员/事业单位人员", "Civil Servant"],
                            ["300010", "科研管理人员", "Research Management"],
                            ["300020", "科研人员", "Researchers"],
                            ["310010", "志愿者", "Volunteer"]
                        ]
                    ],
                    "616": [
                        ["616", "农/林/牧/渔", "Agriculture/Forestry/Animal Husbandry/Fishing"],
                        [
                            ["320040", "农艺师", "Agronomist"],
                            ["340070", "园艺师", "Gardener/Horticulturist"],
                            ["320020", "畜牧师", "Animal Husbandry Technician"],
                            ["320030", "动物营养/饲料研发", "Animal nutrition/Feed Development"]
                        ]
                    ],
                    "652": [
                        ["652", "机械设计/制造", "Mechanical Design/Production"],
                        [
                            ["220010", "机械工程师", "Mechanical Engineer"],
                            ["220030", "机械设计师", "Mechanical Designer"],
                            ["220040", "机械制图员", "Mechanical Draftsman"],
                            ["220240", "机械结构工程师", "Mechanical Structural Engineer"],
                            ["220282", "工艺/制程工程师(PE)", "PE Engineer"],
                            ["220230", "工业工程师(IE)", "IE Engineer"],
                            ["220090", "CNC工程师", "CNC Engineer"],
                            ["220100", "冲压工程师/技师", "Punch Engineer"],
                            ["220110", "夹具工程师/技师", "Clamp Engineer"],
                            ["220020", "模具工程师", "Mold Engineer"],
                            ["220130", "焊接工程师/技师", "Welding Engineer"],
                            ["220080", "注塑工程师/技师", "Injection Engineer"],
                            ["220070", "铸造/锻造工程师/技师", "Casting/Forging Engineer"],
                            ["220120", "锅炉工程师/技师", "Boiler Engineer"],
                            ["220281", "气动工程师", "Pneumatic Engineer"],
                            ["220270", "轨道交通工程师/技师", "Railway Engineer/Technician"],
                            ["220160", "飞机设计与制造", "Aircraft Design & Manufacture"],
                            ["220140", "列车设计与制造", "Train Design & Manufacture"],
                            ["220150", "船舶设计与制造", "Watercraft Design & Manufacture"],
                            ["220190", "食品机械", "Food Machinery"],
                            ["220200", "纺织机械", "Textile Machinery"],
                            ["220060", "精密机械", "Precision Machinery"],
                            ["220280", "材料工程师", "Material Engineer"],
                            ["120130", "制冷/暖通", "HVAC/Refrigeration"],
                            ["220050", "机电工程师", "Electrical and Mechanical Engineers"]
                        ]
                    ],
                    "653": [
                        ["653", "机械设备/维修", "Mechanical Maintenance"],
                        [
                            ["220250", "飞机维修/保养", "Aircraft Repair/Maintenance"],
                            ["220284", "列车维修/保养", "Train Repair/Maintenance"],
                            ["220283", "船舶维修/保养", "Watercraft Repair/Maintenance"],
                            ["220005", "机械设备经理", "Mechanical Equipment Manager"],
                            ["220285", "机械设备工程师", "Mechanical Equipment Engineer"],
                            ["220260", "维修经理/主管", "Maintenance Manager/Supervisor"],
                            ["220170", "维修工程师", "Maintenance Engineer"],
                            ["220210", "设备修理", "Equipment Repair"]
                        ]
                    ],
                    "655": [
                        ["655", "医药注册/推广", "Medical Registration/Marketing"],
                        [
                            ["280130", "药品注册", "Drug Registration"],
                            ["290095", "医疗器械注册", "Medical Equipment Registration"],
                            ["290093", "医药销售经理/主管", "Pharmaceutical Sales Manager"],
                            ["280150", "医药代表", "Medical Representative"],
                            ["290098", "医疗器械销售代表", "Medical Equipment Sales"],
                            ["290102", "医药招商经理/主管", "Pharmaceutical Business Development Manager/Supervisor"],
                            ["290099", "医药招商专员/助理", "Pharmaceutical Business Development Specialist/Assistant"],
                            ["290091", "药品市场推广经理/主管", "Pharmaceutical Promotion Manager/Supervisor"],
                            ["290092", "药品市场推广专员/助理", "Pharmaceutical Promotion Specialist/Assistant"],
                            ["290055", "医疗器械市场推广", "Medical Equipment Marketing"],
                            ["290101", "招投标管理", "Tendering Coordinator"]
                        ]
                    ],
                    "656": [
                        ["656", "汽车制造", "Automobile Manufacture"],
                        [
                            ["420003", "汽车设计工程师", "Automotive Design Engineer"],
                            ["420002", "汽车机构工程师", "Automotive Structural Engineer"],
                            ["420010", "汽车动力系统工程师", "Automobile Power System Engineers"],
                            ["420008", "汽车底盘/总装工程师", "Automobile Chassis/Assembly Engineer"],
                            ["420004", "汽车电子工程师", "Automotive Electronic Engineer"],
                            ["420007", "汽车装配工艺工程师", "Assembly Engineer"],
                            ["420005", "汽车质量工程师", "Automotive Quality Engineer"],
                            ["420006", "汽车安全性能工程师", "Safety Performance Engineer"],
                            ["420001", "汽车项目管理", "Automotive Project Management"]
                        ]
                    ],
                    "657": [
                        ["657", "前端开发", "Front-end Development"],
                        [
                            ["360300", "WEB前端开发工程师", "WEB Front-end Developer"],
                            ["360335", "移动前端开发工程师", "Mobile Front-end Developer"]
                        ]
                    ],
                    "658": [
                        ["658", "BI", "BI"],
                        [
                            ["360320", "BI工程师", "Business Intelligence Engineer"],
                            ["360332", "数据分析师", "Data Analyst"],
                            ["360336", "数据挖掘工程师", "Data Mining Engineer"],
                            ["100350", "计算机辅助设计工程师", "Computer Aided Design Engineer"],
                            ["350020", "仿真应用工程师", "Simulation Application Engineer"]
                        ]
                    ],
                    "659": [
                        ["659", "配置管理", "Configuration Management"],
                        [
                            ["360338", "配置管理经理/主管", "Configuration Management Manager/Supervisor"],
                            ["360337", "配置管理工程师", "Configuration Management Engineer"]
                        ]
                    ],
                    "660": [
                        ["660", "IT管理", "IT Management"],
                        [
                            ["010030", "首席技术官CTO/首席信息官CIO", "Chief Technology Officer/Chief Information Officer"],
                            ["100020", "技术/研发总监", "Technology Director"],
                            ["360339", "技术/研发经理", "Technology Manager"]
                        ]
                    ],
                    "661": [
                        ["661", "IT项目管理", "IT Project Management"],
                        [
                            ["100170", "工程与项目实施", "Engineering and Project Implementation"],
                            ["100370", "项目总监", "Project Director"],
                            ["100060", "项目经理/主管", "Project Manager/Supervisor"],
                            ["100070", "项目执行/协调人员", "Project Specialist/Coordinator"]
                        ]
                    ],
                    "662": [
                        ["662", "IT运维/技术支持", "IT Operation/Technical Support"],
                        [
                            ["360329", "运维总监", "OPS Director"],
                            ["630020", "运维经理/主管", "OPS Manager/Supervisor"],
                            ["360160", "运维工程师", "Maintenance Engineer"],
                            ["360330", "运维开发", "OPS Developer"],
                            ["100030", "信息技术经理/主管", "IT Manager/Supervisor"],
                            ["100040", "信息技术专员", "Information Technology Specialist"],
                            ["360331", "系统工程师", "System Engineer"],
                            ["100330", "网络工程师", "Network Engineer"],
                            ["100190", "数据库管理员(DBA)", "Database Administrator"],
                            ["360328", "IT支持", "IT Surpport"],
                            ["390001", "硬件维护工程师", "Hardware maintenance engineer"],
                            ["100230", "网络信息安全工程师", "Network and Information Security Engineer"],
                            ["100180", "ERP实施顾问", "ERP Implementation"],
                            ["100260", "文档工程师", "Documentation Engineer"]
                        ]
                    ],
                    "663": [
                        ["663", "建筑装潢", "Architectural Decoration"],
                        [
                            ["170130", "室内装潢设计", "Interior Design"],
                            ["170213", "软装设计师", "Soft outfit Designer"],
                            ["170196", "幕墙工程师", "Curtain Wall Engineer"]
                        ]
                    ],
                    "664": [
                        ["664", "房地产规划/开发", "Real Estate Development"],
                        [
                            ["170070", "房地产项目策划经理/主管", "Real Estate Planning Manager/Supervisor"],
                            ["510001", "房地产项目策划专员/助理", "Real Estate Planning Specialist/Assistant"],
                            ["510003", "房地产项目招投标", "Real Estate Tender /Bidding"],
                            ["170198", "开发报建经理/主管", "Applying for Construction Manager/Supervisor"],
                            ["170204", "开发报建专员/助理", "Applying for Construction Specialist/Assistant"],
                            ["510011", "规划设计总监", "Planning Director"],
                            ["510019", "规划设计经理/主管", "Planning Manager/Supervisor"],
                            ["510012", "规划设计师", "Planning Designer"],
                            ["510002", "配套经理/主管", "Real Estate Supporting Manager/Supervisor"],
                            ["510010", "配套工程师", "Real Estate Supporting Engineer"],
                            ["510016", "房地产项目管理", "Real Estate Project Management"],
                            ["510017", "房地产项目运营", "Real Estate Project Operation"],
                            ["510014", "成本总监", "Cost Accounting Director"],
                            ["510015", "成本经理/主管", "Cost Accounting Manager/Supervisor"],
                            ["510005", "房地产资产管理", "Real Estate Asset Management"],
                            ["510004", "房地产投资分析", "Real Estate Investment Analysis"]
                        ]
                    ],
                    "665": [
                        ["665", "房地产交易/中介", "Real Estate Agent/Broker"],
                        [
                            ["170160", "房地产交易/中介", "Real Estate Agent/Broker"],
                            ["510006", "房地产销售经理/主管", "Real Estate Sales Manager/Supervisor"],
                            ["510007", "房地产销售人员", "Real Estate Sales"],
                            ["510008", "房地产招商", "Real Estate Investment"],
                            ["170080", "房地产评估", "Real Estate Appraisal"]
                        ]
                    ],
                    "666": [
                        ["666", "质量管理/安全防护", "Quality Management/Safety Protection"],
                        [
                            ["050010", "质量管理/测试经理(QA/QC经理)", "QA/QC Manager"],
                            ["050020", "质量管理/测试主管(QA/QC主管)", "QA/QC Supervisor"],
                            ["050030", "质量检测员/测试员", "Quality Inspector/Tester"],
                            ["050070", "认证工程师/审核员", "Certification Engineer/Auditor"],
                            ["050080", "体系工程师/审核员", "Systems Engineer/Auditor"],
                            ["050060", "环境/健康/安全(EHS)经理/主管", "EHS Manager/Supervisor"],
                            ["050110", "环境/健康/安全(EHS)工程师", "EHS Engineer"],
                            ["050090", "可靠度工程师", "Reliability Engineer"],
                            ["050100", "故障分析工程师", "Failure Analysis Engineer"],
                            ["340020", "安全防护/安全管理", "Safety Protection"],
                            ["050040", "供应商/采购质量管理", "Supplier/Purchasing Quality Management"]
                        ]
                    ],
                    "667": [
                        ["667", "项目管理/项目协调", "Project Management"],
                        [
                            ["040010", "项目总监", "Project Director"],
                            ["040020", "项目经理/主管", "Project Manager/Supervisor"],
                            ["040040", "项目专员/助理", "Project Specialist/Assistant"]
                        ]
                    ],
                    "668": [
                        ["668", "写作/采编/出版", "Writing/Newspaper/Publishing"],
                        [
                            ["250020", "总编/副总编", "General Editor/Deputy Editor"],
                            ["250250", "记者/采编", "Reporter"],
                            ["250190", "电话采编", "Telephone Reporter"],
                            ["250030", "文字编辑/组稿", "Copy Editor"],
                            ["250040", "美术编辑", "Art Editor"],
                            ["250070", "校对/录入", "Proofreading/Copy Entry"],
                            ["250010", "作家/编剧/撰稿人", "Writer/Screenwriter"],
                            ["250080", "排版设计", "Layout Design"],
                            ["250050", "发行管理", "Distribution Management"]
                        ]
                    ],
                    "669": [
                        ["669", "其他", "Others"],
                        [
                            ["340080", "其他", "Others"]
                        ]
                    ],
                    "670": [
                        ["670", "采购", "Purchasing"],
                        [
                            ["450001", "采购总监", "Purchasing Director"],
                            ["160070", "采购经理/主管", "Purchasing Executive/Manager/Director"],
                            ["450002", "采购专员/助理", "Purchasing Specialist/Assistant"],
                            ["450003", "买手", "Buyer"],
                            ["450004", "供应商开发", "Supplier Development"]
                        ]
                    ],
                    "hot-06": [
                        ["hot-06", "销售/客服/技术支持", "Sales/Customer Service/Technical Support"]
                    ]
                },
                "industryJobMapping": {
                    "100": ["553", "554", "663", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "110": ["665", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "120": ["589", "591", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "130": ["556", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "140": ["557", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "150": ["558", "559", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "160": ["602", "670", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "170": ["595", "668", "585", "596", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "180": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "190": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "200": ["571", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "210": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "220": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "230": ["569", "593", "592", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "240": ["569", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "250": ["599", "600", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "260": ["593", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "270": ["603", "655", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "280": ["610", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "290": ["603", "655", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "300": ["614", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "310": ["613", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "320": ["611", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "330": ["611", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "340": ["549", "652", "653", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "350": ["656", "579", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "360": ["652", "653", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "370": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "380": ["597", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "390": ["615", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "400": ["669", "598", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "410": ["616", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "420": ["542", "657", "658", "546", "545", "547", "543", "659", "660", "661", "662", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "430": ["530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "440": ["530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "450": ["666", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "460": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "470": ["564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "480": ["652", "653", "599", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "490": ["611", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "500": ["563", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "510": ["665", "555", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "010": ["542", "657", "658", "546", "545", "547", "543", "659", "660", "661", "662", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "030": ["542", "657", "658", "546", "545", "547", "543", "659", "660", "661", "662", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "040": ["542", "657", "658", "546", "545", "547", "543", "659", "660", "661", "662", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "020": ["551", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "050": ["549", "564", "565", "566", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "060": ["550", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "080": ["664", "553", "554", "663", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "090": ["665", "555", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"],
                    "070": ["594", "530", "531", "532", "533", "534", ["hot-06", ["535", "536", "537", "538"]], "539", "540", "667"]
                }
            }
        },
        "Fu54": function(module, exports, __webpack_require__) {
            "use strict";
            (function(global) {
                function _classCallCheck(instance, Constructor) {
                    if(!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
                }
                var _createClass = function() {
                        function defineProperties(target, props) {
                            for(var i = 0; i < props.length; i++) {
                                var descriptor = props[i];
                                descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                            }
                        }
                        return function(Constructor, protoProps, staticProps) {
                            return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                        }
                    }(),
                    CoreClass = function() {
                        function CoreClass() {
                            return _classCallCheck(this, CoreClass), this.tpls = {}, this.scripts = {}, this.datas = {}, this._initTpls()._initScripts(), this
                        }
                        return _createClass(CoreClass, [{
                            "key": "_generate",
                            "value": function() {
                                return Math.random().toString().replace(".", "")
                            }
                        }, {
                            "key": "_initTpls",
                            "value": function() {
                                var $NODETPL = this;
                                return this.tpls = {
                                    "main": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid(), _ += "<style>#" + guid + ' {  width: auto;  font-family: "Microsoft YaHei";  color: #666;  background: #f9f9f9;}#' + guid + " .set-search {  padding: 40px 100px 40px 50px;}#" + guid + " .set-search-l,#" + guid + " .icon-48-arrowr,#" + guid + " .set-search-r {  display: inline-block;  zoom: 1;  *display: inline;  vertical-align: middle;  position: relative;}#" + guid + " .set-search-l ul,#" + guid + " .set-search-r ul {  width: 125px;  padding: 0 15px 10px 15px;  height: 255px;  border: 1px solid #ddd;  overflow-y: auto;  margin-top: 10px;  background: #fff;}#" + guid + " .set-search-l ul li,#" + guid + " .set-search-r ul li {  height: 20px;  line-height: 20px;  cursor: pointer;  margin-top: 10px;  padding: 0 7px;}#" + guid + " .set-search-l ul li.hover {  background: #e1f4ff;}#" + guid + " .set-search-r ul li.hover {  background: #f2f2f2;}#" + guid + " .set-search-r ul li a {  float: right;}#" + guid + " .set-search-r ul li a:hover {  text-decoration: none;}#" + guid + " .set-search-r ul li.active {  background: #fff3e1;}#" + guid + " .set-search-gray ul li,#" + guid + " .set-search-gray ul li.hover {  color: #ddd;  background: none;  cursor: inherit;}#" + guid + " .move {  position: absolute;  top: 100px;  left: 170px;}#" + guid + " .move a {  display: block;  width: 50px;  text-align: center;  height: 22px;  background: #f7fcff;  border: 1px solid #d5e9f3;  margin: 20px 3px;  position: relative;}#" + guid + " .move a:hover {  border: 1px solid #bfdeed;}#" + guid + " .move a i {  position: absolute;  width: 0px;  height: 0px;  left: 7px;  border-style: solid;  border-width: 4px;}#" + guid + " .move .move-up i {  top: 5px;  border-color: transparent transparent #1b79a8 transparent;  *top: 4px;  *border-width: 5px;}#" + guid + " .move .move-down i {  top: 8px;  border-color: #1b79a8 transparent transparent transparent;  *top: 9px;}#" + guid + " .close {  color: #c22;  font-weight: bold;  display: none;}#" + guid + " .dialog-bottom {  line-height: 30px;  text-align: center;  padding-bottom: 20px;}</style>";
                                        try {
                                            _ += '<div id="' + guid + '"><div class="fields"></div></div>'
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA),
                                            function(scripts) {
                                                var cache = "undefined" != typeof window ? window : void 0 !== global ? global : {};
                                                cache._nodetpl_ = cache._nodetpl_ || {}, cache._nodetpl_[guid + "-" + duid] = scripts["main"]
                                            }($NODETPL.scripts), _ += "<script>\n", _ += "(function(){\n", _ += "  var cache = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : {};\n", _ += "  cache._nodetpl_['" + guid + "-" + duid + "']('" + guid + "', '" + duid + "');\n", _ += "  delete cache._nodetpl_['" + guid + "-" + duid + "'];\n", _ += "})();\n", _ += "<\/script>\n"
                                    }.bind(this),
                                    "view": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            _ += '<div class="set-search">\n  <div class="set-search-l">\n    <p>点击添加搜索条件：</p>\n    <ul>\n      <li data-key="language">简历语言</li>\n      <li data-key="titleKeys">职位名称</li>\n      <li data-key="company">公司名称</li>\n      <li data-key="industrys">所在行业</li>\n      <li data-key="jobtitles">职能类别</li>\n      <li data-key="salarylow">目前年薪</li>\n      <li data-key="dqs">目前工作地区</li>\n      <li data-key="workyearslow">工作年限</li>\n      <li data-key="wantindustry">期望行业</li>\n      <li data-key="wantjobtitle">期望职能</li>\n      <li data-key="wantsalarylow">期望年薪</li>\n      <li data-key="wantdqs">期望工作地区</li>\n      <li data-key="sex">性别</li>\n      <li data-key="agelow">年龄</li>\n      <li data-key="marriage">婚姻状况</li>\n      <li data-key="language_skills">语言能力</li>\n      <li data-key="edulevellow">学历</li>\n      <li data-key="professions">专业名称</li>\n      <li data-key="nowCompKind">所在公司性质</li>\n      <li data-key="modifytimeType">更新时间</li>\n      <li data-key="userHope">求职状态</li>\n    </ul>\n  </div>\n  <div class="icon-48 icon-48-arrowr"></div>\n  <div class="set-search-r">\n    <p></p>\n    <ul>\n      \n    </ul>\n    <div class="move">\n      <a class="move-up" href="javascript:;">向上移</a>\n      <a class="move-down" href="javascript:;">向下移</a>\n    </div>\n  </div>\n</div>\n<div class="dialog-bottom">\n  <input type="button" data-selector="save" class="btn btn-primary btn-small" name="" value="保存" />\n  <a class="btn btn-light btn-small" data-selector="cancel" href="javascript:;">取消</a>\n</div>'
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA),
                                            function(scripts) {
                                                var cache = "undefined" != typeof window ? window : void 0 !== global ? global : {};
                                                cache._nodetpl_ = cache._nodetpl_ || {}, cache._nodetpl_[guid + "-" + duid] = scripts["view"]
                                            }($NODETPL.scripts), _ += "<script>\n", _ += "(function(){\n", _ += "  var cache = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : {};\n", _ += "  cache._nodetpl_['" + guid + "-" + duid + "']('" + guid + "', '" + duid + "');\n", _ += "  delete cache._nodetpl_['" + guid + "-" + duid + "'];\n", _ += "})();\n", _ += "<\/script>\n"
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "_initScripts",
                            "value": function() {
                                var $NODETPL = this;
                                return this.scripts = {
                                    "main": function(guid, duid) {
                                        var ROOT = document.getElementById(guid),
                                            $TPLS = (document.getElementById(guid + duid), $NODETPL.tpls),
                                            $DATA = $NODETPL.datas[duid];
                                        $(ROOT).bind("refresh", function(event, data) {
                                            $(this).find(".fields").html($TPLS["view"](data, guid))
                                        }).trigger("refresh", [$DATA])
                                    }.bind(this),
                                    "view": function(guid, duid) {
                                        var ROOT = document.getElementById(guid),
                                            $DATA = (document.getElementById(guid + duid), $NODETPL.tpls, $NODETPL.datas[duid]);
                                        $DATA.init && $DATA.init.call($(ROOT));
                                        var ulL = $(".set-search-l ul", ROOT),
                                            ulR = $(".set-search-r ul", ROOT),
                                            num = function() {
                                                var selectNum = ulR.find("li").length,
                                                    lastNum = 14 - selectNum;
                                                selectNum < 6 ? ($(".set-search-r").find("p").html('最少选5项，<span class="text-warning">还可以选' + lastNum + "个</span>"), $(".set-search-l").removeClass("set-search-gray")) : selectNum > 13 ? ($(".set-search-r").find("p").text("最多选14项"), $(".set-search-l").addClass("set-search-gray")) : ($(".set-search-r").find("p").html('最多选14项，<span class="text-warning">还可以选' + lastNum + "个</span>"), $(".set-search-l").removeClass("set-search-gray"))
                                            };
                                        num(), ulL.delegate("li", "click", function() {
                                            if(ulR.find("li").length > 13) return $(".set-search-l").addClass("set-search-gray"), !1;
                                            $(".set-search-l").removeClass("set-search-gray"), $(this).removeClass("hover").prepend('<a class="close">&times;</a>').appendTo(ulR), num()
                                        }), ulR.delegate(".close", "click", function(event) {
                                            $(this).closest("li").removeClass("hover").removeClass("active").appendTo(ulL).find(".close").remove(), event.stopPropagation(), num()
                                        }), ulR.delegate("li", "click", function() {
                                            $(this).removeClass("hover").addClass("active").siblings().removeClass("active")
                                        }), $(".move-up").click(function() {
                                            var index = ulR.find(".active");
                                            index.prev().before(index)
                                        }), $(".move-down").click(function() {
                                            var index = ulR.find(".active");
                                            index.next().after(index)
                                        }), ulR.delegate("li", "mouseenter", function() {
                                            $(this).find(".close").show()
                                        }).delegate("li", "mouseleave", function() {
                                            $(this).find(".close").hide()
                                        }), $(".set-search-l ul li, .set-search-r ul li").hover(function() {
                                            $(this).addClass("hover").siblings().removeClass("hover")
                                        }, function() {
                                            $(this).removeClass("hover")
                                        });
                                        for(var i = 0; i < $DATA.data.length; i++) ulL.find("li").each(function(index) {
                                            $(this).attr("data-key") === $DATA.data[i] && $(this).trigger("click")
                                        });
                                        $("[data-selector='save']", ROOT).click(function() {
                                            var arry = [],
                                                string = "",
                                                selectNum = ulR.find("li").length;
                                            ulR.find("li").each(function(index) {
                                                $(this).find("a").remove(".close");
                                                var text = $(this).attr("data-key");
                                                arry.push(text)
                                            }), string = arry.join(","), selectNum < 5 ? vdialog.alert("最少选5项!") : $.ajax({
                                                "url": "/search/saveConditionItem.json",
                                                "type": "POST",
                                                "data": {
                                                    "key": string
                                                },
                                                "dataType": "json",
                                                "cache": !1,
                                                "success": function(data) {
                                                    1 === data.flag ? $DATA.callback && $DATA.callback.call($(ROOT)) : vdialog.alert(data.msg)
                                                }
                                            })
                                        }), $("[data-selector='cancel']", ROOT).on("click", function() {
                                            vdialog.top.close()
                                        })
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "duid",
                            "value": function() {
                                return "nodetpl_d_" + this._generate()
                            }
                        }, {
                            "key": "guid",
                            "value": function() {
                                return "nodetpl_g_" + this._generate()
                            }
                        }, {
                            "key": "escapeHtml",
                            "value": function(html) {
                                return html ? html.toString().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;") : html
                            }
                        }, {
                            "key": "render",
                            "value": function(data, guid) {
                                return this.tpls.main(data, guid || this.guid())
                            }
                        }]), CoreClass
                    }();
                module.exports = {
                    "render": function(data) {
                        return(new CoreClass).render(data)
                    }
                }
            }).call(exports, __webpack_require__("DuR2"))
        },
        "Kymm": function(module, exports, __webpack_require__) {
            "use strict"
        },
        "LOfQ": function(module, exports, __webpack_require__) {
            "use strict";
            function _classCallCheck(instance, Constructor) {
                if(!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
            }
            var _createClass = function() {
                function defineProperties(target, props) {
                    for(var i = 0; i < props.length; i++) {
                        var descriptor = props[i];
                        descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                    }
                }
                return function(Constructor, protoProps, staticProps) {
                    return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                }
            }();
            __webpack_require__("PR4X"), __webpack_require__("C4Cc"), __webpack_require__("qVS6"), __webpack_require__("fymN"), __webpack_require__("seXx"), __webpack_require__("TY+L"), __webpack_require__("fNiJ"), __webpack_require__("6oEu"), __webpack_require__("VLH3"), __webpack_require__("JTWm"), __webpack_require__("dwV2"), __webpack_require__("2B4+"), __webpack_require__("KKuy");
            var container = $(".form-group"),
                form = container,
                side = $(".resume-search-list", container),
                ul = $("ul", side),
                $CONFIG = window.$CONFIG || {},
                num = $CONFIG.subscription_num,
                lastNum = function() {
                    var realNum = num - ul.find("li").find(".icon-subscribe-yes").length;
                    $(".resume-search-list h2 i").text(realNum > 0 ? realNum : 0)
                };

            new(function() {
                function Resume() {
                    _classCallCheck(this, Resume), this.initLoad()
                }
                return _createClass(Resume, [{
                    "key": "initLoad",
                    "value": function() {
                        var wantdqs = $("[data-selector='wantdqs']").attr("data-option");
                        var dqs = $("[data-selector='dqs']").attr("data-option");
                        var industrys = $("[data-selector='industrys']").attr("data-option");
                        wantdqs = parseInt(wantdqs);
                        dqs = parseInt(dqs);
                        industrys = parseInt(industrys);
                        form.trigger("reset"), $(".checkbox", form).CheckboxUI(), $("[data-selector='industrys']", form).LocalDataIndustries({
                            "max": industrys?industrys:3,
                            "all": !1,
                            "init": function() {
                                var dom = $(this.element).next(".LocalDataUID");
                                dom.find(".LocalDataUID-input").addClass("form-control");
                                window.tlog = window.tlog || [], dom.find(".LocalDataUID-input").one("keyup", function() {
                                    window.tlog.push("c:C000010753")
                                }), dom.find(".drop").one("click", function() {
                                    window.tlog.push("c:C000010756")
                                })
                            }
                        }), $("[data-selector='wantindustrys']", form).LocalDataIndustries({
                            "max": 3,
                            "all": !1,
                            "init": function() {
                                var dom = $(this.element).next(".LocalDataUID");
                                dom.find(".LocalDataUID-input").addClass("form-control");
                                window.tlog = window.tlog || [], dom.find(".LocalDataUID-input").one("keyup", function() {
                                    window.tlog.push("c:C000010753")
                                }), dom.find(".drop").one("click", function() {
                                    window.tlog.push("c:C000010756")
                                })
                            }
                        }), $("[data-selector='jobtitles']", form).LocalDataJobs({
                            "max": 5,
                            "all$": !0,
                            "init": function() {
                                var dom = $(this.element).next(".LocalDataUID");
                                dom.find(".LocalDataUID-input").addClass("form-control");
                                window.tlog = window.tlog || [], dom.find(".LocalDataUID-input").one("keyup", function() {
                                    window.tlog.push("c:C000010754")
                                }), dom.find(".drop").one("click", function() {
                                    window.tlog.push("c:C000010755")
                                })
                            }
                        }), $("[data-selector='wantjobtitles']", form).LocalDataJobs({
                            "max": 5,
                            "all$": !0,
                            "init": function() {
                                var dom = $(this.element).next(".LocalDataUID");
                                dom.find(".LocalDataUID-input").addClass("form-control");
                                window.tlog = window.tlog || [], dom.find(".LocalDataUID-input").one("keyup", function() {
                                    window.tlog.push("c:C000010754")
                                }), dom.find(".drop").one("click", function() {
                                    window.tlog.push("c:C000010755")
                                })
                            }
                        }), $("[data-selector='dqs']", form).LocalDataCity({
                            "all": !1,
                            "max": dqs?dqs:3,
                            "ui": {
                                "name": "C",
                                "width": 285
                            }
                        }), $("[data-selector='wantdqs']", form).LocalDataCity({
                            "all": !1,
                            "max": wantdqs?wantdqs:3,
                            "ui": {
                                "name": "C",
                                "width": 285
                            },"init": function() {
                                $(".LocalDataUIB-input").addClass("form-control");
                            }
                        }),  $(".spread-others").find(":checkbox").change(function() {
                            $(this).is(":checked") ? $(".spread-others").find(".text").show() : $(".spread-others").find(".text").hide()
                        }), form.valid({
                            "scan": function(data) {
                                data.valid ? form.find(".text-error").removeClass("text-error") : ($.each(data.result, function(i, n) {
                                    !n.valid && n.element.trigger("highlight", !0)
                                }), data.firstError.element.triggerHandler("focus"))
                            },
                            "dyncheck": {
                                "nowsalary": function() {
                                    var salarylow = $('input[name="salarylow"]', form).val(),
                                        salaryhigh = $('input[name="salaryhigh"]', form).val();
                                    return "不限" !== salaryhigh && isNaN(salaryhigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "请输入数字！"
                                    } : parseInt(salarylow) > parseInt(salaryhigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "年薪范围输入不正确！"
                                    } : void 0
                                },
                                "wantsalary": function() {
                                    var salarylow = $('input[name="wantsalarylow"]', form).val(),
                                        salaryhigh = $('input[name="wantsalaryhigh"]', form).val();
                                    return "不限" !== salaryhigh && isNaN(salaryhigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "请输入数字！"
                                    } : parseInt(salarylow) > parseInt(salaryhigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "年薪范围输入不正确！"
                                    } : void 0
                                },
                                "WorkYear": function() {
                                    var workyearslow = $("input[name='workyearslow']", form).val(),
                                        workyearshigh = $("input[name='workyearshigh']", form).val();
                                    return "不限" !== workyearshigh && isNaN(workyearshigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "请输入数字！"
                                    } : parseInt(workyearslow) > parseInt(workyearshigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "工作年限范围输入不正确！"
                                    } : void 0
                                },
                                "Age": function() {
                                    var agelow = $("input[name='agelow']", form).val(),
                                        agehigh = $("input[name='agehigh']", form).val();
                                    return "不限" !== agehigh && isNaN(agehigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "请输入数字！"
                                    } : parseInt(agelow) > parseInt(agehigh) ? {
                                        "valid": !1,
                                        "customErrorMsg": "年龄范围输入不正确！"
                                    } : void 0
                                }
                            },
                            "dynrule": {
                                "Other": function() {
                                    return $(this).closest(".spread-others").find(":checkbox").is(":checked") ? [
                                        ["required", "请输入$"]
                                    ] : []
                                }
                            },
                            "success": function() {
                                var filter = ["form_submit", "company_type", "anykeys"];
                                return !!form.serializeArray().filter(function(v) {
                                    return !($.inArray(v.name, filter) > -1)
                                }).some(function(v) {
                                    return "" !== v.value
                                }) || function() {
                                    vdialog.alert("请输入搜索条件后再搜索 ！")
                                }()
                            }
                        }), $("[validate-rules]", form).SimpleValidTips(), $(".radio", form).RadioUI(), $("input.is-placeholder").PlaceholderUI()
                    }
                },  ]), Resume
            }())
        },
        "LRTM": function(module, exports, __webpack_require__) {
            "use strict";
            __webpack_require__("t3D4"),
                function($, window, undefined) {
                    function Plugin(element, options) {
                        this.element = element, this.options = $.extend({}, defaults, options), this.ui = {}, this._name = pluginName, this.init()
                    }
                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataUIC",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "width": 0,
                            "maxwidth": 0,
                            "maxLength": 0,
                            "height": "auto",
                            "filter": function(arr) {
                                var _arr = [];
                                arr = arr || [];
                                for(var i = 0; i < arr.length; i++) _arr.push([arr[i], arr[i]]);
                                return _arr
                            },
                            "drop": $.noop,
                            "disabled": !1,
                            "callback": !1
                        };
                    Plugin.prototype._margin = function(element, dir) {
                        return parseInt(element.css("margin-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._border = function(element, dir) {
                        return parseInt(element.css("border-" + dir + "-width").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._padding = function(element, dir) {
                        return parseInt(element.css("padding-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._lineHeight = function(element) {
                        return parseInt(element.css("line-height").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype.init = function() {
                        var that = this,
                            ui = {},
                            $element = $(that.element);
                        return $element.attr("data-ui", that._name), ui.helper = $("<span />").attr("data-name", $element.attr("name") || "").addClass($element.attr("class") + " " + that._name).bind("click." + that._name, function(event) {
                            if(that.disabled()) return event.stopPropagation(), !1;
                            that.options.drop && that.options.drop.apply(window)
                        }).insertAfter($element.hide()), ui.helper.hasClass("text") && ui.helper.removeClass("text").addClass("simulation-text " + pluginName + "-simulation-text").css({
                            "font-size": $element.css("font-size")
                        }), that.disabled() && ui.helper.addClass(pluginName + "-disabled"), $("<span />").addClass("items").css({
                            "left": that._padding($element, "left")
                        }).appendTo(ui.helper), ui.element = $('<input type="text" readonly="readonly" unselectable="on" />').addClass(that._name + "-input").css({
                            "width": "0",
                            "text-indent": $element.css("text-indent"),
                            "height": $element.css("height"),
                            "line-height": $element.css("line-height"),
                            "font-size": $element.css("font-size"),
                            "font-family": $element.css("font-family"),
                            "padding-top": $element.css("padding-top"),
                            "margin-top": -that._padding($element, "top")
                        }).appendTo(ui.helper).bind("blur." + this._name, function() {
                            $element.trigger("blur")
                        }), ui.drop = $("<em />").addClass("drop").attr("data-nick", that.options.dataNick || "").appendTo(ui.helper).height($element.innerHeight() + that._border($element, "top") + that._border($element, "bottom")).css({
                            "margin-top": -that._border($element, "top")
                        }), that.options.width ? ui.helper.width(that.options.width + ui.helper.find("em.drop").width() - that._padding(ui.helper, "right")) : ui.helper.width($element.innerWidth() - that._padding($element, "left") - that._padding($element, "right")), ui.placeholder = $("<i />").addClass("placeholder").css({
                            // "line-height": ui.element.outerHeight() + "px",
                            "padding-left": that._padding(ui.element, "left") + that._border(ui.helper, "left"),
                            "text-indent": ui.element.css("text-indent"),
                            "font-size": ui.element.css("font-size"),
                            "font-family": ui.element.css("font-family"),
                            "margin-top": -that._padding(ui.element, "top") + that._border(ui.helper, "top")
                        }).prependTo(ui.helper).text($element.attr("placeholder") || "").bind("click." + this._name, function(event) {
                            ui.helper.trigger("click"), event.stopPropagation()
                        }), ui.focus = function(handler) {
                            return handler ? ui.element.triggerHandler("focus") : ui.element.trigger("focus"), ui
                        }, that.ui = ui, that.options && that.options.init && that.options.init.call(that), that
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? !!("boolean" == typeof that.options.disabled && !0 === that.options.disabled || "function" == typeof that.options.disabled && !0 === that.options.disabled()) : (that.options.disabled = disabled, that.ui.helper[disabled ? "addClass" : "removeClass"](pluginName + "-disabled"), that)
                    }, Plugin.prototype.fetch = function() {
                        return this
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            $element = $(that.element),
                            val = $element.val(),
                            uiUpdater = function() {
                                var list = that.ui.helper.find("span.items"),
                                    fixSize = that.ui.helper.find("em.drop").width() - that._padding(that.ui.helper, "right");
                                if($element.val() ? that.ui.placeholder && that.ui.placeholder.hide() : that.ui.placeholder && that.ui.placeholder.show(), that.options.width) {
                                    var width = 0;
                                    "number" == typeof that.options.width ? width = that.options.width : (list.children("span").each(function() {
                                        width += $(this).outerWidth(!0)
                                    }), that.options.maxwidth && width > that.options.maxwidth && (width = that.options.maxwidth), width = Math.max(width, $element.width() - fixSize)), list.width(width), that.ui.helper.width(width + fixSize)
                                }
                                if(that.options.height) {
                                    list.css({
                                        "height": "auto"
                                    });
                                    var height = list.height();
                                    height = "number" == typeof that.options.height ? that.options.height : list.height(), that.options.maxheight && height > that.options.maxheight && (height = that.options.maxheight), height = Math.max(height, $element.height()), 0 === height && (height = "auto"), list.css({
                                        "height": height + "px",
                                        "line-height": $element.height() + "px"
                                    }), that.ui.helper.css({
                                        "height": height + "px",
                                        "line-height": $element.height() + "px"
                                    });
                                    var _closeHeight = list.find("a.close").outerHeight();
                                    list.find("a.close").css({
                                        "top": ($element.height() - _closeHeight) / 2 + "px"
                                    })
                                }
                                that.ui.drop.height(("auto" === height ? 25 : that.ui.helper.innerHeight()) + that._border($element, "top") + that._border($element, "bottom"))
                            },
                            itemLongString = "",
                            itemLength = 0,
                            items = that.options.filter.call(that, val.split(",")),
                            itemcode = [],
                            list = that.ui.helper.find("span.items").empty();
                        if(that.options.maxLength > 0) {
                            for(var i = 0; i < items.length; i++) itemLongString += items[i][1];
                            LT.String.realLength(itemLongString) > that.options.maxLength && (itemLength = Math.floor(that.options.maxLength / items.length))
                        }
                        for(var _i = 0; _i < items.length; _i++) {
                            itemcode.push(items[_i][0]);
                            $("<span />").attr("data-id", items[_i][0]).text(0 === itemLength ? items[_i][1] : LT.String.substr(items[_i][1], 0, itemLength, "...")).append('<a class="close" />').appendTo(list).bind("click." + pluginName, function(event) {
                                event.stopPropagation()
                            }).find("a.close").bind("click." + pluginName, function(event) {
                                if(that.disabled()) return event.stopPropagation(), !1;
                                var code = $(this).closest("span").attr("data-id");
                                items = items.filter(function(item) {
                                    return item[0] !== code
                                }), $element.val(items.map(function(item) {
                                    return item[0]
                                }).join(",")).triggerHandler("change"), $(this).closest("span").remove(), uiUpdater(), event.stopPropagation(), !!that.options.callback && that.options.callback.call(that, items)
                            })
                        }
                        $element.val(itemcode.join(",")), !init && $element.trigger("change"), uiUpdater(), that.ui.focus(init)
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },
        "PR4X": function(module, exports) {},
        "Q635": function(module, exports, __webpack_require__) {
            module.exports = __webpack_require__.p + "images/plugins/jquery-LocalDataCity/dropdown.1e6bd70a.png"
        },
        "QsBD": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.hjobs = {
                "list": {
                    "000": ["全部", "All"],
                    "cat-01": ["销售/客服/技术支持", "Sales / Customer Service / Technical Support"],
                    "020": ["销售管理", "Sales Management"],
                    "380": ["销售行政/商务", "Sales Administration"],
                    "030": ["客户服务/技术支持", "Customer Service and Technical Support"],
                    "cat-02": ["计算机/互联网/通信/电子", "Computer / Internet / Telecom / Electronics"],
                    "350": ["计算机软件/系统集成", "Computer Software/System Interation"],
                    "390": ["计算机硬件", "Computer Handware"],
                    "360": ["互联网/移动互联网/电子商务/网游", "Internet/Mobile Internet/E-Commerce/Online Game"],
                    "100": ["IT管理/品管/技术支持", "IT-Management/QA/Technical Support"],
                    "110": ["电信/通信技术开发及应用", "Telecommunication/Communication Techonlogy and Application"],
                    "400": ["电子/电器/半导体/仪器/仪表", "Electronics/Wiring/Semiconductor/Instrument/Industry"],
                    "cat-03": ["会计/金融/银行/保险", "Accounting / Finance / Banking / Insurance"],
                    "090": ["财务/审计/税务", "Finance/Accounting/Audit/Tax"],
                    "140": ["金融/证券/期货/投资", "Finance/Securities/Commodities/Investments"],
                    "410": ["银行", "Banks"],
                    "150": ["保险", "Insurance Category"],
                    "cat-04": ["汽车/工程/机械", "Automotive / Engineering / Mechanical"],
                    "420": ["汽车/摩托车制造", "Automobile Manufacture"],
                    "430": ["汽车销售与服务", "Automotive Sales and Service"],
                    "220": ["工程/机械", "Engineering/Mechanical"],
                    "cat-05": ["生产/营运/采购/物流", "Manufacturing / Operation / Purchaing / Logistics"],
                    "210": ["生产/营运", "Manufacturing/Operation"],
                    "050": ["质量管理/安全防护", "Quality Control/Safety Protection"],
                    "440": ["服装/纺织/皮革", "Apparels/Textiles/Leather Goods"],
                    "450": ["采购/贸易", "Purchasing/Trade"],
                    "160": ["物流/仓储", "Logistics/Warehouse"],
                    "cat-06": ["广告/市场/媒体/艺术/设计", "Advertising / Marketing / Media / Design"],
                    "470": ["广告/会展", "Advertising/Exhibition"],
                    "460": ["公关/媒介", "Public Relations/Media"],
                    "060": ["市场/营销", "Marketing"],
                    "480": ["影视/媒体", "Film Entertainment/Media"],
                    "250": ["写作/报刊/出版/印刷", "Writing/Newspaper/Publishing/Printing"],
                    "240": ["艺术/设计/创意", "Artist/Designer/Creative"],
                    "cat-07": ["生物/制药/医疗/能源/环保", "Biotechnology / Pharmaceuticals / Medicine / Energy / Environmental"],
                    "290": ["生物/制药/医疗器械", "Biotechnology/Pharmaceuticals/Medical Equipment"],
                    "490": ["化工", "Chemical"],
                    "280": ["医院/医疗/护理", "Hospital/Medicine/Nursing"],
                    "120": ["电气/能源/矿产/地质勘查", "Electrical/Energy/Mining/Geological Survey"],
                    "500": ["环境科学/环保", "Environmental Science/Environmental"],
                    "cat-08": ["房产/建筑建设/物业", "Real Estate / Construction / Property Management"],
                    "170": ["建筑装潢/市政建设", "Construction"],
                    "510": ["房地产", "Real Estate"],
                    "520": ["物业管理", "Property Management"],
                    "cat-09": ["人事/行政/高级管理", "HR / Admin / Senior Management"],
                    "070": ["人力资源", "Human Resource Category"],
                    "010": ["高级管理", "Senior Management"],
                    "080": ["行政/后勤/文秘", "Admin./Support Services/Secretarial"],
                    "040": ["项目管理", "Project Management"],
                    "cat-10": ["咨询/法律/教育/翻译", "Consultant / Legal / Education / Translation"],
                    "130": ["咨询/顾问", "Consultant Category"],
                    "270": ["律师/法务/合规", "Legal/Compliance"],
                    "260": ["教育/培训", "Education/Training Category"],
                    "180": ["翻译", "Translation Category"],
                    "cat-11": ["服务业", "Service"],
                    "191": ["餐饮/娱乐", "Restaurant & Food / Entertainment"],
                    "190": ["酒店/旅游", "Hospitality/Tourism"],
                    "291": ["百货/连锁/零售服务", "Department Store/Chain Shops/Retail"],
                    "292": ["交通运输服务", "Traffic Service"],
                    "cat-12": ["公务员/学生/其他", "Official / Student / Others"],
                    "300": ["公务员/事业单位/科研", "Official/Public Organizations/Science Research"],
                    "320": ["农/林/牧/渔业", "Agriculture/Forestry/Fishing"],
                    "340": ["其他", "Other"]
                },
                "relations": {
                    "cat-01": ["020", "380", "030"],
                    "cat-02": ["350", "390", "360", "100", "110", "400"],
                    "cat-03": ["090", "140", "410", "150"],
                    "cat-04": ["420", "430", "220"],
                    "cat-05": ["210", "050", "440", "450", "160"],
                    "cat-06": ["470", "460", "060", "480", "250", "240"],
                    "cat-07": ["290", "490", "280", "120", "500"],
                    "cat-08": ["170", "510", "520"],
                    "cat-09": ["070", "010", "080", "040"],
                    "cat-10": ["130", "270", "260", "180"],
                    "cat-11": ["191", "190", "291", "292"],
                    "cat-12": ["300", "320", "340"]
                }
            }
        },
        "QtjF": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.province = {
                "list": {
                    "010": ["北京", "BEIJING"],
                    "020": ["上海", "SHANGHAI"],
                    "030": ["天津", "TIANJIN"],
                    "040": ["重庆", "CHONGQING"],
                    "050": ["广东", "GUANGDONG"],
                    "060": ["江苏", "JIANGSU"],
                    "070": ["浙江", "ZHEJIANG"],
                    "080": ["安徽", "ANHUI"],
                    "090": ["福建", "FUJIAN"],
                    "100": ["甘肃", "GANSU"],
                    "110": ["广西", "GUANGXI"],
                    "120": ["贵州", "GUIZHOU"],
                    "130": ["海南", "HAINAN"],
                    "140": ["河北", "HEBEI"],
                    "150": ["河南", "HENAN"],
                    "160": ["黑龙江", "HEILONGJIANG"],
                    "170": ["湖北", "HUBEI"],
                    "180": ["湖南", "HUNAN"],
                    "190": ["吉林", "JILIN"],
                    "200": ["江西", "JIANGXI"],
                    "210": ["辽宁", "LIAONING"],
                    "220": ["内蒙古", "NEIMENGGU"],
                    "230": ["宁夏", "NINGXIA"],
                    "240": ["青海", "QINGHAI"],
                    "250": ["山东", "SHANDONG"],
                    "260": ["山西", "SHANXI"],
                    "270": ["陕西", "SHANXI"],
                    "280": ["四川", "SICHUAN"],
                    "290": ["西藏", "XIZANG"],
                    "300": ["新疆", "XINJIANG"],
                    "310": ["云南", "YUNNAN"],
                    "320": ["香港", "HONGKONG"],
                    "330": ["澳门", "MACAO"],
                    "340": ["台湾", "TAIWAN"],
                    "000": ["全部", "All"],
                    "hwgat": ["港澳台地区", "港澳台地区"]
                },
                "relations": {},
                "category": {
                    "cities": ["010", "020", "030", "040"],
                    "provinces": ["050", "060", "070", "080", "090", "100", "110", "120", "130", "140", "150", "160", "170", "180", "190", "200", "210", "220", "230", "240", "250", "260", "270", "280", "290", "300", "310"],
                    "gangaotai": ["320", "330", "340"]
                }
            }
        },

        "TY+L": function(module, exports, __webpack_require__) {
            "use strict";
            var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
                return typeof obj
            } : function(obj) {
                return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj
            };
            __webpack_require__("hsQ4"), __webpack_require__("ZBKY"), __webpack_require__("LRTM"), __webpack_require__("ar5U"),
                function($, window, undefined) {
                    function Plugin(element, options) {
                        var that = this;
                        that.data = [], that.LocalData = {}, that.element = element, that.options = $.extend({}, defaults, options), that._language = that.options.en ? 1 : 0, that._uiNameSpace = "", 1 !== that.options.max && "radio" !== that.options.type || (that.options.max = 1, that.options.type = "radio", that.options.all = !1), that._defaults = defaults, that._name = pluginName;
                        return __webpack_require__("15h4")("./" + that.options.name), that.LocalData = window.__LocalData[that.options.name], that.init(), that.refresh(!0), that
                    }
                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataJobs",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "title": "选择职能",
                            "name": "jobs",
                            "max": 0,
                            "type": "checkbox",
                            "en": !1,
                            "all": !1,
                            "all$": !1,
                            "all$$": !1,
                            "init": !1,
                            "initData": !1,
                            "ui": "D",
                            "disabled": !1,
                            "datasource": "job",
                            "callback": !1
                        };
                    Plugin.prototype.init = function() {
                        var that = this,
                            $element = $(that.element),
                            _extend = {
                                "max": that.options.max,
                                "filter": function() {
                                    return that._filter.apply(that, arguments)
                                },
                                "drop": function() {
                                    return that._drop.apply(that, arguments)
                                },
                                "suggest": function() {
                                    return that._suggest.apply(that, arguments)
                                },
                                "disabled": function() {
                                    return that.options.disabled
                                },
                                "callback": function() {
                                    if(that.options.callback) return that.options.callback.apply(that, arguments)
                                }
                            };
                        return that.options.ui ? ("string" == typeof that.options.ui && (that.options.ui = {
                            "type": that.options.ui
                        }), "object" === _typeof(that.options.ui) && (that.options.ui.type = that.options.ui.type || "B", that._uiNameSpace = "LocalDataUI" + that.options.ui.type.toUpperCase(), $element[that._uiNameSpace]($.extend(_extend, that.options.ui)), that.ui = ($element[that._uiNameSpace]("fetch") || {}).ui)) : $element.bind("click." + pluginName, function() {
                            if(that.options.disabled) return !1;
                            that._drop.apply(that, arguments)
                        }), that.disabled(that.options.disabled), that.options && that.options.init && that.options.init.call(that), that.data = that._initData(), that
                    }, Plugin.prototype._filter = function(arr) {
                        var that = this;
                        return arr = arr.map(function(item) {
                            var text = "";
                            return !!that.LocalData.list[item] && (text = that.LocalData.list[item][that._language], [item].concat(text))
                        }).filter(function(item) {
                            return !1 !== item
                        })
                    }, Plugin.prototype._initData = function() {
                        var that = this,
                            $element = $(that.element),
                            initdata = [];
                        return that.options.ui ? initdata = $element.val() ? $element.val().split(",") : [] : that.options.initData && ("function" == typeof that.options.initData ? initdata = that.options.initData.call(that).split(",") || [] : "string" == typeof that.options.initData && (initdata = that.options.initData.split(","))), initdata
                    }, Plugin.prototype._getParent = function(code) {
                        var that = this,
                            parentCode = "";
                        return Object.keys(that.LocalData.relations).forEach(function(key) {
                            if(-1 !== that.LocalData.relations[key].indexOf(code)) return parentCode = key, !1
                        }), parentCode
                    }, Plugin.prototype._suggest = function(keyword) {
                        var that = this,
                            list = that.LocalData.list,
                            relations = that.LocalData.relations,
                            result = [],
                            resultObj = {},
                            relationsArr = Object.keys(relations);
                        if("" === (keyword = keyword.trim())) {
                            var defaultSuggest = $(that.element).attr("service-suggest");
                            return defaultSuggest && defaultSuggest.split(",").map(function(code, idx) {
                                "" !== code && (resultObj[code] = resultObj[code] || [], resultObj[code].push([code, list[code][that._language]]))
                            }), defaultSuggest ? [defaultSuggest, resultObj] : resultObj
                        }
                        return result = Object.keys(list).filter(function(code) {
                            return -1 !== list[code][that._language].toUpperCase().indexOf(keyword.toUpperCase()) && -1 === relationsArr.indexOf(code)
                        }), result.forEach(function(code) {
                            var parentCode = that._getParent(code);
                            parentCode && (resultObj[parentCode] = resultObj[parentCode] || {
                                "parent": [parentCode, list[parentCode][that._language]],
                                "children": []
                            }, resultObj[parentCode].children.push([code, list[code][that._language]]))
                        }), resultObj
                    }, Plugin.prototype._drop = function() {
                        var data, that = this;
                        that.data = that._initData(), data = {
                            "data": that.LocalData,
                            "language": that._language,
                            "options": that.options,
                            "codes": that.data
                        }, vdialog({
                            "title": that.options.title,
                            "padding": 0,
                            "content": __webpack_require__("b0xf").render(data),
                            "ok": function() {
                                $(that.element).attr("value",data.codes.join(","));
                                that.data = data.codes, that.options.ui && $(that.element).val(data.codes.join(",")), that.refresh()
                            },
                            "cancel": !0,
                            "close": function() {
                                that.options.ui && that.ui.focus()
                            }
                        }).showModal()
                    }, Plugin.prototype.text = function() {
                        var that = this,
                            _arr = that._filter(that.data);
                        return _arr = _arr.map(function(item) {
                            return item[1]
                        }), _arr.join(",")
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? that.options.disabled : (that.options.disabled = disabled, that.options.ui && "object" === _typeof(that.options.ui) ? $(that.element)[that._uiNameSpace]("disabled", disabled) : $(that.element).prop("disabled", disabled), that)
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            $element = $(that.element);
                        that.options.ui && $element[that._uiNameSpace]("refresh", init), !init && that.options.callback && that.options.callback.call(that, that._filter(that.data))
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },
        "UEs5": function(module, exports, __webpack_require__) {
            "use strict"
        },
        "UJ7A": function(module, exports) {},
        "Y4uM": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.city = {
                "list": {
                    "010": ["北京", "BEIJING", "BJ"],
                    "010010010": ["东城区", "DONGCHENG", "DCQ"],
                    "010010020": ["西城区", "XICHENG", "XCQ"],
                    "010010030": ["朝阳区", "CHAOYANG", "CYQ"],
                    "010010050": ["海淀区", "HAIDIAN", "HDN"],
                    "010010070": ["石景山", "SHIJINGSHAN", "SJS"],
                    "010010080": ["门头沟", "MENTOUGOU", "MTG"],
                    "010010090": ["丰台区", "FENGTAI", "FTQ"],
                    "010010100": ["房山区", "FANGSHAN", "FSQ"],
                    "010010110": ["大兴区", "DAXING", "DXQ"],
                    "010010120": ["通州区", "TONGZHOU", "TZQ"],
                    "010010130": ["顺义区", "SHUNYI", "SYI"],
                    "010010140": ["平谷区", "PINGGU", "PGU"],
                    "010010150": ["昌平区", "CHANGPING", "CPX"],
                    "010010160": ["怀柔区", "HUAIROU", "HRX"],
                    "010010170": ["延庆县", "YANQING", "YQX"],
                    "010010180": ["密云县", "MIYUN", "MYN"],
                    "020": ["上海", "SHANGHAI", "SH"],
                    "020010010": ["浦东新区", "PUDONGXINQU", "PDX"],
                    "020010020": ["徐汇区", "XUHUI", "XHI"],
                    "020010030": ["长宁区", "CHANGNING", ""],
                    "020010040": ["普陀区", "PUTUO", "PTO"],
                    "020010050": ["闸北区", "ZHABEI", "ZBE"],
                    "020010060": ["虹口区", "HONGKOU", "HKQ"],
                    "020010070": ["杨浦区", "YANGPU", "YPU"],
                    "020010080": ["黄浦区", "HUANGPU", "HGP"],
                    "020010100": ["静安区", "JINGAN", "JAQ"],
                    "020010110": ["宝山区", "BAOSHAN", "BAO"],
                    "020010120": ["闵行区", "MINHANG", "MHQ"],
                    "020010130": ["嘉定区", "JIADING", "JDG"],
                    "020010140": ["金山区", "JINSHAN", ""],
                    "020010150": ["松江区", "SONGJIANG", "SOJ"],
                    "020010160": ["青浦区", "QINGPU", "QPU"],
                    "020010180": ["奉贤区", "FENGXIAN", "FXI"],
                    "020010190": ["崇明县", "CHONGMING", "CMI"],
                    "030": ["天津", "TIANJIN", "TJ"],
                    "030010010": ["和平区", "HEPING", "HPQ"],
                    "030010020": ["河东区", "HEDONG", "HDL"],
                    "030010030": ["河西区", "HEXI", "HXQ"],
                    "030010040": ["南开区", "NANKAI", "NKQ"],
                    "030010050": ["河北区", "HEBEI", "HBQ"],
                    "030010060": ["红桥区", "HONGQIAO", "HQO"],
                    "030010070": ["塘沽区", "TANGKU", "TGA"],
                    "030010080": ["汉沽区", "HANKU", "HGQ"],
                    "030010090": ["大港区", "DAGANG", "DGJ"],
                    "030010100": ["东丽区", "DONGLI", "DLI"],
                    "030010110": ["西青区", "XIQING", "XQG"],
                    "030010120": ["津南区", "JINNAN", "JNQ"],
                    "030010130": ["北辰区", "BEICHEN", "BCQ"],
                    "030010140": ["武清区", "WUQING", "WQX"],
                    "030010150": ["宝坻区", "BAODI", "BDI"],
                    "030010160": ["宁河县", "NINGHE", "NHE"],
                    "030010170": ["静海县", "JINGHAI", "JHT"],
                    "030010180": ["蓟　县", "JIXIAN", "JXI"],
                    "030010200": ["开发区", "JINGJIKAIFAQU", "KFQ"],
                    "030010210": ["滨海区", "BINHAIXINQU", "BHI"],
                    "040": ["重庆", "CHONGQING", "CQ"],
                    "040010010": ["渝中区", "YUZHONG", "YZQ"],
                    "040010020": ["江北区", "JIANGBEI", "JBE"],
                    "040010030": ["南岸区", "NANAN", "NAQ"],
                    "040010040": ["沙坪坝", "SHAPINGVA", "SPB"],
                    "040010050": ["九龙坡", "JIULONGPO", "JLP"],
                    "040010060": ["大渡口", "DADUKOU", "DDK"],
                    "040010070": ["北碚区", "BEIBEI", "BBE"],
                    "040010080": ["巴南区", "BANAN", "BNN"],
                    "040010090": ["渝北区", "YUBEI", "YBE"],
                    "040010100": ["永川区", "YONGCHUAN", "YCP"],
                    "040010110": ["涪陵区", "FULING", "FLG"],
                    "040010120": ["合川区", "HECHUAN", "HEC"],
                    "040010130": ["江津区", "JIANGJIN", "JJY"],
                    "040010140": ["长寿区", "CHANGSHOU", "CSO"],
                    "040010170": ["南川区", "NANCHUAN", "NCU"],
                    "040010180": ["万州区", "WANZHOU", "WZO"],
                    "040010190": ["黔江区", "QIANJIANG", "QJX"],
                    "040010200": ["綦江区", "QIJIANG", "QJG"],
                    "040010210": ["潼南县", "TONGNANXIAN", "TNN"],
                    "040010220": ["铜梁区", "TONGLIANG", "TGL"],
                    "040010230": ["大足区", "DAZU", "DZX"],
                    "040010240": ["荣昌县", "RONGCHANGXIAN", "RGC"],
                    "040010250": ["璧山区", "BISHAN", "BSY"],
                    "040010260": ["垫江县", "DIANJIANGXIAN", "DJG"],
                    "040010270": ["武隆县", "WULONGXIAN", "WLG"],
                    "040010280": ["丰都县", "FENGDOUXIAN", "FDU"],
                    "040010290": ["城口县", "CHENGKOUXIAN", "CKO"],
                    "040010300": ["梁平县", "LIANGPINGXIAN", "LGP"],
                    "040010310": ["开县", "KAIXIAN", "KAI"],
                    "040010320": ["巫溪县", "WUXIXIAN", "WXX"],
                    "040010330": ["巫山县", "WUSHANXIAN", "WSN"],
                    "040010340": ["奉节县", "FENGJIEXIAN", "FJE"],
                    "040010350": ["云阳县", "YUNYANGXIAN", "YNY"],
                    "040010360": ["忠县", "ZHONGXIAN", "ZHX"],
                    "040010370": ["石柱", "SHIZHU", "SZY"],
                    "040010380": ["彭水县", "PENGSHUI", "PSU"],
                    "040010390": ["酉阳县", "YOUYANG", "YUY"],
                    "040010410": ["石柱县", "SHIZHUTUJIAZUZIZHIXIAN", "SZY"],
                    "040010420": ["秀山县", "XIUSHAN", "XUS"],
                    "050": ["广东省", "GUANGDONG", "GD"],
                    "050020": ["广州", "GUANGZHOU", "CAN"],
                    "050020010": ["白云区", "BAIYUN", ""],
                    "050020020": ["天河区", "TIANHE", "THQ"],
                    "050020030": ["越秀区", "YUEXIU", "YXU"],
                    "050020040": ["海珠区", "ZHUHAI", "HZU"],
                    "050020050": ["黄埔区", "HUANGPU", "HPU"],
                    "050020060": ["荔湾区", "LIWAN", "LWQ"],
                    "050020070": ["番禺区", "FANYU", "PNY"],
                    "050020080": ["花都区", "HUADU", "HDU"],
                    "050020090": ["萝岗区", "LUOGANG", ""],
                    "050020100": ["南沙区", "NANSHA", "NSA"],
                    "050020110": ["从化区", "CONGHUA", "CNH"],
                    "050020120": ["增城区", "ZENGCHENG", "ZEC"],
                    "050030": ["潮州", "CHAOZHOU", "CZY"],
                    "050040": ["东莞", "DONGGUAN", "DGG"],
                    "050040010": ["南城区", "NANCHENGQU", "NCE"],
                    "050040020": ["东城区", "DONGCHENGQU", "DCQ"],
                    "050040030": ["万江区", "WANJIANGQU", ""],
                    "050040040": ["莞城区", "WANCHENGQU", ""],
                    "050040050": ["石龙镇", "SHILONGZHEN", "SIL"],
                    "050040060": ["虎门镇", "HUMENZHEN", ""],
                    "050040070": ["麻涌镇", "MAYONGZHEN", ""],
                    "050040080": ["道滘镇", "DAOJIAOZHEN", ""],
                    "050040090": ["石碣镇", "SHIJIEZHEN", ""],
                    "050040100": ["沙田镇", "SHATIANZHEN", ""],
                    "050040110": ["望牛墩", "WANGNIUDUNZHEN", ""],
                    "050040120": ["洪梅镇", "HONGMEIZHEN", ""],
                    "050040130": ["茶山镇", "CHASHANZHEN", ""],
                    "050040140": ["寮步镇", "LIAOBUZHEN", ""],
                    "050040150": ["大岭山", "DALINGSHANZHEN", ""],
                    "050040160": ["大朗镇", "DALANGZHEN", ""],
                    "050040170": ["黄江镇", "HUANGJIANGZHEN", ""],
                    "050040180": ["樟木头", "ZHANGMUTOUZHEN", ""],
                    "050040190": ["凤岗镇", "FENGGANGZHEN", ""],
                    "050040200": ["塘厦镇", "TANGXIAZHEN", ""],
                    "050040210": ["谢岗镇", "XIEGANGZHEN", ""],
                    "050040220": ["厚街镇", "HOUJIEZHEN", ""],
                    "050040230": ["清溪镇", "QINGXIZHEN", ""],
                    "050040240": ["常平镇", "CHANGPINGZHEN", ""],
                    "050040250": ["桥头镇", "QIAOTOUZHEN", ""],
                    "050040260": ["横沥镇", "HENGLIZHEN", ""],
                    "050040270": ["东坑镇", "DONGKENGZHEN", ""],
                    "050040280": ["企石镇", "QISHIZHEN", ""],
                    "050040290": ["石排镇", "SHIPAIZHEN", ""],
                    "050040300": ["长安镇", "CHANGANZHEN", ""],
                    "050040310": ["中堂镇", "ZHONGTANGZHEN", ""],
                    "050040320": ["高埗镇", "GAOBUZHEN", ""],
                    "050040330": ["松山湖", "SONGSHANHUGAOXINQU", "SSQ"],
                    "050050": ["佛山", "FOSHAN", "FOS"],
                    "050050010": ["禅城区", "CHANCHENGQU", ""],
                    "050050020": ["南海区", "NANHAIQU", "NAH"],
                    "050050030": ["顺德区", "SHUNDEQU", "SUD"],
                    "050050040": ["三水区", "SANSHUIQU", "SJQ"],
                    "050050050": ["高明区", "GAOMINGQU", "GOM"],
                    "050050060": ["新城区", "DONGPINGXINCHENG", ""],
                    "050050070": ["大沥", "DALI", ""],
                    "050050080": ["黄岐", "HUANGQI", ""],
                    "050050090": ["西樵", "XIQIAO", ""],
                    "050050100": ["南庄", "NANZHUANG", ""],
                    "050060": ["惠州", "HUIZHOU", "HUI"],
                    "050070": ["清远", "QINGYUAN", "QYN"],
                    "050080": ["汕头", "SHANTOU", "SWA"],
                    "050090": ["深圳", "SHENZHEN", "SZX"],
                    "050090010": ["罗湖区", "LUOHU", "LHQ"],
                    "050090020": ["福田区", "FUTIAN", "FTN"],
                    "050090030": ["南山区", "NANSHAN", ""],
                    "050090040": ["宝安区", "ANBAO", "BAQ"],
                    "050090050": ["龙岗区", "LONGGANG", "LGG"],
                    "050090060": ["盐田区", "YANTIAN", "YTQ"],
                    "050090070": ["光明新区", "GUANGMINGXINQU", ""],
                    "050090080": ["坪山新区", "PINGSHANXINQU", ""],
                    "050090090": ["大鹏新区", "DAPENGXINQU", ""],
                    "050090100": ["龙华新区", "LONGHUAXINQU", ""],
                    "050100": ["顺德", "SHUNDE", "SUD"],
                    "050110": ["湛江", "ZHANJIANG", "ZHA"],
                    "050120": ["肇庆", "ZHAOQING", "ZQG"],
                    "050130": ["中山", "ZHONGSHAN", ""],
                    "050140": ["珠海", "ZHUHAI", "ZUH"],
                    "050140010": ["香洲区", "XIANGZHOUQU", "XZQ"],
                    "050140020": ["斗门区", "DOUMENQU", "DOU"],
                    "050140030": ["金湾区", "JINWANQU", ""],
                    "050140040": ["横琴新区", "HENGQINXINQU", ""],
                    "050150": ["江门", "JIANGMEN", "JMN"],
                    "050160": ["阳江", "YANGJIANG", "YJI"],
                    "050170": ["韶关", "SHAOGUAN", "HSC"],
                    "050180": ["茂名", "MAOMING", "MMI"],
                    "050190": ["梅州", "MEIZHOU", "MXZ"],
                    "050200": ["汕尾", "SHANWEI", "SWE"],
                    "050210": ["河源", "HEYUAN", "HEY"],
                    "050220": ["揭阳", "JIEYANG", "JIY"],
                    "050230": ["云浮", "YUNFU", "YFS"],
                    "050240": ["开平", "KAIPING", ""],
                    "050250": ["台山", "TAISHAN", "TSS"],
                    "050260": ["普宁", "PUNING", "PNG"],
                    "050270": ["南沙", "NANSHA", "NSA"],
                    "050280": ["龙川", "LONGCHUAN", "LCY"],
                    "050290": ["鹤山", "HESHAN", ""],
                    "060": ["江苏省", "JIANGSU", "JS"],
                    "060020": ["南京", "NANJING", "NKG"],
                    "060020010": ["玄武区", "XUANWU", "XWU"],
                    "060020020": ["白下区", "BAIXIA", "BXQ"],
                    "060020030": ["秦淮区", "QINHUAI", "QHU"],
                    "060020040": ["建邺区", "JIANYE", "JYQ"],
                    "060020050": ["鼓楼区", "GULOU", "GLK"],
                    "060020060": ["下关区", "XIAGUAN", "XGQ"],
                    "060020070": ["浦口区", "PUKOU", "PKO"],
                    "060020080": ["六合区", "LIUHE", "LHE"],
                    "060020090": ["栖霞区", "QIXIA", ""],
                    "060020100": ["雨花台", "YUHUATAI", ""],
                    "060020110": ["江宁区", "JIANGNING", "JNX"],
                    "060020120": ["溧水县", "LISHUI", "LIS"],
                    "060020130": ["高淳县", "GAOCHUN", "GCN"],
                    "060020140": ["大厂区", "DACHANGQU", ""],
                    "060030": ["常熟", "CHANGSHU", "CGS"],
                    "060040": ["常州", "CHANGZHOU", "CZX"],
                    "060040010": ["天宁区", "TIANNINGQU", "TNQ"],
                    "060040020": ["钟楼区", "ZHONGLOUQU", "ZLQ"],
                    "060040030": ["戚墅堰", "QISHUYANQU", "QSY"],
                    "060040040": ["郊区", "JIAOQU", "JQC"],
                    "060040050": ["新北区", "XINBEIQU", ""],
                    "060040060": ["武进区", "WUJINQU", "WJN"],
                    "060040070": ["溧阳市", "LIYANGSHI", "LYR"],
                    "060040080": ["金坛市", "JINTANSHI", "JTS"],
                    "060050": ["昆山", "KUNSHAN", "KUS"],
                    "060060": ["连云港", "LIANYUNGANG", ""],
                    "060070": ["南通", "NANTONG", "NTG"],
                    "060080": ["苏州", "SUZHOU", "SZH"],
                    "060080010": ["金阊区", "JINCHANG", "JCA"],
                    "060080020": ["沧浪区", "CANGLANG", "CLQ"],
                    "060080030": ["平江区", "PINGJIANG", ""],
                    "060080040": ["工业园", "GONGYEYUAN", ""],
                    "060080050": ["高新区", "GAOXIN", ""],
                    "060080060": ["吴中区", "WUZHONG", ""],
                    "060080070": ["相城区", "XIANGCHENG", ""],
                    "060080080": ["张家港", "ZHANGJIAGANG", "ZJG"],
                    "060080090": ["常熟市", "CHANGSHU", "CGS"],
                    "060080100": ["太仓市", "TAICANG", "TAC"],
                    "060080110": ["昆山市", "KUNSHAN", "KUS"],
                    "060080120": ["吴江市", "WUJIANG", "WUJ"],
                    "060080130": ["虎丘区", "HUQIUQU", ""],
                    "060080140": ["玉山镇", "YUSHANZHEN", "YUS"],
                    "060080150": ["巴城镇", "BACHENGZHEN", ""],
                    "060080160": ["周市镇", "ZHOUSHIZHEN", ""],
                    "060080170": ["陆家镇", "LUJIAZHEN", ""],
                    "060080180": ["花桥镇", "HUAQIAOZHEN", ""],
                    "060080190": ["淀山湖", "DIANSHANHUZHEN", ""],
                    "060080200": ["张浦镇", "ZHANGPUZHEN", ""],
                    "060080210": ["周庄镇", "ZHOUZHUANGZHEN", ""],
                    "060080220": ["千灯镇", "QIANDENGZHEN", ""],
                    "060080230": ["锦溪镇", "JINXIZHEN", ""],
                    "060080240": ["开发区", "KAIFAQU", ""],
                    "060090": ["太仓", "TAICANG", "TAC"],
                    "060100": ["无锡", "WUXI", "WUX"],
                    "060100010": ["崇安区", "CHONGANQU", "CGA"],
                    "060100020": ["北塘区", "BEITANGQU", "BTQ"],
                    "060100030": ["南长区", "NANCHANGQU", "NCG"],
                    "060100040": ["锡山区", "XISHANQU", "XSS"],
                    "060100050": ["惠山区", "HUISHANQU", ""],
                    "060100060": ["滨湖区", "BINHUQU", ""],
                    "060100070": ["新区", "XINQU", "XNQ"],
                    "060100080": ["宜兴市", "YIXINGSHI", "YIX"],
                    "060100090": ["江阴市", "JIANGYINSHI", "JIA"],
                    "060110": ["徐州", "XUZHOU", "XUZ"],
                    "060120": ["扬州", "YANGZHOU", "YZH"],
                    "060130": ["镇江", "ZHENJIANG", "ZHE"],
                    "060140": ["淮安", "HUAIAN", "HAS"],
                    "060150": ["盐城", "YANCHENG", "YCK"],
                    "060160": ["泰州", "TAI_ZHOU", "TZS"],
                    "060170": ["宿迁", "SUQIAN", "SUQ"],
                    "060190": ["江阴", "JIANGYIN", "JIA"],
                    "060200": ["丹阳", "DANYANG", "DNY"],
                    "060210": ["溧阳", "LIYANG", "LYR"],
                    "060220": ["泰兴", "TAIXING", "TXG"],
                    "060230": ["宜兴", "YIXING", "YIX"],
                    "060240": ["靖江", "JINGJIANG", "JGJ"],
                    "060250": ["句容", "JURONG", "JRG"],
                    "060260": ["如皋", "RUGAO", "RGO"],
                    "060270": ["扬中", "YANGZHONG", "YZG"],
                    "060280": ["高邮", "GAOYOU", "GYO"],
                    "060290": ["启东", "QIDONG", "QID"],
                    "060300": ["盱眙", "XUYI", "XUY"],
                    "060310": ["通州", "TONGZHOU", ""],
                    "060320": ["金湖", "JINHU", "JHU"],
                    "070": ["浙江省", "ZHEJIANG", "ZJ"],
                    "070020": ["杭州", "HANGZHOU", "HGH"],
                    "070020010": ["上城区", "SHANGCHENG", "SCQ"],
                    "070020020": ["下城区", "XAICHENG", "XCG"],
                    "070020030": ["拱墅区", "GONGSHU", "GSQ"],
                    "070020040": ["西湖区", "XIHU", "XHQ"],
                    "070020050": ["江干区", "JIANGGAN", "JGQ"],
                    "070020060": ["滨江区", "BINJIANG", "BJQ"],
                    "070020070": ["萧山区", "XIAOSHAN", "XIS"],
                    "070020080": ["余杭区", "YUHANG", "YHS"],
                    "070020090": ["临安市", "LINAN", "LNA"],
                    "070020100": ["富阳区", "FUYANG", "FYZ"],
                    "070020110": ["建德市", "JIANDE", "JDS"],
                    "070020120": ["桐庐县", "TONGLU", "TLU"],
                    "070020130": ["淳安县", "CUNAN", "CAZ"],
                    "070020140": ["市郊", "SHIJIAO", "SWZ"],
                    "070030": ["宁波", "NINGBO", "NGB"],
                    "070030010": ["海曙区", "HAISHUQU", "HNB"],
                    "070030020": ["江东区", "JIANGDONGQU", "JDH"],
                    "070030030": ["江北区", "JIANGBEIQU", "JBE"],
                    "070030040": ["镇海区", "ZHENHAIQU", "ZHF"],
                    "070030050": ["北仑区", "BEILUNQU", "BLN"],
                    "070030060": ["鄞州区", "YINZHOUQU", ""],
                    "070030070": ["余姚市", "YUYAOSHI", "YYO"],
                    "070030080": ["慈溪市", "CIXISHI", "CXI"],
                    "070030090": ["奉化市", "FENGHUASHI", "FHU"],
                    "070030100": ["象山县", "XIANGSHANXIAN", ""],
                    "070030110": ["宁海县", "NINGHAIXIAN", "NHI"],
                    "070040": ["温州", "WENZHOU", "WNZ"],
                    "070040010": ["鹿城区", "LUCHENGQU", "LUW"],
                    "070040020": ["龙湾区", "LONGWANQU", "LWW"],
                    "070040030": ["瓯海区", "OUHAIQU", "OHQ"],
                    "070040040": ["瑞安市", "RUIANSHI", "RAS"],
                    "070040050": ["乐清市", "LEQINGSHI", "YQZ"],
                    "070040060": ["洞头县", "DONGTOUXIAN", "DTO"],
                    "070040070": ["永嘉县", "YONGJIAXIAN", "YJX"],
                    "070040080": ["平阳县", "PINGYANGXIAN", "PYG"],
                    "070040090": ["苍南县", "CANGNANXIAN", "CAN"],
                    "070040100": ["文成县", "WENCHENGXIAN", "WCZ"],
                    "070040110": ["泰顺县", "TAISHUNXIAN", "TSZ"],
                    "070050": ["绍兴", "SHAOXING", ""],
                    "070060": ["金华", "JINHUA", ""],
                    "070070": ["台州", "TAIZHOU", "TZZ"],
                    "070080": ["湖州", "HUZHOU", "HZH"],
                    "070090": ["嘉兴", "JIAXING", "JIX"],
                    "070100": ["衢州", "QUZHOU", "QUZ"],
                    "070110": ["丽水", "LISHUI", ""],
                    "070120": ["舟山", "ZHOUSHAN", "ZOS"],
                    "070130": ["义乌", "YIWU", "YWS"],
                    "070140": ["海宁", "HAINING", "HNG"],
                    "070150": ["玉环县", "YUHUANXIAN", "YHN"],
                    "070160": ["平湖", "PINGHU", "PHU"],
                    "070170": ["永康", "YONGKANG", "YKG"],
                    "070180": ["东阳", "DONGYANG", "DGY"],
                    "070190": ["嘉善", "JIASHAN", "JSK"],
                    "070200": ["余姚", "YUYAO", "YYO"],
                    "070210": ["慈溪", "CIXI", "CXI"],
                    "070220": ["乐清", "LEQING", "YQZ"],
                    "070230": ["永嘉", "YONGJIA", "YJX"],
                    "070240": ["桐乡", "TONGXIANG", "TXZ"],
                    "070250": ["瑞安", "RUIAN", "RAS"],
                    "070260": ["温岭", "WENLING", "WLS"],
                    "070270": ["上虞", "SHANGYU", "SYZ"],
                    "070280": ["诸暨", "ZHUJI", "ZHJ"],
                    "070290": ["宁海", "NINGHAI", "NHI"],
                    "070300": ["三门", "SANMEN", ""],
                    "070310": ["德清", "DEQING", "DQX"],
                    "070320": ["象山", "XIANGSHAN", ""],
                    "070330": ["方家山", "FANGJIASHAN", ""],
                    "070340": ["龙泉", "LONGQUAN", ""],
                    "080": ["安徽省", "ANHUI", "AH"],
                    "080020": ["合肥", "HEFEI", "HFE"],
                    "080020010": ["庐阳区", "LUYANGQU", ""],
                    "080020020": ["瑶海区", "YAOHAIQU", ""],
                    "080020030": ["蜀山区", "SHUSHANQU", ""],
                    "080020040": ["包河区", "BAOHEQU", ""],
                    "080020050": ["长丰县", "CHANGFENGXIAN", "CFG"],
                    "080020060": ["肥东县", "FEIDONGXIAN", "FDO"],
                    "080020070": ["肥西县", "FEIXIXIAN", "FIX"],
                    "080020080": ["新站区", "XINZHANQU", ""],
                    "080020090": ["经开区", "JINGKAIQU", ""],
                    "080020100": ["高新区", "GAOXINQU", ""],
                    "080020110": ["滨湖区", "BINHUXINQU", ""],
                    "080020120": ["北城区", "BEICHENGXINQU", ""],
                    "080020130": ["政务区", "ZHENGWUXINQU", ""],
                    "080030": ["安庆", "ANQING", "AQG"],
                    "080040": ["蚌埠", "BENGBU", "BBU"],
                    "080050": ["芜湖", "WUHU", ""],
                    "080060": ["淮南", "HUAINAN", "HNS"],
                    "080070": ["马鞍山", "MAANSHAN", "MAA"],
                    "080080": ["淮北", "HUAIBEI", "HBE"],
                    "080090": ["铜陵", "TONGLING", ""],
                    "080100": ["黄山", "HUANGSHAN", ""],
                    "080110": ["滁州", "CHUZHOU", "CUZ"],
                    "080120": ["阜阳", "FUYANG", "FYS"],
                    "080130": ["宿州", "SU_ZHOU", "SUZ"],
                    "080140": ["六安", "LIUAN", ""],
                    "080150": ["亳州", "BOZHOU", "BOZ"],
                    "080160": ["池州", "CHIZHOU", "CZD"],
                    "080170": ["宣城", "XUANCHENG", "XCD"],
                    "080180": ["巢湖", "CHAOHU", ""],
                    "080190": ["凤阳", "FENGYANG", "FYG"],
                    "080200": ["广德", "GUANGDE", "GGD"],
                    "080210": ["宿松", "SUSONG", "SUS"],
                    "090": ["福建省", "FUJIAN", "FJ"],
                    "090020": ["福州", "FUZHOU", "FOC"],
                    "090020010": ["鼓楼区", "GULOUQU", "GLK"],
                    "090020020": ["台江区", "TAIJIANGQU", ""],
                    "090020030": ["仓山区", "CANGSHANQU", "CSQ"],
                    "090020040": ["马尾区", "MAWEIQU", "MWQ"],
                    "090020050": ["晋安区", "JINANQU", "JAF"],
                    "090020060": ["福清市", "FUQINGSHI", "FQS"],
                    "090020070": ["长乐市", "CHANGLESHI", "CLS"],
                    "090020080": ["闽侯县", "MINHOUXIAN", "MHO"],
                    "090020090": ["连江县", "LIANJIANGXIAN", "LJF"],
                    "090020100": ["罗源县", "LUOYUANXIAN", "LOY"],
                    "090020110": ["闽清县", "MINQINGXIAN", "MQG"],
                    "090020120": ["永泰县", "YONGTAIXIAN", "YTX"],
                    "090020130": ["平潭县", "PINGTANXIAN", "PTN"],
                    "090030": ["泉州", "QUANZHOU", "QZJ"],
                    "090040": ["厦门", "XIAMEN", "XMN"],
                    "090040010": ["思明区", "SIMINGQU", "SMQ"],
                    "090040020": ["海沧区", "HAICANGQU", ""],
                    "090040030": ["湖里区", "HULIQU", "HLQ"],
                    "090040040": ["集美区", "JIMEIQU", "JMQ"],
                    "090040050": ["同安区", "TONGANQU", "TAQ"],
                    "090040060": ["翔安区", "XIANGANQU", ""],
                    "090050": ["漳州", "ZHANGZHOU", "ZZU"],
                    "090060": ["莆田", "PUTIAN", ""],
                    "090070": ["三明", "SANMING", "SMS"],
                    "090080": ["南平", "NANPING", "NPS"],
                    "090090": ["龙岩", "LONGYAN", "LYF"],
                    "090100": ["宁德", "NINGDE", ""],
                    "090110": ["泉港区", "QUANGANGQU", ""],
                    "090120": ["福安", "FUAN", "FAS"],
                    "090130": ["晋江", "JINJIANG", "JJG"],
                    "100": ["甘肃省", "GANSU", "GS"],
                    "100020": ["兰州", "LANZHOU", "LHW"],
                    "100020010": ["皋兰县", "GAOLANXIAN", "GAL"],
                    "100020020": ["城关区", "CHENGGUANQU", "CLZ"],
                    "100020030": ["七里河", "QILIHEQU", "QLH"],
                    "100020040": ["西固区", "XIGUQU", "XGU"],
                    "100020050": ["安宁区", "ANNINGQU", ""],
                    "100020060": ["红古区", "HONGGUQU", "HOG"],
                    "100020070": ["永登县", "YONGDENGXIAN", "YDG"],
                    "100020080": ["榆中县", "YUZHONGXIAN", "YZX"],
                    "100030": ["嘉峪关", "JIAYUGUAN", "JYG"],
                    "100040": ["酒泉", "JIUQUAN", ""],
                    "100050": ["金昌", "JINCHANG", "JCS"],
                    "100060": ["白银", "BAIYIN", ""],
                    "100070": ["天水", "TIANSHUI", "TSU"],
                    "100080": ["张掖", "ZHANGYE", ""],
                    "100090": ["武威", "WUWEI", ""],
                    "100100": ["定西", "DINGXI", ""],
                    "100110": ["陇南", "LONGNAN", "LND"],
                    "100120": ["平凉", "PINGLIANG", ""],
                    "100130": ["庆阳", "QINGYANG", ""],
                    "100140": ["临夏", "LINXIA", ""],
                    "100150": ["甘南", "GANNAN", ""],
                    "110": ["广西", "GUANGXI", "GX"],
                    "110020": ["南宁", "NANNING", ""],
                    "110020010": ["邕宁区", "YONGNINGQU", "YNG"],
                    "110020020": ["青秀区", "QINGXIUQU", ""],
                    "110020030": ["兴宁区", "XINGNINGQU", ""],
                    "110020040": ["良庆区", "LIANGQINGQU", ""],
                    "110020050": ["西乡塘", "XIXIANGTANGQU", "XXA"],
                    "110020060": ["江南区", "JIANGNANQU", "JNA"],
                    "110020070": ["武鸣县", "WUMINGXIAN", "WMG"],
                    "110020080": ["隆安县", "LONGANXIAN", "LGA"],
                    "110020090": ["马山县", "MASHANXIAN", ""],
                    "110020100": ["上林县", "SHANGLINXIAN", "SLX"],
                    "110020110": ["宾阳县", "BINYANGXIAN", "BYX"],
                    "110020120": ["横县", "HENGXIAN", "HEN"],
                    "110030": ["北海", "BEIHAI", "BHY"],
                    "110040": ["桂林", "GUILIN", "KWL"],
                    "110050": ["柳州", "LIUZHOU", "LZ"],
                    "110060": ["玉林", "YULIN", "YUL"],
                    "110070": ["梧州", "WUZHOU", "WUZ"],
                    "110080": ["崇左", "CHONGZUO", "CZU"],
                    "110090": ["来宾", "LAIBIN", "LBN"],
                    "110100": ["防城港", "FANGCHENGGANG", "FCG"],
                    "110110": ["百色", "BAISE", "BS"],
                    "110120": ["钦州", "QINZHOU", "QZH"],
                    "110130": ["贺州", "HEZHOU", "HZ"],
                    "110140": ["河池", "HECHI", "HC"],
                    "110150": ["贵港", "GUIGANG", "GUG"],
                    "120": ["贵州省", "GUIZHOU", "GZ"],
                    "120020": ["贵阳", "GUIYANG", "KWE"],
                    "120020010": ["南明区", "NANMINGQU", "NMQ"],
                    "120020020": ["云岩区", "YUNYANQU", "YYQ"],
                    "120020030": ["花溪区", "HUAXIQU", "HXI"],
                    "120020040": ["乌当区", "WUDANGQU", "WDQ"],
                    "120020050": ["白云区", "BAIYUNQU", "BY"],
                    "120020060": ["小河区", "XIAOHEQU", "XH"],
                    "120020070": ["金阳区", "JINYANGXINQU", "JYW"],
                    "120020080": ["新天园", "XINTIANYUANQU", "XTY"],
                    "120020090": ["清镇市", "QINGZHENSHI", "QZN"],
                    "120020100": ["开阳县", "KAIYANGXIAN", "KYG"],
                    "120020110": ["修文县", "XIUWENXIAN", "XWX"],
                    "120020120": ["息烽县", "XIFENGXIAN", "XFX"],
                    "120030": ["遵义", "ZUNYI", "ZY"],
                    "120040": ["六盘水", "LIUPANSHUI", "LPS"],
                    "120050": ["安顺", "ANSHUN", "AS"],
                    "120060": ["毕节", "BIJIE", "BIJ"],
                    "120070": ["铜仁", "TONGREN", "TR"],
                    "120080": ["黔西南", "QIANXINAN", "QXN"],
                    "120090": ["黔东南", "QIANDONGNAN", "QNDN"],
                    "120100": ["黔南", "QIANNAN", "QNZ"],
                    "130": ["海南省", "HAINAN", "HN"],
                    "130020": ["海口", "HAIKOU", "HAK"],
                    "130020010": ["秀英区", "XIUYINGQU", "XYH"],
                    "130020020": ["龙华区", "LONGHUAQU", "LH"],
                    "130020030": ["琼山区", "QIONGSHANQU", "QSS"],
                    "130020040": ["美兰区", "MEILANQU", "ML"],
                    "130020050": ["澄迈县", "CHENGMAIXIAN", "CMA"],
                    "130020060": ["万宁市", "WANNINGSHI", "WNN"],
                    "130020070": ["文昌市", "WENCHANGSHI", "WEC"],
                    "130020080": ["儋州市", "DANZHOUSHI", "DNZ"],
                    "130020090": ["屯昌县", "TUNCHANGXIAN", "TCG"],
                    "130020100": ["东方市", "DONGFANGSHI", "DFG"],
                    "130020110": ["昌江县", "CHANGJIANGXIAN", "CJX"],
                    "130020120": ["乐东黎", "LEDONGLIMIAOZIZHIXIAN", "LED"],
                    "130020130": ["临高县", "LINGAOXIAN", "LGO"],
                    "130020140": ["琼海市", "QIONGHAISHI", "QHA"],
                    "130020150": ["府城", "FUCHENG", "FC"],
                    "130030": ["三亚", "SANYA", "SYX"],
                    "130040": ["三沙", "SANSHA", "SS"],
                    "130060": ["文昌", "WENCHANG", "WEC"],
                    "130070": ["琼海", "QIONGHAI", "QHA"],
                    "130080": ["万宁", "WANNING", "WNN"],
                    "130090": ["儋州", "DANZHOU", "DNZ"],
                    "130100": ["东方", "DONGFANG", "DFG"],
                    "130110": ["五指山", "WUZHISHAN", "WZS"],
                    "130120": ["定安", "DINGAN", "DIA"],
                    "130130": ["屯昌", "TUNCHANG", "TCG"],
                    "130140": ["澄迈", "CHENGMAI", "CMA"],
                    "130150": ["临高", "LINGAO", "LGO"],
                    "130160": ["琼中", "QIONGZHONG", "QZG"],
                    "130170": ["保亭", "BAOTING", "BTG"],
                    "130180": ["白沙", "BAISHA", "BSX"],
                    "130190": ["昌江", "CHANGJIANG", "CJ"],
                    "130200": ["乐东", "LEDONG", "LED"],
                    "130210": ["陵水", "LINGSHUI", "LSL"],
                    "140": ["河北省", "HEBEI", ""],
                    "140020": ["石家庄", "SHIJIAZHUANG", "SJW"],
                    "140020010": ["长安区", "CHANGANQU", "CAQ"],
                    "140020020": ["桥东区", "QIAODONGQU", "QDZ"],
                    "140020030": ["桥西区", "QIAOXIQU", "QXI"],
                    "140020040": ["新华区", "XINHUAQU", "XHH"],
                    "140020050": ["裕华区", "YUHUAQU", "YHQ"],
                    "140020060": ["井陉矿", "JINGXINGKUANGQU", "JXG"],
                    "140020070": ["高新区", "GAOXINQU", "GXQ"],
                    "140020080": ["辛集市", "XINJISHI", "XJS"],
                    "140020090": ["藁城市", "GAOCHENGSHI", "GCS"],
                    "140020100": ["晋州市", "JINZHOUSHI", "JZJ"],
                    "140020110": ["新乐市", "XINLESHI", "XLE"],
                    "140020120": ["鹿泉市", "LUQUANSHI", "LUQ"],
                    "140020130": ["井陉县", "JINGXINGXIAN", "JJX"],
                    "140020140": ["正定县", "ZHENGDINGXIAN", "ZDJ"],
                    "140020150": ["栾城县", "LUANCHENGXIAN", "LCG"],
                    "140020160": ["行唐县", "XINGTANGXIAN", "XTG"],
                    "140020170": ["灵寿县", "LINGSHOUXIAN", "LSO"],
                    "140020180": ["高邑县", "GAOYIXIAN", "GYJ"],
                    "140020190": ["深泽县", "SHENZEXIAN", "SZX"],
                    "140020200": ["赞皇县", "ZANHUANGXIAN", "ZHG"],
                    "140020210": ["无极县", "WUJIXIAN", "WJI"],
                    "140020220": ["平山县", "PINGSHANXIAN", ""],
                    "140020230": ["元氏县", "YUANSHIXIAN", "YSI"],
                    "140020240": ["赵县", "ZHAOXIAN", "ZAO"],
                    "140030": ["保定", "BAODING", "BDS"],
                    "140040": ["承德", "CHENGDE", "CD"],
                    "140050": ["邯郸", "HANDAN", "HD"],
                    "140060": ["廊坊", "LANGFANG", "LFS"],
                    "140070": ["秦皇岛", "QINHUANGDAO", "SHP"],
                    "140080": ["唐山", "TANGSHAN", "TGS"],
                    "140090": ["张家口", "ZHANGJIAKOU", "ZJK"],
                    "140100": ["邢台", "XINGTAI", "XT"],
                    "140110": ["沧州", "CANGZHOU", "CGZ"],
                    "140120": ["衡水", "HENGSHUI", "HGS"],
                    "140130": ["燕郊", "YANJIAO", "YJ"],
                    "140140": ["固安", "GUAN", "GUA"],
                    "140150": ["遵化", "ZUNHUA", "ZNH"],
                    "140160": ["香河", "XIANGHE", "XGH"],
                    "140170": ["三河", "SANHE", "SNH"],
                    "150": ["河南省", "HENAN", "HEN"],
                    "150020": ["郑州", "ZHENGZHOU", "CGO"],
                    "150020010": ["金水区", "JINSHUIQU", "JSU"],
                    "150020020": ["邙山区", "MANGSHANQU", "MSQ"],
                    "150020030": ["二七区", "ERQIQU", "EQQ"],
                    "150020040": ["管城区", "GUANCHENGQU", "GCH"],
                    "150020050": ["中原区", "ZHONGYUANQU", "ZYQ"],
                    "150020060": ["上街区", "SHANGJIEQU", "SJE"],
                    "150020070": ["惠济区", "HUIJIQU", "HJQ"],
                    "150020080": ["郑东区", "ZHENGDONGXINQU", "ZDQ"],
                    "150020090": ["经济区", "JINGJIJISHUKAIFAQU", "JJQ"],
                    "150020100": ["高新区", "GAOXINKAIFAQU", "GXQ"],
                    "150020110": ["加工区", "CHUKOUJIAGONGQU", "JGQ"],
                    "150020120": ["巩义市", "GONGYISHI", "GYI"],
                    "150020130": ["荥阳市", "YINGYANGSHI", "XYK"],
                    "150020140": ["新密市", "XINMISHI", "XMI"],
                    "150020150": ["新郑市", "XINZHENGSHI", "XZG"],
                    "150020160": ["登封市", "DENGFENGSHI", ""],
                    "150020170": ["中牟县", "ZHONGMOUXIAN", "ZMO"],
                    "150030": ["开封", "KAIFENG", "KF"],
                    "150040": ["洛阳", "LUOYANG", "LYA"],
                    "150050": ["商丘", "SHANGQIU", "SQS"],
                    "150060": ["安阳", "ANYANG", "AY"],
                    "150070": ["平顶山", "PINGDINGSHAN", "PDS"],
                    "150080": ["新乡", "XINXIANG", "XXA"],
                    "150090": ["焦作", "JIAOZUO", "JZY"],
                    "150100": ["濮阳", "PUYANG", "PY"],
                    "150110": ["许昌", "XUCHANG", "XC"],
                    "150120": ["漯河", "LUOHE", "LHS"],
                    "150130": ["三门峡", "SHANMENXIA", "SMX"],
                    "150140": ["鹤壁", "HEBI", "HBS"],
                    "150150": ["周口", "ZHOUKOU", "ZK"],
                    "150160": ["驻马店", "ZHUMADIAN", "ZMD"],
                    "150170": ["南阳", "NANYANG", "NYS"],
                    "150180": ["信阳", "XINYANG", "XYG"],
                    "150190": ["济源", "JIYUAN", "JYY"],
                    "150200": ["西平", "XIPING", "XIP"],
                    "150210": ["长葛", "CHANGGE", "CGE"],
                    "160": ["黑龙江省", "HEILONGJIANG", "HL"],
                    "160020": ["哈尔滨", "HAERBIN", "HRB"],
                    "160020010": ["道里区", "DAOLIQU", "DLH"],
                    "160020020": ["南岗区", "NANGANGQU", "NGQ"],
                    "160020030": ["动力区", "DONGLIQU", "DGL"],
                    "160020040": ["平房区", "PINGFANGQU", "PFQ"],
                    "160020050": ["香坊区", "XIANGFANGQU", "XFQ"],
                    "160020060": ["太平区", "TAIPINGQU", "TPQ"],
                    "160020070": ["道外区", "DAOWAIQU", "DWQ"],
                    "160020080": ["阿城市", "ACHENGSHI", "ACG"],
                    "160020090": ["呼兰区", "HULANQU", "HLH"],
                    "160020100": ["松北区", "SONGBEIQU", ""],
                    "160020110": ["尚志市", "SHANGZHISHI", "SZI"],
                    "160020120": ["双城市", "SHUANGCHENGSHI", "SCS"],
                    "160020130": ["五常市", "WUCHANGSHI", "WCA"],
                    "160020140": ["方正县", "FANGZHENGXIAN", "FZH"],
                    "160020150": ["宾县", "BINXIAN", "BNX"],
                    "160020160": ["依兰县", "YILANXIAN", "YLH"],
                    "160020170": ["巴彦县", "BAYANXIAN", ""],
                    "160020180": ["通河县", "TONGHEXIAN", "TOH"],
                    "160020190": ["木兰县", "MULANXIAN", "MUL"],
                    "160020200": ["延寿县", "YANSHOUXIAN", "YSU"],
                    "160030": ["大庆", "DAQING", "DQG"],
                    "160040": ["佳木斯", "JIAMUSI", "JMU"],
                    "160050": ["牡丹江", "MUDANJIANG", "MDG"],
                    "160060": ["齐齐哈尔", "QIQIHAER", "NDG"],
                    "160070": ["鸡西", "JIXI", "JXI"],
                    "160080": ["鹤岗", "HEGANG", "HEG"],
                    "160090": ["双鸭山", "SHUANGYASHAN", "SYS"],
                    "160100": ["伊春", "YICHUN", ""],
                    "160110": ["七台河", "QITAIHE", "QTH"],
                    "160120": ["黑河", "HEIHE", "HEK"],
                    "160130": ["绥化", "SUIHUA", ""],
                    "160140": ["大兴安岭", "DAXINGANLING", ""],
                    "160150": ["安达", "ANDA", "ADA"],
                    "160160": ["双城", "SHUANGCHENG", "SCS"],
                    "160170": ["尚志", "SHANGZHI", "SZI"],
                    "160180": ["绥芬河", "SUIFENGHE", "SFE"],
                    "160190": ["肇东", "ZHAODONG", "ZDS"],
                    "170": ["湖北省", "HUBEI", "HB"],
                    "170020": ["武汉", "WUHAN", "WUH"],
                    "170020010": ["江岸区", "JIANGAN", "JAA"],
                    "170020020": ["江汉区", "JIANGHAN", "JHN"],
                    "170020030": ["硚口区", "QIAOKOU", "QKQ"],
                    "170020040": ["汉阳区", "HANYANG", "HYA"],
                    "170020050": ["武昌区", "WUCHANG", "WCQ"],
                    "170020060": ["青山区", "QINGSHAN", "QSN"],
                    "170020070": ["洪山区", "HONGSHAN", "HSQ"],
                    "170020080": ["蔡甸区", "CAIDIAN", "CDN"],
                    "170020090": ["江夏区", "JIANGXIA", "JXQ"],
                    "170020100": ["黄陂区", "HUANGPI", "HPI"],
                    "170020110": ["新洲区", "XINZHOU", "XNZ"],
                    "170020120": ["东西湖", "DONGXIHU", "DXH"],
                    "170020130": ["汉南区", "HANNAN", "HNQ"],
                    "170020140": ["开发区", "JINGJIKAIFAQU", ""],
                    "170030": ["十堰", "SHIYAN", "SYE"],
                    "170040": ["襄阳", "XIANGYANG", "XYA"],
                    "170050": ["宜昌", "YICHANG", ""],
                    "170060": ["潜江", "QIANJIANG", "QNJ"],
                    "170070": ["荆门", "JINGMEN", "JMS"],
                    "170080": ["荆州", "JINGZHOU", ""],
                    "170090": ["黄石", "HUANGSHI", ""],
                    "170100": ["鄂州", "EZHOU", "EZS"],
                    "170110": ["黄冈", "HUANGGANG", "HE"],
                    "170120": ["孝感", "XIAOGAN", "XGE"],
                    "170130": ["咸宁", "XIANNING", "XNS"],
                    "170140": ["随州", "SUIZHOU", "SZR"],
                    "170150": ["仙桃", "XIANTAO", "XNT"],
                    "170160": ["天门", "TIANMEN", "TMS"],
                    "170170": ["神农架", "SHENNONGJIA", "SNJ"],
                    "170180": ["恩施", "ENSHI", ""],
                    "170190": ["公安", "GONGAN", "GGA"],
                    "170200": ["武穴", "WUXUE", "WXE"],
                    "170210": ["宜城", "YICHENG", "YCW"],
                    "180": ["湖南省", "HUNAN", "HN"],
                    "180020": ["长沙", "CHANGSHA", ""],
                    "180020010": ["岳麓区", "YUELUQU", "YLU"],
                    "180020020": ["芙蓉区", "FURONGQU", "FRQ"],
                    "180020030": ["天心区", "TIANXINQU", "TXQ"],
                    "180020040": ["开福区", "KAIFUQU", "KFQ"],
                    "180020050": ["雨花区", "YUHUAQU", ""],
                    "180020060": ["开发区", "KAIFAQU", ""],
                    "180020070": ["浏阳市", "LIUYANGSHI", "LYS"],
                    "180020080": ["长沙县", "CHANGSHAXIAN", ""],
                    "180020090": ["望城区", "WANGCHENGQU", "WCH"],
                    "180020100": ["宁乡县", "NINGXIANGXIAN", "NXX"],
                    "180030": ["湘潭", "XIANGTAN", ""],
                    "180040": ["株洲", "ZHUZHOU", ""],
                    "180050": ["常德", "CHANGDE", "CDE"],
                    "180060": ["衡阳", "HENGYANG", ""],
                    "180070": ["益阳", "YIYANG", "YYS"],
                    "180080": ["郴州", "CHENZHOU", "CNZ"],
                    "180090": ["岳阳", "YUEYANG", ""],
                    "180100": ["邵阳", "SHAOYANG", ""],
                    "180110": ["张家界", "ZHANGJIAJIE", "ZJJ"],
                    "180120": ["娄底", "LOUDI", ""],
                    "180130": ["永州", "YONGZHOU", "YZS"],
                    "180140": ["怀化", "HUAIHUA", "HHS"],
                    "180150": ["湘西", "XIANGXI", "XXZ"],
                    "190": ["吉林省", "JILIN", ""],
                    "190020": ["长春", "CHANGCHUN", "CGQ"],
                    "190020010": ["朝阳区", "CHAOYANGQU", ""],
                    "190020020": ["宽城区", "KUANCHENGQU", ""],
                    "190020030": ["二道区", "ERDAOQU", ""],
                    "190020040": ["南关区", "NANGUANQU", "NGK"],
                    "190020050": ["绿园区", "LVYUANQU", "LYQ"],
                    "190020060": ["双阳区", "SHUANGYANGQU", "SYQ"],
                    "190020070": ["净月区", "JINGYUETANKAIFAQU", ""],
                    "190020080": ["高新区", "GAOXINQU", ""],
                    "190020090": ["经开区", "JINGKAIQU", ""],
                    "190020100": ["汽开区", "QICHECHANYEKAIFAQU", ""],
                    "190020110": ["德惠市", "DEHUISHI", "DEH"],
                    "190020120": ["九台市", "JIUTAISHI", "JUT"],
                    "190020130": ["榆树市", "YUSHUSHI", "YSS"],
                    "190020140": ["农安县", "NONGANXIAN", "NAJ"],
                    "190020160": ["经济区", "JINGJIKAIFAQU", ""],
                    "190030": ["吉林市", "JINLINSHI", ""],
                    "190040": ["四平", "SIPING", "SPS"],
                    "190050": ["辽源", "LIAOYUAN", "LYH"],
                    "190060": ["通化", "TONGHUAN", ""],
                    "190070": ["白山", "BAISHAN", "BSN"],
                    "190080": ["松原", "SONGYUAN", "SYU"],
                    "190090": ["白城", "BAICHENG", "BCS"],
                    "190100": ["延吉", "YANJI", "YNJ"],
                    "190110": ["延边", "YANBIAN", "YBZ"],
                    "190120": ["公主岭", "GONGZHULING", "GZL"],
                    "200": ["江西省", "JIANGXI", "JX"],
                    "200020": ["南昌", "NANCHANG", ""],
                    "200020010": ["东湖区", "DONGHUQU", "DHU"],
                    "200020020": ["西湖区", "XIHUQU", "XHQ"],
                    "200020030": ["青云谱", "QINGYUNPUQU", "QYP"],
                    "200020040": ["湾里区", "WANLIQU", "WLI"],
                    "200020050": ["青山湖", "QINGSHANHUQU", "QSN"],
                    "200020060": ["红谷滩", "HONGGUTANXINQU", ""],
                    "200020070": ["昌北区", "CHANGBEIQU", ""],
                    "200020080": ["高新区", "GAOXINQU", ""],
                    "200020090": ["南昌县", "NANCHANGXIAN", ""],
                    "200020100": ["新建县", "XINJIANXIAN", "XJN"],
                    "200020110": ["安义县", "ANYIXIAN", "AYI"],
                    "200020120": ["进贤县", "JINXIANXIAN", "JXX"],
                    "200020130": ["桑海区", "SANGHAIKAIFAQU", ""],
                    "200030": ["九江", "JIUJIANG", ""],
                    "200040": ["赣州", "GANZHOU", "GZH"],
                    "200050": ["宜春", "YI_CHUN", ""],
                    "200060": ["吉安", "JIAN", ""],
                    "200070": ["上饶", "SHANGRAO", ""],
                    "200080": ["抚州", "FU_ZHOU", "FZD"],
                    "200090": ["景德镇", "JINGDEZHEN", "JDZ"],
                    "200100": ["萍乡", "PINGXIANG", "PXS"],
                    "200110": ["新余", "XINYU", "XYU"],
                    "200120": ["鹰潭", "YINGTAN", "YTS"],
                    "210": ["辽宁省", "LIAONING", "LN"],
                    "210020": ["沈阳", "SHENYANG", "SHE"],
                    "210020010": ["沈河区", "SHENHEQU", "SHQ"],
                    "210020020": ["皇姑区", "HUANGGUQU", "HGU"],
                    "210020030": ["和平区", "HEPINGQU", ""],
                    "210020040": ["大东区", "DADONGQU", "DDQ"],
                    "210020050": ["铁西区", "TIEXIQU", "TXA"],
                    "210020060": ["苏家屯", "SUJIATUNQU", "SJT"],
                    "210020070": ["东陵区", "DONGLINGQU", "DLQ"],
                    "210020080": ["沈北区", "SHENBEIXINQU", ""],
                    "210020090": ["于洪区", "YUHONGQU", "YHQ"],
                    "210020100": ["浑南区", "HUNNANXINQU", ""],
                    "210020110": ["新民市", "XINMINSHI", "XMS"],
                    "210020120": ["辽中县", "LIAOZHONGXIAN", "LZL"],
                    "210020130": ["康平县", "KANGPINGXIAN", "KPG"],
                    "210020140": ["法库县", "FAKUXIAN", "FKU"],
                    "210030": ["鞍山", "ANSHAN", "ASN"],
                    "210040": ["大连", "DALIAN", "DLC"],
                    "210040010": ["西岗区", "XIGANG", "XGD"],
                    "210040020": ["中山区", "ZHONGSHAN", ""],
                    "210040030": ["沙河口", "SHAHEQU", ""],
                    "210040040": ["甘井子", "GANJINGZI", "GJZ"],
                    "210040050": ["旅顺口", "LVSHUNKOU", "LSK"],
                    "210040060": ["金州区", "JINZHOU", "JZH"],
                    "210040070": ["瓦房店", "WAFANGDIAN", "WFD"],
                    "210040080": ["普兰店", "PULANDIAN", ""],
                    "210040090": ["庄河市", "ZHUANGHE", "ZHH"],
                    "210040100": ["普湾区", "PUWANXINQU", ""],
                    "210040120": ["长海县", "CHANGHAIXIAN", "CHX"],
                    "210040130": ["新区", "XINQU", "XNQ"],
                    "210040140": ["开发区", "KAIFAQU", ""],
                    "210050": ["葫芦岛", "HULUDAO", "HLD"],
                    "210060": ["抚顺", "FUSHUN", ""],
                    "210070": ["本溪", "BENXI", ""],
                    "210080": ["丹东", "DANDONG", "DDG"],
                    "210090": ["锦州", "JINZHOU", "JNZ"],
                    "210100": ["营口", "YINGKOU", "YIK"],
                    "210110": ["阜新", "FUXIN", ""],
                    "210120": ["辽阳", "LIAOYANG", ""],
                    "210130": ["盘锦", "PANJIN", "PJS"],
                    "210140": ["铁岭", "TIELING", ""],
                    "210150": ["朝阳", "CHAOYANG", ""],
                    "210160": ["兴城", "XINGCHENG", "XCL"],
                    "210170": ["海城", "HAICHENG", ""],
                    "210180": ["昌图", "CHANGTU", "CTX"],
                    "210190": ["开原", "KAIYUAN", "KYS"],
                    "220": ["内蒙古", "NEIMENGGU", "NM"],
                    "220020": ["呼和浩特", "HUHEHAOTE", "Hhht"],
                    "220020010": ["回民区", "HUIMINQU", "HMQ"],
                    "220020020": ["玉泉区", "YUQUANQU", "YQN"],
                    "220020030": ["新城区", "XINCHENGQU", ""],
                    "220020040": ["赛罕区", "SAIHANQU", ""],
                    "220020050": ["清水河", "QINGSHUIHEXIAN", ""],
                    "220020060": ["土左旗", "TUMOTEZUOQI", ""],
                    "220020070": ["托克托", "TUOKETUOXIAN", "TOG"],
                    "220020080": ["格尔县", "HELINGEERXIAN", "GOS"],
                    "220020090": ["武川县", "WUCHUANXIAN", "WCX"],
                    "220030": ["包头", "BAOTOU", "BTS"],
                    "220040": ["赤峰", "CHIFENG", "CFS"],
                    "220050": ["鄂尔多斯", "EERDUOSI", ""],
                    "220060": ["乌海", "WUHAI", "WHM"],
                    "220070": ["通辽", "TONGLIAO", "TLO"],
                    "220080": ["呼伦贝尔", "HULUNBEIER", "HBM"],
                    "220090": ["巴彦淖尔", "BAYANNAOER", ""],
                    "220100": ["乌兰察布", "WULANCHABU", ""],
                    "220110": ["兴安盟", "XINGANMENG", ""],
                    "220120": ["锡林郭勒盟", "XILINGUOLEMENG", "XGO"],
                    "220130": ["阿拉善盟", "ALASHANMENG", "ALM"],
                    "220140": ["乌审旗", "WUSHENQI", "UXI"],
                    "220150": ["满洲里", "MANZHOULI", "MLX"],
                    "230": ["宁夏", "NINGXIA", "NX"],
                    "230020": ["银川", "YINCHUAN", "INC"],
                    "230020010": ["西夏区", "XIXIAQU", ""],
                    "230020020": ["金凤区", "JINFENGQU", ""],
                    "230020030": ["兴庆区", "XINGQINGQU", ""],
                    "230020040": ["灵武市", "LINGWUSHI", "LWU"],
                    "230020050": ["永宁县", "YONGNINGXIAN", "YGN"],
                    "230020060": ["贺兰县", "HELANXIAN", "HLN"],
                    "230020100": ["青铜峡", "QINGTONGXIA", "QTX"],
                    "230030": ["石嘴山", "SHIZUISHAN", ""],
                    "230040": ["吴忠", "WUZHONG", "WZS"],
                    "230050": ["固原", "GUYUAN", ""],
                    "230060": ["中卫", "ZHONGWEI", "ZWE"],
                    "240": ["青海省", "QINGHAI", "QH"],
                    "240020": ["西宁", "XINING", "XNN"],
                    "240020010": ["城中区", "CHENGZHONGQU", "CZQ"],
                    "240020020": ["城东区", "CHENGDONGQU", "CDQ"],
                    "240020030": ["城西区", "CHENGXIQU", "CXQ"],
                    "240020040": ["城北区", "CHENGBEIQU", "CBE"],
                    "240020050": ["湟中县", "HUANGZHONGXIAN", "HZX"],
                    "240020060": ["湟源县", "HUANGYUANXIAN", "HYU"],
                    "240020070": ["大通", "DATONG", ""],
                    "240020080": ["城南区", "CHENGNANXINQU", "CNN"],
                    "240020090": ["海湖区", "HAIHUXINQU", ""],
                    "240030": ["海东", "HAIDONG", "HDD"],
                    "240040": ["海西", "HAIXI", "HXZ"],
                    "240050": ["海北", "HAIBEI", "HBZ"],
                    "240060": ["黄南", "HUANGNAN", "HNZ"],
                    "240070": ["海南", "HAINAN", ""],
                    "240080": ["果洛", "GUOLUO", "GOL"],
                    "240090": ["玉树", "YUSHU", ""],
                    "250": ["山东省", "SHANDONG", "SD"],
                    "250020": ["济南", "JINAN", "JNA"],
                    "250020010": ["市中区", "SHIZHONGQU", "SZP"],
                    "250020020": ["历下区", "LIXIAQU", "LXQ"],
                    "250020030": ["天桥区", "TIANQIAOQU", "TQQ"],
                    "250020040": ["槐荫区", "HUAIYINQU", "HYF"],
                    "250020050": ["历城区", "LICHENGQU", "LCZ"],
                    "250020060": ["长清区", "CHANGQINGQU", "CQG"],
                    "250020070": ["章丘市", "ZHANGQIUSHI", "ZQS"],
                    "250020080": ["平阴县", "PINGYINXIAN", "PYL"],
                    "250020090": ["济阳县", "JIYANGXIAN", "JYL"],
                    "250020100": ["商河县", "SHANGHEXIAN", "SGH"],
                    "250020110": ["高新区", "GAOXINQU", ""],
                    "250020120": ["近郊", "JINJIAO", ""],
                    "250030": ["德州", "DEZHOU", "DZS"],
                    "250040": ["东营", "DONGYING", ""],
                    "250050": ["济宁", "JINING", "JNG"],
                    "250060": ["临沂", "LINYI", "LYI"],
                    "250070": ["青岛", "QINGDAO", "TAO"],
                    "250070010": ["市南区", "SHINANQU", "SNQ"],
                    "250070020": ["市北区", "SHIBEIQU", "SBQ"],
                    "250070030": ["城阳区", "CHENGYANGQU", "CEY"],
                    "250070040": ["四方区", "SIFANGQU", ""],
                    "250070050": ["李沧区", "LICANGQU", "LCT"],
                    "250070060": ["黄岛区", "HUANGDAOQU", "HDO"],
                    "250070070": ["崂山区", "LAOSHANQU", "LQD"],
                    "250070080": ["胶州市", "JIAOZHOUSHI", "JZS"],
                    "250070090": ["即墨市", "JIMOSHI", "JMO"],
                    "250070100": ["平度市", "PINGDUSHI", "PDU"],
                    "250070110": ["胶南市", "JIAONANSHI", "JNS"],
                    "250070120": ["莱西市", "LAIXISHI", "LXE"],
                    "250080": ["日照", "RIZHAO", "RZH"],
                    "250090": ["泰安", "TAIAN", "TAI"],
                    "250100": ["威海", "WEIHAI", "WEH"],
                    "250110": ["潍坊", "WEIFANG", "WEF"],
                    "250120": ["烟台", "YANTAI", "YNT"],
                    "250130": ["淄博", "ZIBO", "ZBO"],
                    "250140": ["枣庄", "ZAOZHUANG", "ZZG"],
                    "250150": ["滨州", "BINZHOU", ""],
                    "250160": ["聊城", "LIAOCHENG", "LCH"],
                    "250170": ["菏泽", "HEZE", "HZS"],
                    "250180": ["莱芜", "LAIWU", "LWS"],
                    "250190": ["荣成", "RONGCHENG", ""],
                    "250200": ["黄岛", "HUANGDAO", "HDO"],
                    "250210": ["乳山", "RUSHAN", "RSN"],
                    "250220": ["城阳", "CHENGYANG", "CEY"],
                    "250230": ["即墨", "JIMO", "JMO"],
                    "250240": ["肥城", "FEICHENG", "FEC"],
                    "250250": ["兖州", "YANZHOU", "YZL"],
                    "250260": ["海阳", "HAIYANG", "HYL"],
                    "250270": ["胶州", "JIAOZHOU", "JZS"],
                    "250280": ["胶南", "JIAONAN", "JNS"],
                    "250290": ["平度", "PINGDU", "PDU"],
                    "250300": ["莱西", "LAIXI", "LXE"],
                    "260": ["山西省", "SHANXI", "SX"],
                    "260020": ["太原", "TAIYUAN", "TYN"],
                    "260020010": ["杏花岭", "XINGHUALINGQU", "XHL"],
                    "260020020": ["小店区", "XIAODIANQU", "XDQ"],
                    "260020030": ["迎泽区", "YINGZEQU", "YZT"],
                    "260020040": ["尖草坪", "JIANCAOPINGQU", "JCP"],
                    "260020050": ["万柏林", "WANBAILINQU", "WBL"],
                    "260020060": ["晋源区", "JINYUANQU", "JYM"],
                    "260020070": ["高新区", "GAOXINQU", ""],
                    "260020080": ["开发区", "JINGJIKAIFAQU", ""],
                    "260020090": ["工业园", "GONGYEYUANQU", ""],
                    "260020100": ["清徐县", "QINGXUXIAN", "QXU"],
                    "260020110": ["阳曲县", "YANGQUXIAN", "YGQ"],
                    "260020120": ["娄烦县", "LOUFANXIAN", "LFA"],
                    "260020130": ["古交市", "GUJIAOSHI", "GUJ"],
                    "260030": ["大同", "DATONG", ""],
                    "260040": ["临汾", "LINFEN", ""],
                    "260050": ["运城", "YUNCHENG", ""],
                    "260060": ["长治", "CHANGZHI", ""],
                    "260070": ["阳泉", "YANGQUAN", "YQS"],
                    "260080": ["晋城", "JINCHENG", "JCG"],
                    "260090": ["朔州", "SHUOZHOU", "SZJ"],
                    "260100": ["晋中", "JINZHONG", "JZD"],
                    "260110": ["忻州", "XINZHOU", ""],
                    "260120": ["吕梁", "LVLIANG", "LLD"],
                    "260130": ["永济", "YONGJI", "YJJ"],
                    "260140": ["和顺", "HESHUN", "HSJ"],
                    "270": ["陕西省", "SHANXI", "SN"],
                    "270020": ["西安", "XIAN", ""],
                    "270020010": ["莲湖区", "LIANHUQU", "LHU"],
                    "270020020": ["新城区", "XINCHENGQU", ""],
                    "270020030": ["碑林区", "BEILINQU", "BLQ"],
                    "270020040": ["雁塔区", "YANTAQU", "YTA"],
                    "270020050": ["灞桥区", "BAQIAOQU", "BQQ"],
                    "270020060": ["未央区", "WEIYANGQU", "610112"],
                    "270020070": ["阎良区", "YANLIANGQU", "YLQ"],
                    "270020080": ["临潼区", "LINTONGQU", "LTG"],
                    "270020090": ["长安区", "CHANGANQU", ""],
                    "270020100": ["蓝田县", "LANTIANXIAN", "LNT"],
                    "270020110": ["周至县", "ZHOUZHIXIAN", "ZOZ"],
                    "270020120": ["户县", "HUXIAN", "HUX"],
                    "270020130": ["高陵县", "GAOLINGXIAN", "GLS"],
                    "270020140": ["经开区", "JINGKAIQU", ""],
                    "270020150": ["高新区", "GAOXINQU", ""],
                    "270030": ["宝鸡", "BAOJI", ""],
                    "270040": ["咸阳", "XIANYANG", "XYS"],
                    "270050": ["铜川", "TONGCHUAN", "TCN"],
                    "270060": ["渭南", "WEINAN", "WNA"],
                    "270070": ["汉中", "HANZHONG", "HZJ"],
                    "270080": ["安康", "ANKANG", ""],
                    "270090": ["商洛", "SHANGLUO", "SLD"],
                    "270100": ["延安", "YANAN", "YNA"],
                    "270110": ["榆林", "YU_LIN", ""],
                    "270120": ["杨凌", "YANGLING", ""],
                    "270130": ["兴平", "XINGPING", "XPG"],
                    "280": ["四川省", "SICHUAN", "SC"],
                    "280020": ["成都", "CHENGDU", "CTU"],
                    "280020010": ["成华区", "CHENGHUA", "CHQ"],
                    "280020020": ["武侯区", "WUHOU", "WHQ"],
                    "280020030": ["青羊区", "QINGYANG", "QYQ"],
                    "280020040": ["锦江区", "JINJIANG", "JJQ"],
                    "280020050": ["金牛区", "JINNIU", "JNU"],
                    "280020060": ["龙泉驿", "LONGQUANYI", ""],
                    "280020070": ["青白江", "QINGBAIJIANG", "QBJ"],
                    "280020080": ["新都区", "XINDU", "XDU"],
                    "280020090": ["双流县", "SHUANGLIU", "SLU"],
                    "280020100": ["郫县", "PIXIAN", "PIX"],
                    "280020110": ["温江区", "WENJIANG", "WNJ"],
                    "280020120": ["大邑县", "DAYI", "DYI"],
                    "280020130": ["金堂县", "JINTANG", "JNT"],
                    "280020140": ["蒲江县", "PUJIANG", "PJX"],
                    "280020150": ["新津县", "XINJIN", "XJC"],
                    "280020170": ["高新区", "GAOXINQU", ""],
                    "280020180": ["高新西", "GAOXINXIQU", ""],
                    "280020190": ["都江堰", "DOUJIANGYANSHI", "DJY"],
                    "280020200": ["彭州市", "PENGZHOUSHI", "PZS"],
                    "280020210": ["邛崃市", "QIONGLAISHI", "QLA"],
                    "280020220": ["崇州市", "CHONGZHOUSHI", "CZO"],
                    "280030": ["乐山", "LESHAN", "LES"],
                    "280040": ["泸州", "LUZHOU", "LUZ"],
                    "280050": ["绵阳", "MIANYANG", "MYG"],
                    "280060": ["内江", "NEIJIANG", "NJS"],
                    "280070": ["宜宾", "YIBIN", ""],
                    "280080": ["自贡", "ZIGONG", "ZGS"],
                    "280090": ["攀枝花", "PANZHIHUA", "PZH"],
                    "280100": ["德阳", "DEYANG", "DEY"],
                    "280110": ["广元", "GUANGYUAN", "GYC"],
                    "280120": ["遂宁", "SUINING", "SNS"],
                    "280130": ["南充", "NANCHONG", "NCO"],
                    "280140": ["眉山", "MEISHAN", ""],
                    "280150": ["广安", "GUANGAN", ""],
                    "280160": ["达州", "DAZHOU", ""],
                    "280170": ["雅安", "YAAN", ""],
                    "280180": ["巴中", "BAZHONG", ""],
                    "280190": ["资阳", "ZIYANG", ""],
                    "280200": ["西昌", "XICHANG", "XCA"],
                    "280210": ["甘孜", "GANZI", ""],
                    "280220": ["阿坝", "ABEI", ""],
                    "280230": ["凉山", "LIANGSHAN", "LSY"],
                    "280240": ["峨眉", "EMEI", "EMS"],
                    "280250": ["简阳", "JIANYANG", "JYC"],
                    "290": ["西藏", "XIZANG", "XZ"],
                    "290020": ["拉萨", "LASA", "LXA"],
                    "290020010": ["城关区", "CHENGGUANQU", "CLZ"],
                    "290020020": ["林周县", "LINZHOUXIAN", "LZB"],
                    "290020030": ["当雄县", "DANGXIONGXIAN", "DAM"],
                    "290020040": ["尼木县", "NIMUXIAN", "NYE"],
                    "290020050": ["曲水县", "QUSHUIXIAN", "QUX"],
                    "290020060": ["龙德庆", "DUILONGDEQINGXIAN", ""],
                    "290020070": ["达孜县", "DAZIXIAN", "DAG"],
                    "290020080": ["工卡县", "MOZHUGONGKAXIAN", ""],
                    "290030": ["日喀则", "RIKAZE", ""],
                    "290040": ["林芝", "LINZHI", ""],
                    "290050": ["山南", "SHANNAN", "SND"],
                    "290060": ["昌都", "CHANGDU", ""],
                    "290070": ["那曲", "NAQU", ""],
                    "290080": ["阿里", "ALI", "NGD"],
                    "300": ["新疆", "XINJIANG", "XJ"],
                    "300020": ["乌鲁木齐", "WULUMUQI", ""],
                    "300020010": ["天山区", "TIANSHANQU", "TSL"],
                    "300020020": ["巴克区", "SHAYIBAKEQU", ""],
                    "300020030": ["新市区", "XINSHIQU", "XSU"],
                    "300020040": ["水磨沟", "SHUIMOGOUQU", "SMG"],
                    "300020050": ["头屯河", "TOUTUNHEQU", "TTH"],
                    "300020060": ["达坂城", "DABANCHENGQU", ""],
                    "300020070": ["米东区", "MIDONGQU", ""],
                    "300020080": ["乌县", "WULUMUQIXIAN", ""],
                    "300020090": ["昌吉市", "CHANGJISHI", ""],
                    "300020110": ["阜康市", "FUKANGSHI", "FKG"],
                    "300030": ["喀什", "KASHI", ""],
                    "300040": ["克拉玛依", "KELAMAYI", ""],
                    "300050": ["伊犁", "YILI", ""],
                    "300060": ["阿克苏", "AKESU", ""],
                    "300070": ["哈密", "HAMI", ""],
                    "300080": ["石河子", "SHIHEZI", "SHZ"],
                    "300090": ["阿拉尔", "ALAER", ""],
                    "300100": ["五家渠", "WUJIAQU", ""],
                    "300110": ["图木舒克", "TUMUSHUKE", ""],
                    "300120": ["昌吉", "CHANGJI", ""],
                    "300130": ["阿勒泰", "ALETAI", ""],
                    "300140": ["吐鲁番", "TULUFAN", ""],
                    "300150": ["塔城", "TACHENG", ""],
                    "300160": ["和田", "HETIAN", ""],
                    "300180": ["巴音郭楞", "BAYINGUOLENG", "BAG"],
                    "300190": ["博尔塔拉", "BOERTALA", "BOR"],
                    "300200": ["奎屯市", "KUITUNSHI", "KUY"],
                    "300210": ["乌苏", "WUSU", "USU"],
                    "300170": ["克州", "KEZILESUKEERKEZI", ""],
                    "310": ["云南省", "YUNNAN", "YN"],
                    "310020": ["昆明", "KUNMING", "KMG"],
                    "310020010": ["盘龙区", "PANLONGQU", "PLQ"],
                    "310020020": ["五华区", "WUHUAQU", ""],
                    "310020030": ["官渡区", "GUANDUQU", "GDU"],
                    "310020040": ["西山区", "XISHANQU", "XSN"],
                    "310020050": ["东川区", "DONGCHUANQU", "DCU"],
                    "310020060": ["安宁市", "ANNINGSHI", ""],
                    "310020070": ["呈贡新", "CHENGGONGXINQU", "CGD"],
                    "310020080": ["晋宁新", "JINNINGXINQU", "JND"],
                    "310020090": ["富民区", "FUMINQU", "FMN"],
                    "310020100": ["宜良区", "YILIANGQU", "YIL"],
                    "310020110": ["嵩明区", "SONGMINGQU", "SMI"],
                    "310020120": ["石林县", "SHILINXIAN", "SLY"],
                    "310020130": ["禄劝", "LUQUAN", "LUC"],
                    "310020140": ["寻甸", "XUNDIAN", "XDN"],
                    "310030": ["大理", "DALI", ""],
                    "310040": ["丽江", "LIJIANG", ""],
                    "310050": ["玉溪", "YUXI", "YXS"],
                    "310060": ["曲靖", "QUJING", "QJS"],
                    "310070": ["保山", "BAOSHAN", ""],
                    "310080": ["昭通", "ZHAOTONG", ""],
                    "310090": ["普洱", "PUER", "PER"],
                    "310100": ["临沧", "LINCANG", ""],
                    "310110": ["红河", "HONGHE", ""],
                    "310120": ["文山", "WENSHAN", ""],
                    "310130": ["西双版纳", "XISHUANGBANNA", "XSB"],
                    "310140": ["德宏", "DEHONG", "DHG"],
                    "310150": ["楚雄", "CHUXIONG", ""],
                    "310160": ["怒江", "NUJIANG", "NUJ"],
                    "310170": ["迪庆", "DIQING", "DEZ"],
                    "310180": ["思茅", "SIMAO", ""],
                    "320": ["香港", "HONGKONG", "HK"],
                    "320010010": ["沙田区", "SHATIANQU", ""],
                    "320010020": ["东区", "DONGQU", "DQP"],
                    "320010030": ["观塘区", "GUANTANGQU", ""],
                    "320010040": ["黄大仙", "HUANGDAXIANQU", ""],
                    "320010050": ["九龙城", "JIULONGCHENGQU", "JLC"],
                    "320010060": ["屯门区", "TUNMENQU", ""],
                    "320010070": ["葵青区", "KUIQINGQU", ""],
                    "320010080": ["元朗区", "YUANLANGQU", ""],
                    "320010090": ["深水埗", "SHENSHUIBUQU", ""],
                    "320010100": ["西贡区", "XIGONGQU", ""],
                    "320010110": ["大埔区", "DAPUQU", "DBX"],
                    "320010120": ["湾仔区", "WANZIQU", ""],
                    "320010130": ["油尖旺", "YOUJIANWANGQU", ""],
                    "320010140": ["北区", "BEIQU", ""],
                    "320010150": ["南区", "NANQU", ""],
                    "320010160": ["荃湾区", "QUANWANQU", ""],
                    "320010170": ["中西区", "ZHONGXIQU", ""],
                    "320010180": ["离岛区", "LIDAOQU", ""],
                    "330": ["澳门", "MACAO", ""],
                    "340": ["台湾", "TAIWAN", "TW"],
                    "340010010": ["台北", "TAIBEI", ""],
                    "340010020": ["高雄", "GAOXIONG", ""],
                    "340010030": ["基隆", "JILONG", ""],
                    "340010040": ["台中", "TAIZHONG", ""],
                    "340010050": ["台南", "TAINAN", ""],
                    "340010060": ["新竹", "XINZHU", ""],
                    "340010070": ["嘉义", "JIAYI", ""],
                    "340010080": ["宜兰县", "YILANXIAN", ""],
                    "340010090": ["桃园县", "TAOYUANXIAN", ""],
                    "340010100": ["苗栗县", "MIAOLIXIAN", ""],
                    "340010110": ["彰化县", "ZHANGHUAXIAN", ""],
                    "340010120": ["南投县", "NANTOUXIAN", ""],
                    "340010130": ["云林县", "YUNLINXIAN", ""],
                    "340010140": ["屏东县", "PINGDONGXIAN", ""],
                    "340010150": ["台东县", "TAIDONGXIAN", ""],
                    "340010160": ["花莲县", "HUALIANXIAN", ""],
                    "340010170": ["澎湖县", "PENGHUXIAN", ""],
                    "350": ["亚洲", "Asia", ""],
                    "350020": ["蒙古", "Mongolia", ""],
                    "350030": ["朝鲜", "North Korea", ""],
                    "350040": ["韩国", "Korea", ""],
                    "350050": ["日本", "Japan", ""],
                    "350060": ["菲律宾", "Philippines", ""],
                    "350070": ["越南", "Vietnam", ""],
                    "350080": ["老挝", "Laos", ""],
                    "350090": ["柬埔寨", "Cambodia", ""],
                    "350100": ["缅甸", "Burma", ""],
                    "350110": ["泰国", "Thailand", ""],
                    "350120": ["马来西亚", "Malaysia", ""],
                    "350130": ["文莱", "Brunei", ""],
                    "350140": ["新加坡", "Singapore", ""],
                    "350150": ["印度尼西亚", "Indonesia", ""],
                    "350160": ["东帝汶", "east Timor", ""],
                    "350170": ["尼泊尔", "Nepal", ""],
                    "350180": ["不丹", "Bhutan", ""],
                    "350190": ["孟加拉", "Bangladesh", ""],
                    "350200": ["印度", "India", ""],
                    "350210": ["巴基斯坦", "Pakistan", ""],
                    "350220": ["斯里兰卡", "Sri Lanka", ""],
                    "350230": ["马尔代夫", "Maldives", ""],
                    "350240": ["哈萨克斯坦", "Kazakhstan", ""],
                    "350250": ["吉尔吉斯", "Kyrghyzstan", ""],
                    "350260": ["塔吉克斯坦", "Tajikistan", ""],
                    "350270": ["乌兹别克", "Uzbekistan", ""],
                    "350280": ["土库曼斯坦", "Turkmenistan", ""],
                    "350290": ["阿富汗", "Afghanistan", ""],
                    "350300": ["伊拉克", "Iraq", ""],
                    "350310": ["伊朗", "Iran", ""],
                    "350320": ["叙利亚", "Syria", ""],
                    "350330": ["约旦", "Jordan", ""],
                    "350340": ["黎巴嫩", "Lebanon", ""],
                    "350350": ["以色列", "Israel", ""],
                    "350360": ["巴勒斯坦", "Palestine", ""],
                    "350370": ["沙特阿拉伯", "Saudi Arabia", ""],
                    "350380": ["巴林", "Bahrain", ""],
                    "350390": ["卡塔尔", "Qatar", ""],
                    "350400": ["科威特", "Kuwait", ""],
                    "350410": ["阿联酋", "United Arab Emirates", ""],
                    "350420": ["阿曼", "Oman", ""],
                    "350430": ["也门", "Yemen", ""],
                    "350440": ["格鲁吉亚", "Georgia", ""],
                    "350450": ["亚美尼亚", "Armenia", ""],
                    "350460": ["阿塞拜疆", "Azerbaijan", ""],
                    "350470": ["土耳其", "Turkey", ""],
                    "350480": ["塞浦路斯", "Cyprus", ""],
                    "360": ["北美洲", "North America", ""],
                    "360020": ["加拿大", "Canada", ""],
                    "430010": ["阿尔伯塔省", "Alberta", ""],
                    "430010010": ["卡尔加里", "Calgary", ""],
                    "430010020": ["埃德蒙顿", "Edmonton", ""],
                    "430020": ["不列颠哥伦比亚省", "British Columbia", ""],
                    "430020010": ["温哥华", "Vancouver", ""],
                    "430020020": ["素里", "Surrey", ""],
                    "430020030": ["本拿比", "Burnaby", ""],
                    "430020040": ["列治文", "Richmond", ""],
                    "430030": ["曼尼托巴省", "Manitoba", ""],
                    "430030010": ["温尼伯", "Winnipeg", ""],
                    "430040": ["纽芬兰与拉布拉多省", "Newfoundland and Labrador", ""],
                    "430050": ["新不伦瑞克省", "New Brunswick", ""],
                    "430060": ["新斯科舍省", "Nova Scotia", ""],
                    "430060030": ["哈利法克斯", "Halifax", ""],
                    "430070": ["安大略省", "Ontario", ""],
                    "430070010": ["多伦多", "Toronto", "DLM"],
                    "430070020": ["渥太华", "Ottawa", ""],
                    "430070030": ["密西沙加", "Mississauga", ""],
                    "430070040": ["宾顿", "Brampton", ""],
                    "430070050": ["汉密尔顿", "Hamilton", ""],
                    "430070060": ["伦敦", "London", ""],
                    "430070070": ["万锦", "Markham", ""],
                    "430070080": ["旺市", "Vaughan", ""],
                    "430070090": ["基奇纳", "Kitchener", ""],
                    "430070100": ["温莎", "Windsor", ""],
                    "430070110": ["列治文山", "Richmond Hill", ""],
                    "430070120": ["奥克维尔", "Okville", ""],
                    "430070130": ["伯灵顿", "Burlington", ""],
                    "430070140": ["萨德伯里", "Greater Sudbury", ""],
                    "430080": ["爱德华王子岛省", "Prince Edward Island", ""],
                    "430090": ["魁北克省", "Quebec", ""],
                    "430090010": ["蒙特利尔", "Montreal", ""],
                    "430090020": ["魁北克城", "Quebec City", ""],
                    "430090030": ["拉瓦尔", "Laval", ""],
                    "430090040": ["加蒂诺", "Gatineau", ""],
                    "430090050": ["朗基尔", "Longueuil", ""],
                    "430090060": ["舍布鲁克", "Sherbrooke", ""],
                    "430100": ["萨斯喀彻温省", "Saskatchewan", ""],
                    "430100010": ["萨斯卡通", "Saskatoon", ""],
                    "430100020": ["里贾纳", "Regina", ""],
                    "430110": ["努纳武特地区", "Nunavut", ""],
                    "430120": ["西北地区", "Northwest Territories", ""],
                    "430130": ["育空地区", "Yukon", ""],
                    "360030": ["美国", "America", ""],
                    "420010": ["亚拉巴马州", "Alabama", ""],
                    "420010010": ["伯明翰", "Birmingham", ""],
                    "420010020": ["蒙哥马利", "Montgomery", ""],
                    "420010030": ["亨次维尔", "Huntsville", ""],
                    "420010040": ["塔斯卡卢萨", "Tuscaloosa", ""],
                    "420010050": ["莫比尔港", "Mobile", ""],
                    "420020": ["阿拉斯加州", "Alaska", ""],
                    "420020010": ["朱诺", "Juneau", ""],
                    "420020020": ["安克拉奇", "Anchorage", ""],
                    "420030": ["亚利桑那州", "Arizona", ""],
                    "420030010": ["菲尼克斯[凤凰城]", "Phoenix", ""],
                    "420030020": ["图森", "Tucson", ""],
                    "420040": ["阿肯色州", "Arkansas", ""],
                    "420040010": ["小石城", "Little Rock", ""],
                    "420050": ["加利福尼亚州", "California", ""],
                    "420050010": ["萨克拉门托", "Sacramento", ""],
                    "420050020": ["索诺马", "Sonoma", ""],
                    "420050030": ["圣荷西", "San Jose", ""],
                    "420050040": ["洛杉矶", "Los Angeles", ""],
                    "420050050": ["圣地亚哥", "San Diego", ""],
                    "420060": ["科罗拉多州", "Colorado", ""],
                    "420060010": ["丹佛", "Denver", ""],
                    "420060020": ["波尔德", "Boulder", ""],
                    "420070": ["康涅狄格州", "Connecticut", ""],
                    "420080": ["特拉华州", "Delaware", ""],
                    "420080010": ["多佛", "Dover", ""],
                    "420080020": ["维明顿", "Wilmington", ""],
                    "420080030": ["纽华克", "Newark", ""],
                    "420090": ["佛罗里达州", "Florida", ""],
                    "420090010": ["塔拉赫西", "Tallahassee", ""],
                    "420090020": ["坦帕", "Tampa", ""],
                    "420090030": ["杰克逊维尔", "Jacksonville", ""],
                    "420090040": ["迈阿密", "Miami", ""],
                    "420100": ["乔治亚州", "Georgia", ""],
                    "420100010": ["亚特兰大", "Atlanta", ""],
                    "420100020": ["哥伦布", "Columbus", ""],
                    "420110": ["夏威夷州", "Hawaii", ""],
                    "420120": ["爱达荷州", "Boise", ""],
                    "420120010": ["波夕", "Atlanta", ""],
                    "420120020": ["波卡特洛", "Pocatello", ""],
                    "420130": ["伊利诺伊州", "Illinois", ""],
                    "420130010": ["春田", "Springfield", ""],
                    "420130020": ["芝加哥", "Chicago", ""],
                    "420140": ["印第安那州", "Indiana", ""],
                    "420140010": ["印第安纳波利斯", "Indianapolis", ""],
                    "420140020": ["韦恩堡", "Fort Wayne", ""],
                    "420140030": ["伯明顿", "Bloomington", ""],
                    "420150": ["爱荷华州", "Iowa", ""],
                    "420150010": ["得梅因", "Des Moines", ""],
                    "420150020": ["锡达拉皮兹", "Cedar Rapids", ""],
                    "420150030": ["丹芬堡特", "Daven Port", ""],
                    "420160": ["堪萨斯州", "Kansas", ""],
                    "420160010": ["托皮卡", "Topeka", ""],
                    "420160020": ["威奇托", "Wichita", ""],
                    "420160030": ["堪萨斯城", "Kansas City", ""],
                    "420170": ["肯塔基州", "Kentucky", ""],
                    "420170010": ["路易斯维尔", "Louisville", ""],
                    "420170020": ["列克星敦", "Lexington", ""],
                    "420180": ["路易斯安那州", "Louisiana", ""],
                    "420180010": ["新奥尔良", "New Orleans", ""],
                    "420190": ["缅因州", "Maine", ""],
                    "420190010": ["奥古斯塔", "Augusta", ""],
                    "420200": ["马里兰州", "Maryland", ""],
                    "420200010": ["安纳波利斯", "Annapolis", ""],
                    "420200020": ["巴尔的摩", "Baltimore", ""],
                    "420210": ["麻萨诸塞州", "Massachusetts", ""],
                    "420210010": ["波士顿", "Boston", ""],
                    "420220": ["密歇根州", "Michigan", ""],
                    "420220010": ["兰辛", "Lansing", ""],
                    "420220020": ["底特律", "Detroit", ""],
                    "420220030": ["大溪城", "Grand Rapids", ""],
                    "420230": ["明尼苏达州", "Minnesota", ""],
                    "420230010": ["圣保罗", "Saint Paul", ""],
                    "420230020": ["明尼阿波利斯", "Minneapolis", ""],
                    "420240": ["密西西比州", "Mississippi", ""],
                    "420240010": ["杰克逊", "Jackson", ""],
                    "420250": ["密苏里州", "Missouri", ""],
                    "420250010": ["杰佛逊城", "Jefferson City", ""],
                    "420250020": ["圣路易斯", "Saint Louis", ""],
                    "420250030": ["堪萨斯城", "Kansas City", ""],
                    "420250040": ["洛拉", "Rolla", ""],
                    "420260": ["蒙大拿州", "Montana", ""],
                    "420260010": ["海伦娜", "Heldna", "HLU"],
                    "420260020": ["比林斯", "Billings", ""],
                    "420260030": ["密苏拉", "Missoula", ""],
                    "420270": ["内布拉斯加州", "Nebraska", ""],
                    "420270010": ["林肯", "Lincoln", ""],
                    "420280": ["内华达州", "Nevada", ""],
                    "420280010": ["卡森城", "Carson City", ""],
                    "420280020": ["拉斯维加斯", "Las Vegas", ""],
                    "420280030": ["里诺", "Reno", ""],
                    "420290": ["新罕布什尔州", "New Hampshire", ""],
                    "420290010": ["曼彻斯特", "Manchester", ""],
                    "420290020": ["南雪", "Nashua", ""],
                    "420290030": ["朴次茅斯", "Portsmouth", ""],
                    "420300": ["新泽西州", "New Jersey", ""],
                    "420300010": ["纽瓦克", "Newark", ""],
                    "420300020": ["泽西市", "Jersey City", ""],
                    "420300030": ["大西洋城", "Atlantic City", ""],
                    "420300040": ["依丽沙白", "Elizabeth", ""],
                    "420310": ["新墨西哥州", "New Mexico", ""],
                    "420310010": ["圣达菲", "Santa Fe", ""],
                    "420310020": ["阿尔布开克", "Albuquerque", ""],
                    "420320": ["纽约州", "New York", ""],
                    "420320010": ["奥尔巴尼[水牛城]", "Albany", ""],
                    "420320020": ["布法罗", "Buffalo", ""],
                    "420320030": ["长岛", "Long Island", "CDO"],
                    "420320040": ["纽约", "New York City", ""],
                    "420320050": ["罗彻斯特市", "Rochester", ""],
                    "420320060": ["绮色佳", "Ithaca", ""],
                    "420330": ["北卡罗莱纳州", "North Carolina", ""],
                    "420330010": ["洛利", "Raleigh", ""],
                    "420330020": ["夏洛特", "Charlotte", ""],
                    "420330030": ["格林斯堡", "Greensboro", ""],
                    "420330040": ["查伯山", "Chapel Hill", ""],
                    "420330050": ["阿什维尔", "Asheville", ""],
                    "420340": ["北达科他州", "North Dakota", ""],
                    "420340010": ["俾斯麦", "Bismark", ""],
                    "420340020": ["法戈", "Fargo", ""],
                    "420350": ["俄亥俄州", "Ohio", ""],
                    "420350010": ["哥伦布", "Columbus", ""],
                    "420350020": ["克利夫兰", "Cleveland", ""],
                    "420350030": ["辛辛那提", "Cincinnati", ""],
                    "420360": ["俄克拉何马州", "Oklahoma", ""],
                    "420360010": ["俄克拉何马城", "OklahomaCity", ""],
                    "420360020": ["塔尔萨", "Tulsa", ""],
                    "420360030": ["劳顿", "Lawton", ""],
                    "420360040": ["诺曼城", "Norman", ""],
                    "420370": ["俄勒冈州", "Oregon", ""],
                    "420370010": ["塞伦", "Salem", ""],
                    "420370020": ["波特兰", "Portland", ""],
                    "420370030": ["尤金", "Eugene", ""],
                    "420370040": ["科瓦利", "Corvallis", ""],
                    "420380": ["宾夕法尼亚州", "Pennsylvania", ""],
                    "420380010": ["哈里斯堡", "Harrisburg", ""],
                    "420390": ["南卡罗来纳州", "South Carolina", ""],
                    "420390010": ["哥伦比亚", "Columbia", ""],
                    "420390020": ["查理斯敦", "North Charleston", ""],
                    "420390030": ["格林威尔", "Greenville", ""],
                    "420390040": ["阿干", "Aiken", ""],
                    "420390050": ["美特尔沙滨", "Myrtle Beach", ""],
                    "420390060": ["克伦孙", "Clemson", ""],
                    "420400": ["南达科他州", "South Dakota", ""],
                    "420400010": ["苏瀑市", "Sioux Falls", ""],
                    "420400020": ["拉皮特城", "Rapid City", ""],
                    "420410": ["田纳西州", "Tennessee", ""],
                    "420410010": ["那什维尔", "Nemphis", ""],
                    "420410020": ["孟斐斯", "Memphis", ""],
                    "420410030": ["诺克斯维尔", "Knoxville", ""],
                    "420410040": ["橡树岭", "Oak Ridge", ""],
                    "420420": ["德克萨斯州", "Texas", ""],
                    "420420010": ["奧斯汀", "Austin", ""],
                    "420420020": ["休斯顿", "Houston", ""],
                    "420420030": ["达拉斯", "Dallas", ""],
                    "420430": ["犹他州", "Utah", ""],
                    "420430010": ["盐湖城", "Salt Lake City", ""],
                    "420430020": ["奥格登", "Ogden", ""],
                    "420430030": ["普罗沃", "Provo", ""],
                    "420440": ["佛蒙特州", "Vermont", ""],
                    "420440010": ["拉特兰", "Rutland", ""],
                    "420450": ["弗吉尼亚州", "Virginia", ""],
                    "420450010": ["里齐蒙得", "Richmond", ""],
                    "420450020": ["诺福克", "Norfolk", ""],
                    "420450030": ["弗吉尼亚滩", "Virginia Beach", ""],
                    "420460": ["华盛顿州", "Washington", ""],
                    "420460010": ["奥林匹亚", "Olympia", ""],
                    "420470": ["罗得岛州", "Rhode Island", ""],
                    "420470010": ["普洛威顿斯", "Providence", ""],
                    "420470020": ["纽波特", "Newport", ""],
                    "420480": ["西佛吉尼亚州", "West Virginia", ""],
                    "420480010": ["查理斯敦", "Charleston", ""],
                    "420480020": ["亨丁顿", "Huntington", ""],
                    "420480030": ["摩根敦", "Morgantown", ""],
                    "420490": ["威斯康星州", "Wisconsin", ""],
                    "420490010": ["麦迪逊", "Madison", ""],
                    "420490020": ["密尔沃基", "Milwaukee", ""],
                    "420490030": ["拉辛", "Racine", ""],
                    "420500": ["怀俄明州", "Wyoming", ""],
                    "420500010": ["夏延", "Cheyenne", ""],
                    "420500020": ["卡斯柏", "Casper", ""],
                    "420500030": ["拉阿密", "Laramie", ""],
                    "420510": ["华盛顿哥伦比亚特区", "Washington, DC", ""],
                    "360040": ["墨西哥", "Mexico", ""],
                    "360050": ["格陵兰", "Greenland", ""],
                    "360060": ["危地马拉", "Guatemala", ""],
                    "360070": ["伯利兹", "Belize", ""],
                    "360080": ["萨尔瓦多", "Salvador", ""],
                    "360090": ["洪都拉斯", "Honduras", ""],
                    "360100": ["尼加拉瓜", "Nicaragua", ""],
                    "360110": ["哥斯达黎加", "Costa Rica", ""],
                    "360120": ["巴拿马", "Panama", ""],
                    "360130": ["巴哈马", "Bahamas", ""],
                    "360140": ["古巴", "Cuba", ""],
                    "360150": ["牙买加", "Jamaica", ""],
                    "360160": ["海地", "Haiti", ""],
                    "360170": ["多米尼加", "Dominican Republic", ""],
                    "360180": ["安提瓜", "Antigua and Barbuda", ""],
                    "360190": ["圣基茨", "St. Kitts and Nevis", ""],
                    "360200": ["多米尼克", "Dominica", ""],
                    "360210": ["圣卢西亚", "Saint Lucia", ""],
                    "360220": ["圣文森特", "Saint Vincent and the Grenadines", ""],
                    "360230": ["格林纳达", "Grenada", ""],
                    "360240": ["巴巴多斯", "Barbados", ""],
                    "360250": ["特立尼达", "Trinidad and Tobago", ""],
                    "360260": ["波多黎各", "Puerto Rico", ""],
                    "360270": ["英属维尔京", "British Virgin Islands", ""],
                    "360280": ["美属维尔京", "Virgin Islands", ""],
                    "360290": ["安圭拉", "Anguilla", ""],
                    "360300": ["蒙特塞拉特", "Montserrat", ""],
                    "360310": ["瓜德罗普", "Guadeloupe", ""],
                    "360320": ["马提尼克", "martinique", ""],
                    "360330": ["安的列斯", "Nederlandse Antillen", ""],
                    "360340": ["阿鲁巴", "Aruba", ""],
                    "360350": ["特克斯", "The turks and caicos islands", "TEK"],
                    "360360": ["开曼群岛", "Cayman Islands", ""],
                    "360370": ["百慕大", "Bermuda", ""],
                    "370": ["南美洲", "South America", ""],
                    "370020": ["哥伦比亚", "Columbia", ""],
                    "370030": ["委内瑞拉", "Venezuela", ""],
                    "370040": ["圭亚那", "Guyana", ""],
                    "370050": ["法属圭亚那", "French Guiana", ""],
                    "370060": ["苏里南", "Surinam", ""],
                    "370070": ["厄瓜多尔", "Ecuador", ""],
                    "370080": ["秘鲁", "Peru", ""],
                    "370090": ["玻利维亚", "Bolivia", ""],
                    "370100": ["巴西", "Brazil", ""],
                    "370110": ["智利", "Chile", ""],
                    "370120": ["阿根廷", "Argentina", ""],
                    "370130": ["乌拉圭", "Uruguay", ""],
                    "370140": ["巴拉圭", "Paraguay", ""],
                    "380": ["大洋洲", "Oceania", ""],
                    "380020": ["澳大利亚", "Australia", ""],
                    "380030": ["新西兰", "New Zealand", ""],
                    "380040": ["巴布亚", "Papua New Guinea", ""],
                    "380050": ["所罗门群岛", "Solomon Islands", ""],
                    "380060": ["瓦努阿图", "Vanuatu", ""],
                    "380080": ["马绍尔群岛", "Marshall Islands", ""],
                    "380090": ["帕劳群岛", "Palau", ""],
                    "380100": ["瑙鲁", "Nauru", ""],
                    "380110": ["基里巴斯", "Kiribati", ""],
                    "380120": ["图瓦卢", "Tuvalu", ""],
                    "380130": ["萨摩亚", "Samoa", ""],
                    "380140": ["斐济群岛", "Fiji Islands", ""],
                    "380150": ["汤加", "Tonga", ""],
                    "380160": ["库克群岛", "Cook Islands", ""],
                    "380170": ["关岛", "Guam", ""],
                    "380190": ["波利尼西亚", "Polynesia", ""],
                    "380200": ["皮特凯恩岛", "Pitcairn Island", ""],
                    "380210": ["瓦利斯", "Wallis and Futuna", ""],
                    "380220": ["纽埃", "Niue", ""],
                    "380230": ["托克劳", "Tokelau", ""],
                    "380240": ["美属萨摩亚", "American Samoa", ""],
                    "380250": ["北马里亚纳", "Northern Marianas", ""],
                    "380070": ["密克罗尼西亚", "Micronesia", ""],
                    "380180": ["新喀里多尼亚", "New Caledonia", ""],
                    "390": ["欧洲", "Europe", ""],
                    "390020": ["芬兰", "Finland", ""],
                    "390030": ["瑞典", "Sweden", ""],
                    "390040": ["挪威", "Norway", ""],
                    "390050": ["冰岛", "Iceland", ""],
                    "390060": ["丹麦", "Denmark", ""],
                    "390070": ["法罗群岛", "Faroe islands", ""],
                    "390080": ["爱沙尼亚", "Estonia", ""],
                    "390090": ["拉脱维亚", "Latvia", ""],
                    "390100": ["立陶宛", "Lithuania", ""],
                    "390110": ["白俄罗斯", "The Republic of Belarus", ""],
                    "390120": ["俄罗斯", "Russia", ""],
                    "390130": ["乌克兰", "Ukraine", ""],
                    "390140": ["摩尔多瓦", "Moldova", ""],
                    "390150": ["波兰", "Poland", ""],
                    "390160": ["捷克", "Czechoslovakia", ""],
                    "390450": ["斯洛伐克", "The Slovak Republic", ""],
                    "390170": ["匈牙利", "Hungary", ""],
                    "390180": ["德国", "Germany", ""],
                    "390190": ["奥地利", "Austria", ""],
                    "390200": ["瑞士", "Switzerland", ""],
                    "390210": ["列支敦士登", "Liechtenstein", ""],
                    "390220": ["英国", "United Kingdom", ""],
                    "390230": ["爱尔兰", "Ireland", ""],
                    "390240": ["荷兰", "Netherlands", ""],
                    "390250": ["比利时", "Belgium", ""],
                    "390260": ["卢森堡", "Luxembourg", ""],
                    "390270": ["法国", "France", ""],
                    "390280": ["摩纳哥", "Monaco", ""],
                    "390290": ["罗马尼亚", "Roumania", ""],
                    "390300": ["保加利亚", "Bulgaria", ""],
                    "390310": ["塞尔维亚", "Serbia", ""],
                    "390320": ["马其顿", "Macedonia", ""],
                    "390330": ["阿尔巴尼亚", "Albania", ""],
                    "390340": ["希腊", "Greece", ""],
                    "390350": ["斯洛文尼亚", "Slovenia", ""],
                    "390360": ["克罗地亚", "Croatia", ""],
                    "390370": ["波墨", "Bosnia and ink plug elder brother d that", ""],
                    "390380": ["意大利", "Italy", ""],
                    "390390": ["梵蒂冈", "Vatican", ""],
                    "390400": ["圣马力诺", "San Marino", ""],
                    "390410": ["马耳他", "Malta", ""],
                    "390420": ["西班牙", "Spain", ""],
                    "390430": ["葡萄牙", "Portugal", ""],
                    "390440": ["安道尔", "Andorra", ""],
                    "400": ["非洲", "Africa", ""],
                    "400020": ["埃及", "Egypt", ""],
                    "400030": ["利比亚", "Libya", ""],
                    "400040": ["苏丹", "Sultan", ""],
                    "400050": ["突尼斯", "Tunisia", ""],
                    "400060": ["阿尔及利亚", "Algeria", ""],
                    "400070": ["摩洛哥", "Morocco", ""],
                    "400080": ["亚速尔群岛", "Azores", ""],
                    "400090": ["马德拉群岛", "Madeira", ""],
                    "400100": ["埃塞俄比亚", "Ethiopia", ""],
                    "400110": ["厄立特里亚", "Eritrea", ""],
                    "400120": ["索马里", "Somalia", ""],
                    "400130": ["吉布提", "Djibouti", ""],
                    "400140": ["肯尼亚", "Kenya", ""],
                    "400150": ["坦桑尼亚", "Tanzania", ""],
                    "400160": ["乌干达", "Uganda", ""],
                    "400170": ["卢旺达", "Rwanda", ""],
                    "400180": ["布隆迪", "Burundi", ""],
                    "400190": ["塞舌尔", "Seychelles", ""],
                    "400200": ["乍得", "Chad", ""],
                    "400210": ["中非", "Central Africa", ""],
                    "400220": ["喀麦隆", "Cameroon", ""],
                    "400230": ["赤道几内亚", "Equatorial Guinea", ""],
                    "400240": ["加蓬", "Gabon", ""],
                    "400250": ["刚果", "Congo", ""],
                    "400260": ["圣普", "Sao Tome and Principe", ""],
                    "400270": ["毛里塔尼亚", "Mauritania", ""],
                    "400280": ["西撒哈拉", "EH West Sahara", ""],
                    "400290": ["塞内加尔", "Senegal", ""],
                    "400300": ["冈比亚", "Gambia", ""],
                    "400310": ["马里", "Mali", ""],
                    "400320": ["布基纳法索", "Burkina faso", ""],
                    "400330": ["几内亚", "Guinea", ""],
                    "400340": ["几内亚比绍", "Guinea-Bissau", ""],
                    "400350": ["佛得角", "Cape Verde", ""],
                    "400360": ["塞拉利昂", "Sierra leone", ""],
                    "400370": ["利比里亚", "Liberia", ""],
                    "400380": ["科特迪瓦", "Cote d'ivoire", ""],
                    "400390": ["加纳", "Ghana", ""],
                    "400400": ["多哥", "Togo", ""],
                    "400410": ["贝宁", "Benin", ""],
                    "400420": ["尼日尔", "The Niger", ""],
                    "400430": ["加那利群岛", "Canary Islands", ""],
                    "400440": ["赞比亚", "Zambia", ""],
                    "400450": ["安哥拉", "Angola", ""],
                    "400460": ["津巴布韦", "Zimbabwe", ""],
                    "400470": ["马拉维", "Malawi", ""],
                    "400480": ["莫桑比克", "Mozambique", ""],
                    "400490": ["博茨瓦纳", "Botswana", ""],
                    "400500": ["纳米比亚", "Namibia", ""],
                    "400510": ["南非", "South Africa", ""],
                    "400520": ["斯威士兰", "Swaziland", ""],
                    "400530": ["莱索托", "Lesotho", ""],
                    "400540": ["马达加斯加", "Madagascar", ""],
                    "400550": ["科摩罗", "Comorin", ""],
                    "400560": ["毛里求斯", "Mauritius", ""],
                    "400570": ["留尼旺", "Reunion", ""],
                    "400580": ["圣赫勒拿", "Saint Helena", ""],
                    "400590": ["尼日利亚", "Federal Republic of Nigeria", ""],
                    "000": ["全部", "All", ""],
                    "hwgat": ["海外及港澳台", "海外及港澳台", ""]
                },
                "relations": {
                    "350": ["350020", "350030", "350040", "350050", "350060", "350070", "350080", "350090", "350100", "350110", "350120", "350130", "350140", "350150", "350160", "350170", "350180", "350190", "350200", "350210", "350220", "350230", "350240", "350250", "350260", "350270", "350280", "350290", "350300", "350310", "350320", "350330", "350340", "350350", "350360", "350370", "350380", "350390", "350400", "350410", "350420", "350430", "350440", "350450", "350460", "350470", "350480"],
                    "360": ["360020", "360030", "360040", "360050", "360060", "360070", "360080", "360090", "360100", "360110", "360120", "360130", "360140", "360150", "360160", "360170", "360180", "360190", "360200", "360210", "360220", "360230", "360240", "360250", "360260", "360270", "360280", "360290", "360300", "360310", "360320", "360330", "360340", "360350", "360360", "360370"],
                    "370": ["370020", "370030", "370040", "370050", "370060", "370070", "370080", "370090", "370100", "370110", "370120", "370130", "370140"],
                    "380": ["380020", "380030", "380040", "380050", "380060", "380080", "380090", "380100", "380110", "380120", "380130", "380140", "380150", "380160", "380170", "380190", "380200", "380210", "380220", "380230", "380240", "380250", "380070", "380180"],
                    "390": ["390020", "390030", "390040", "390050", "390060", "390070", "390080", "390090", "390100", "390110", "390120", "390130", "390140", "390150", "390160", "390450", "390170", "390180", "390190", "390200", "390210", "390220", "390230", "390240", "390250", "390260", "390270", "390280", "390290", "390300", "390310", "390320", "390330", "390340", "390350", "390360", "390370", "390380", "390390", "390400", "390410", "390420", "390430", "390440"],
                    "400": ["400020", "400030", "400040", "400050", "400060", "400070", "400080", "400090", "400100", "400110", "400120", "400130", "400140", "400150", "400160", "400170", "400180", "400190", "400200", "400210", "400220", "400230", "400240", "400250", "400260", "400270", "400280", "400290", "400300", "400310", "400320", "400330", "400340", "400350", "400360", "400370", "400380", "400390", "400400", "400410", "400420", "400430", "400440", "400450", "400460", "400470", "400480", "400490", "400500", "400510", "400520", "400530", "400540", "400550", "400560", "400570", "400580", "400590"],
                    "360020": ["430010", "430020", "430030", "430040", "430050", "430060", "430070", "430080", "430090", "430100", "430110", "430120", "430130"],
                    "430010": ["430010010", "430010020"],
                    "430020": ["430020010", "430020020", "430020030", "430020040"],
                    "430030": ["430030010"],
                    "430060": ["430060030"],
                    "430070": ["430070010", "430070020", "430070030", "430070040", "430070050", "430070060", "430070070", "430070080", "430070090", "430070100", "430070110", "430070120", "430070130", "430070140"],
                    "430090": ["430090010", "430090020", "430090030", "430090040", "430090050", "430090060"],
                    "430100": ["430100010", "430100020"],
                    "360030": ["420010", "420020", "420030", "420040", "420050", "420060", "420070", "420080", "420090", "420100", "420110", "420120", "420130", "420140", "420150", "420160", "420170", "420180", "420190", "420200", "420210", "420220", "420230", "420240", "420250", "420260", "420270", "420280", "420290", "420300", "420310", "420320", "420330", "420340", "420350", "420360", "420370", "420380", "420390", "420400", "420410", "420420", "420430", "420440", "420450", "420460", "420470", "420480", "420490", "420500", "420510"],
                    "420010": ["420010010", "420010020", "420010030", "420010040", "420010050"],
                    "420020": ["420020010", "420020020"],
                    "420030": ["420030010", "420030020"],
                    "420040": ["420040010"],
                    "420050": ["420050010", "420050020", "420050030", "420050040", "420050050"],
                    "420060": ["420060010", "420060020"],
                    "420080": ["420080010", "420080020", "420080030"],
                    "420090": ["420090010", "420090020", "420090030", "420090040"],
                    "420100": ["420100010", "420100020"],
                    "420120": ["420120010", "420120020"],
                    "420130": ["420130010", "420130020", "420130030"],
                    "420140": ["420140010", "420140020", "420140030"],
                    "420150": ["420150010", "420150020", "420150030"],
                    "420160": ["420160010", "420160020", "420160030"],
                    "420170": ["420170010", "420170020"],
                    "420180": ["420180010"],
                    "420190": ["420190010"],
                    "420200": ["420200010", "420200020"],
                    "420210": ["420210010"],
                    "420220": ["420220010", "420220020", "420220030"],
                    "420230": ["420230010", "420230020"],
                    "420240": ["420240010"],
                    "420250": ["420250010", "420250020", "420250030", "420250040"],
                    "420260": ["420260010", "420260020", "420260030"],
                    "420270": ["420270010"],
                    "420280": ["420280010", "420280020", "420280030"],
                    "420290": ["420290010", "420290020", "420290030"],
                    "420300": ["420300010", "420300020", "420300030", "420300040"],
                    "420310": ["420310010", "420310020"],
                    "420320": ["420320010", "420320020", "420320030", "420320040", "420320050", "420320060"],
                    "420330": ["420330010", "420330020", "420330030", "420330040", "420330050"],
                    "420340": ["420340010", "420340020"],
                    "420350": ["420350010", "420350020", "420350030"],
                    "420360": ["420360010", "420360020", "420360030", "420360040"],
                    "420370": ["420370010", "420370020", "420370030", "420370040"],
                    "420380": ["420380010"],
                    "420390": ["420390010", "420390020", "420390030", "420390040", "420390050", "420390060"],
                    "420400": ["420400010", "420400020"],
                    "420410": ["420410010", "420410020", "420410030", "420410040"],
                    "420420": ["420420010", "420420020", "420420030"],
                    "420430": ["420430010", "420430020", "420430030"],
                    "420440": ["420440010"],
                    "420450": ["420450010", "420450020", "420450030"],
                    "420460": ["420460010"],
                    "420470": ["420470010", "420470020"],
                    "420480": ["420480010", "420480020", "420480030"],
                    "420490": ["420490010", "420490020", "420490030"],
                    "420500": ["420500010", "420500020", "420500030"],
                    "010": ["010010010", "010010020", "010010030", "010010050", "010010070", "010010080", "010010090", "010010100", "010010110", "010010120", "010010130", "010010140", "010010150", "010010160", "010010170", "010010180"],
                    "020": ["020010010", "020010020", "020010030", "020010040", "020010050", "020010060", "020010070", "020010080", "020010100", "020010110", "020010120", "020010130", "020010140", "020010150", "020010160", "020010180", "020010190"],
                    "030": ["030010010", "030010020", "030010030", "030010040", "030010050", "030010060", "030010070", "030010080", "030010090", "030010100", "030010110", "030010120", "030010130", "030010140", "030010150", "030010160", "030010170", "030010180", "030010200", "030010210"],
                    "040": ["040010010", "040010020", "040010030", "040010040", "040010050", "040010060", "040010070", "040010080", "040010090", "040010100", "040010110", "040010120", "040010130", "040010140", "040010170", "040010180", "040010190", "040010200", "040010210", "040010220", "040010230", "040010240", "040010250", "040010260", "040010270", "040010280", "040010290", "040010300", "040010310", "040010320", "040010330", "040010340", "040010350", "040010360", "040010370", "040010380", "040010390", "040010410", "040010420"],
                    "050020": ["050020010", "050020020", "050020030", "050020040", "050020050", "050020060", "050020070", "050020080", "050020090", "050020100", "050020110", "050020120"],
                    "050040": ["050040010", "050040020", "050040030", "050040040", "050040050", "050040060", "050040070", "050040080", "050040090", "050040100", "050040110", "050040120", "050040130", "050040140", "050040150", "050040160", "050040170", "050040180", "050040190", "050040200", "050040210", "050040220", "050040230", "050040240", "050040250", "050040260", "050040270", "050040280", "050040290", "050040300", "050040310", "050040320", "050040330"],
                    "050050": ["050050010", "050050020", "050050030", "050050040", "050050050", "050050060", "050050070", "050050080", "050050090", "050050100"],
                    "050090": ["050090010", "050090020", "050090030", "050090040", "050090050", "050090060", "050090070", "050090080", "050090090", "050090100"],
                    "050140": ["050140010", "050140020", "050140030", "050140040"],
                    "060020": ["060020010", "060020020", "060020030", "060020040", "060020050", "060020060", "060020070", "060020080", "060020090", "060020100", "060020110", "060020120", "060020130", "060020140"],
                    "060040": ["060040010", "060040020", "060040030", "060040040", "060040050", "060040060", "060040070", "060040080"],
                    "060080": ["060080010", "060080020", "060080030", "060080040", "060080050", "060080060", "060080070", "060080080", "060080090", "060080100", "060080110", "060080120", "060080130", "060080140", "060080150", "060080160", "060080170", "060080180", "060080190", "060080200", "060080210", "060080220", "060080230", "060080240"],
                    "060100": ["060100010", "060100020", "060100030", "060100040", "060100050", "060100060", "060100070", "060100080", "060100090"],
                    "070020": ["070020010", "070020020", "070020030", "070020040", "070020050", "070020060", "070020070", "070020080", "070020090", "070020100", "070020110", "070020120", "070020130", "070020140"],
                    "070030": ["070030010", "070030020", "070030030", "070030040", "070030050", "070030060", "070030070", "070030080", "070030090", "070030100", "070030110"],
                    "070040": ["070040010", "070040020", "070040030", "070040040", "070040050", "070040060", "070040070", "070040080", "070040090", "070040100", "070040110"],
                    "080020": ["080020010", "080020020", "080020030", "080020040", "080020050", "080020060", "080020070", "080020080", "080020090", "080020100", "080020110", "080020120", "080020130"],
                    "090020": ["090020010", "090020020", "090020030", "090020040", "090020050", "090020060", "090020070", "090020080", "090020090", "090020100", "090020110", "090020120", "090020130"],
                    "090040": ["090040010", "090040020", "090040030", "090040040", "090040050", "090040060"],
                    "100020": ["100020010", "100020020", "100020030", "100020040", "100020050", "100020060", "100020070", "100020080"],
                    "110020": ["110020010", "110020020", "110020030", "110020040", "110020050", "110020060", "110020070", "110020080", "110020090", "110020100", "110020110", "110020120"],
                    "120020": ["120020010", "120020020", "120020030", "120020040", "120020050", "120020060", "120020070", "120020080", "120020090", "120020100", "120020110", "120020120"],
                    "130020": ["130020010", "130020020", "130020030", "130020040", "130020050", "130020060", "130020070", "130020080", "130020090", "130020100", "130020110", "130020120", "130020130", "130020140", "130020150"],
                    "140020": ["140020010", "140020020", "140020030", "140020040", "140020050", "140020060", "140020070", "140020080", "140020090", "140020100", "140020110", "140020120", "140020130", "140020140", "140020150", "140020160", "140020170", "140020180", "140020190", "140020200", "140020210", "140020220", "140020230", "140020240"],
                    "150020": ["150020010", "150020020", "150020030", "150020040", "150020050", "150020060", "150020070", "150020080", "150020090", "150020100", "150020110", "150020120", "150020130", "150020140", "150020150", "150020160", "150020170"],
                    "160020": ["160020010", "160020020", "160020030", "160020040", "160020050", "160020060", "160020070", "160020080", "160020090", "160020100", "160020110", "160020120", "160020130", "160020140", "160020150", "160020160", "160020170", "160020180", "160020190", "160020200"],
                    "170020": ["170020010", "170020020", "170020030", "170020040", "170020050", "170020060", "170020070", "170020080", "170020090", "170020100", "170020110", "170020120", "170020130", "170020140"],
                    "180020": ["180020010", "180020020", "180020030", "180020040", "180020050", "180020060", "180020070", "180020080", "180020090", "180020100"],
                    "190020": ["190020010", "190020020", "190020030", "190020040", "190020050", "190020060", "190020070", "190020080", "190020090", "190020100", "190020110", "190020120", "190020130", "190020140", "190020160"],
                    "200020": ["200020010", "200020020", "200020030", "200020040", "200020050", "200020060", "200020070", "200020080", "200020090", "200020100", "200020110", "200020120", "200020130"],
                    "210020": ["210020010", "210020020", "210020030", "210020040", "210020050", "210020060", "210020070", "210020080", "210020090", "210020100", "210020110", "210020120", "210020130", "210020140"],
                    "210040": ["210040010", "210040020", "210040030", "210040040", "210040050", "210040060", "210040070", "210040080", "210040090", "210040100", "210040120", "210040130", "210040140"],
                    "220020": ["220020010", "220020020", "220020030", "220020040", "220020050", "220020060", "220020070", "220020080", "220020090"],
                    "230020": ["230020010", "230020020", "230020030", "230020040", "230020050", "230020060", "230020100"],
                    "240020": ["240020010", "240020020", "240020030", "240020040", "240020050", "240020060", "240020070", "240020080", "240020090"],
                    "250020": ["250020010", "250020020", "250020030", "250020040", "250020050", "250020060", "250020070", "250020080", "250020090", "250020100", "250020110", "250020120"],
                    "250070": ["250070010", "250070020", "250070030", "250070040", "250070050", "250070060", "250070070", "250070080", "250070090", "250070100", "250070110", "250070120"],
                    "260020": ["260020010", "260020020", "260020030", "260020040", "260020050", "260020060", "260020070", "260020080", "260020090", "260020100", "260020110", "260020120", "260020130"],
                    "270020": ["270020010", "270020020", "270020030", "270020040", "270020050", "270020060", "270020070", "270020080", "270020090", "270020100", "270020110", "270020120", "270020130", "270020140", "270020150"],
                    "280020": ["280020010", "280020020", "280020030", "280020040", "280020050", "280020060", "280020070", "280020080", "280020090", "280020100", "280020110", "280020120", "280020130", "280020140", "280020150", "280020170", "280020180", "280020190", "280020200", "280020210", "280020220"],
                    "290020": ["290020010", "290020020", "290020030", "290020040", "290020050", "290020060", "290020070", "290020080"],
                    "300020": ["300020010", "300020020", "300020030", "300020040", "300020050", "300020060", "300020070", "300020080", "300020090", "300020110"],
                    "310020": ["310020010", "310020020", "310020030", "310020040", "310020050", "310020060", "310020070", "310020080", "310020090", "310020100", "310020110", "310020120", "310020130", "310020140"],
                    "320": ["320010010", "320010020", "320010030", "320010040", "320010050", "320010060", "320010070", "320010080", "320010090", "320010100", "320010110", "320010120", "320010130", "320010140", "320010150", "320010160", "320010170", "320010180"],
                    "340": ["340010010", "340010020", "340010030", "340010040", "340010050", "340010060", "340010070", "340010080", "340010090", "340010100", "340010110", "340010120", "340010130", "340010140", "340010150", "340010160", "340010170"],
                    "050": ["050020", "050030", "050040", "050050", "050060", "050070", "050080", "050090", "050100", "050110", "050120", "050130", "050140", "050150", "050160", "050170", "050180", "050190", "050200", "050210", "050220", "050230", "050240", "050250", "050260", "050270", "050280", "050290"],
                    "060": ["060020", "060030", "060040", "060050", "060060", "060070", "060080", "060090", "060100", "060110", "060120", "060130", "060140", "060150", "060160", "060170", "060190", "060200", "060210", "060220", "060230", "060240", "060250", "060260", "060270", "060280", "060290", "060300", "060310", "060320"],
                    "070": ["070020", "070030", "070040", "070050", "070060", "070070", "070080", "070090", "070100", "070110", "070120", "070130", "070140", "070150", "070160", "070170", "070180", "070190", "070200", "070210", "070220", "070230", "070240", "070250", "070260", "070270", "070280", "070290", "070300", "070310", "070320", "070330", "070340"],
                    "080": ["080020", "080030", "080040", "080050", "080060", "080070", "080080", "080090", "080100", "080110", "080120", "080130", "080140", "080150", "080160", "080170", "080180", "080190", "080200", "080210"],
                    "090": ["090020", "090030", "090040", "090050", "090060", "090070", "090080", "090090", "090100", "090110", "090120", "090130"],
                    "100": ["100020", "100030", "100040", "100050", "100060", "100070", "100080", "100090", "100100", "100110", "100120", "100130", "100140", "100150"],
                    "110": ["110020", "110030", "110040", "110050", "110060", "110070", "110080", "110090", "110100", "110110", "110120", "110130", "110140", "110150"],
                    "120": ["120020", "120030", "120040", "120050", "120060", "120070", "120080", "120090", "120100"],
                    "130": ["130020", "130030", "130040", "130060", "130070", "130080", "130090", "130100", "130110", "130120", "130130", "130140", "130150", "130160", "130170", "130180", "130190", "130200", "130210"],
                    "140": ["140020", "140030", "140040", "140050", "140060", "140070", "140080", "140090", "140100", "140110", "140120", "140130", "140140", "140150", "140160", "140170"],
                    "150": ["150020", "150030", "150040", "150050", "150060", "150070", "150080", "150090", "150100", "150110", "150120", "150130", "150140", "150150", "150160", "150170", "150180", "150190", "150200", "150210"],
                    "160": ["160020", "160030", "160040", "160050", "160060", "160070", "160080", "160090", "160100", "160110", "160120", "160130", "160140", "160150", "160160", "160170", "160180", "160190"],
                    "170": ["170020", "170030", "170040", "170050", "170060", "170070", "170080", "170090", "170100", "170110", "170120", "170130", "170140", "170150", "170160", "170170", "170180", "170190", "170200", "170210"],
                    "180": ["180020", "180030", "180040", "180050", "180060", "180070", "180080", "180090", "180100", "180110", "180120", "180130", "180140", "180150"],
                    "190": ["190020", "190030", "190040", "190050", "190060", "190070", "190080", "190090", "190100", "190110", "190120"],
                    "200": ["200020", "200030", "200040", "200050", "200060", "200070", "200080", "200090", "200100", "200110", "200120"],
                    "210": ["210020", "210030", "210040", "210050", "210060", "210070", "210080", "210090", "210100", "210110", "210120", "210130", "210140", "210150", "210160", "210170", "210180", "210190"],
                    "220": ["220020", "220030", "220040", "220050", "220060", "220070", "220080", "220090", "220100", "220110", "220120", "220130", "220140", "220150"],
                    "230": ["230020", "230030", "230040", "230050", "230060"],
                    "240": ["240020", "240030", "240040", "240050", "240060", "240070", "240080", "240090"],
                    "250": ["250020", "250030", "250040", "250050", "250060", "250070", "250080", "250090", "250100", "250110", "250120", "250130", "250140", "250150", "250160", "250170", "250180", "250190", "250200", "250210", "250220", "250230", "250240", "250250", "250260", "250270", "250280", "250290", "250300"],
                    "260": ["260020", "260030", "260040", "260050", "260060", "260070", "260080", "260090", "260100", "260110", "260120", "260130", "260140"],
                    "270": ["270020", "270030", "270040", "270050", "270060", "270070", "270080", "270090", "270100", "270110", "270120", "270130"],
                    "280": ["280020", "280030", "280040", "280050", "280060", "280070", "280080", "280090", "280100", "280110", "280120", "280130", "280140", "280150", "280160", "280170", "280180", "280190", "280200", "280210", "280220", "280230", "280240", "280250"],
                    "290": ["290020", "290030", "290040", "290050", "290060", "290070", "290080"],
                    "300": ["300020", "300030", "300040", "300050", "300060", "300070", "300080", "300090", "300100", "300110", "300120", "300130", "300140", "300150", "300160", "300180", "300190", "300200", "300210", "300170"],
                    "310": ["310020", "310030", "310040", "310050", "310060", "310070", "310080", "310090", "310100", "310110", "310120", "310130", "310140", "310150", "310160", "310170", "310180"]
                },
                "category": {
                    "district": ["010", "020", "030", "040", "050020", "050040", "050050", "050090", "050140", "060020", "060040", "060080", "060100", "070020", "070030", "070040", "080020", "090020", "090040", "100020", "110020", "120020", "130020", "140020", "150020", "160020", "170020", "180020", "190020", "200020", "210020", "210040", "220020", "230020", "240020", "250020", "250070", "260020", "270020", "280020", "290020", "300020", "310020", "320", "340"],
                    "provinces": ["050", "060", "070", "080", "090", "100", "110", "120", "130", "140", "150", "160", "170", "180", "190", "200", "210", "220", "230", "240", "250", "260", "270", "280", "290", "300", "310"],
                    "gangaotai": ["320", "330", "340"],
                    "continents": ["350", "360", "370", "380", "390", "400"],
                    "hotcities": ["010", "020", "050020", "050090", "030", "060080", "040", "060020", "070020", "210040", "280020", "170020"],
                    "hotcountries": ["360030", "390220", "380020", "360020", "380030", "390120", "390130", "390110", "390180", "390270", "350050", "350040", "350140", "350120", "390040", "390030", "390020", "390230", "390240", "390060", "390380", "390420", "390200"]
                }
            }
        },
        "ZBKY": function(module, exports, __webpack_require__) {
            "use strict";
            __webpack_require__("fXid"),
                function($, window, undefined) {
                    function Plugin(element, options) {
                        this.element = element, this.options = $.extend({}, defaults, options), this.ui = {}, this._name = pluginName, this.init()
                    }
                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataUIB",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "width": 0,
                            "maxwidth": 0,
                            "maxLength": 0,
                            "height": "auto",
                            "filter": function(arr) {
                                var _arr = [];
                                arr = arr || [];
                                for(var i = 0; i < arr.length; i++) _arr.push([arr[i], arr[i]]);
                                return _arr
                            },
                            "drop": $.noop,
                            "disabled": !1,
                            "callback": !1
                        };
                    Plugin.prototype._margin = function(element, dir) {
                        return parseInt(element.css("margin-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._border = function(element, dir) {
                        return parseInt(element.css("border-" + dir + "-width").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._padding = function(element, dir) {
                        return parseInt(element.css("padding-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._lineHeight = function(element) {
                        return parseInt(element.css("line-height").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype.init = function() {
                        var that = this,
                            ui = {},
                            $element = $(that.element);
                        return $element.attr("data-ui", that._name), ui.helper = $("<span />").attr("data-name", $element.attr("name") || "").addClass($element.attr("class") + " " + that._name).bind("click." + that._name, function() {
                            if(that.disabled()) return event.stopPropagation(), !1;
                            that.options.drop && that.options.drop.apply(window)
                        }).insertAfter($element.hide()), ui.helper.hasClass("text") && ui.helper.removeClass("text").addClass("simulation-text"), that.disabled() && ui.helper.addClass(pluginName + "-disabled"), $("<span />").addClass("items").css({
                            "left": that._padding($element, "left")
                        }).appendTo(ui.helper), ui.element = $('<input type="text" readonly="readonly" unselectable="on" />').addClass(that._name + "-input").css({

                        }).appendTo(ui.helper).bind("blur." + this._name, function() {
                            $element.trigger("blur")
                        }), ui.drop = $("<em />").addClass("drop").attr("data-nick", that.options.dataNick || "").appendTo(ui.helper).height($element.innerHeight() + that._border($element, "top") + that._border($element, "bottom")).css({
                            "margin-top": -that._border($element, "top")
                        }), that.options.width ? ui.helper.width(that.options.width + ui.helper.find("em.drop").width() - that._padding(ui.helper, "right")) : ui.helper.width($element.innerWidth() - that._padding($element, "left") - that._padding($element, "right")), ui.placeholder = $("<i />").addClass("placeholder").css({
                            // "line-height": ui.element.outerHeight() + "px",
                            "padding-left": that._padding(ui.element, "left") + that._border(ui.helper, "left"),
                            "text-indent": ui.element.css("text-indent"),
                            "font-size": ui.element.css("font-size"),
                            "font-family": ui.element.css("font-family"),
                            "margin-top": -that._padding(ui.element, "top") + that._border(ui.helper, "top")
                        }).prependTo(ui.helper).text($element.attr("placeholder") || "").bind("click." + this._name, function(event) {
                            ui.helper.trigger("click"), event.stopPropagation()
                        }), ui.focus = function(handler) {
                            return handler ? ui.element.triggerHandler("focus") : ui.element.trigger("focus"), ui
                        }, that.ui = ui, that.options && that.options.init && that.options.init.call(that), that
                    }, Plugin.prototype.fetch = function() {
                        return this
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? !!("boolean" == typeof that.options.disabled && !0 === that.options.disabled || "function" == typeof that.options.disabled && !0 === that.options.disabled()) : (that.options.disabled = disabled, that)
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            $element = $(that.element),
                            val = $element.val(),
                            uiUpdater = function() {
                                var list = that.ui.helper.find("span.items"),
                                    fixSize = that.ui.helper.find("em.drop").width() - that._padding(that.ui.helper, "right");
                                if($element.val() ? that.ui.placeholder && that.ui.placeholder.hide() : that.ui.placeholder && that.ui.placeholder.show(), that.options.width) {
                                    var width = 0;
                                    "number" == typeof that.options.width ? width = that.options.width : (list.children("span").each(function() {
                                        width += $(this).outerWidth(!0)
                                    }), that.options.maxwidth && width > that.options.maxwidth && (width = that.options.maxwidth), width = Math.max(width, $element.width() - fixSize)), list.width(width), that.ui.helper.width(width + fixSize)
                                }
                                if(that.options.height) {
                                    list.css({
                                        "height": "auto"
                                    });
                                    var height = list.height();
                                    height = "number" == typeof that.options.height ? that.options.height : list.height(), that.options.maxheight && height > that.options.maxheight && (height = that.options.maxheight), height = Math.max(height, $element.height()), list.height(height), that.ui.helper.height(height)
                                }
                            },
                            itemLongString = "",
                            itemLength = 0,
                            items = that.options.filter.call(that, val.split(",")),
                            itemcode = [],
                            list = that.ui.helper.find("span.items").empty();
                        if(that.options.maxLength > 0) {
                            for(var i = 0; i < items.length; i++) itemLongString += items[i][1];
                            LT.String.realLength(itemLongString) > that.options.maxLength && (itemLength = Math.floor(that.options.maxLength / items.length))
                        }
                        for(var _i = 0; _i < items.length; _i++) {
                            itemcode.push(items[_i][0]);
                            var _item = $("<span />").attr("data-id", items[_i][0]).text(0 === itemLength ? items[_i][1] : LT.String.substr(items[_i][1], 0, itemLength, "...")).append('<a class="close" />').appendTo(list).bind("click." + pluginName, function(event) {
                                    event.stopPropagation()
                                }),
                                _height = that._lineHeight(_item) + that._padding(_item, "top") + that._padding(_item, "bottom"),
                                _closeHeight = _item.find("a.close").outerHeight();
                            _item.find("a.close").css({
                                "top": (_height - _closeHeight) / 2 + "px"
                            }).bind("click." + pluginName, function(event) {
                                if(that.disabled()) return event.stopPropagation(), !1;
                                var code = $(this).closest("span").attr("data-id");
                                items = items.filter(function(item) {
                                    return item[0] !== code
                                }), $element.val(items.map(function(item) {
                                    return item[0]
                                }).join(",")).triggerHandler("change"), $(this).closest("span").remove(), uiUpdater(), event.stopPropagation(), !!that.options.callback && that.options.callback.call(that, items)
                            })
                        }
                        $element.val(itemcode.join(",")), !init && $element.trigger("change"), uiUpdater(), that.ui.focus(init)
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },
        "ar5U": function(module, exports, __webpack_require__) {
            "use strict";
            var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
                return typeof obj
            } : function(obj) {
                return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj
            };
            __webpack_require__("/7sM"),
                function($, window, undefined) {

                    function Plugin(element, options) {
                        this.element = element, this.options = $.extend({}, defaults, options), this.ui = {}, this._name = pluginName, this.init()
                    }
                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataUID",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "width": 0,
                            "maxwidth": 0,
                            "maxLength": 0,
                            "height": "auto",
                            "filter": function(arr) {
                                var _arr = [];
                                arr = arr || [];
                                for(var i = 0; i < arr.length; i++) _arr.push([arr[i], arr[i]]);
                                return _arr
                            },
                            "drop": $.noop,
                            "suggest": $.noop,
                            "disabled": !1,
                            "callback": !1
                        };
                    Plugin.prototype._margin = function(element, dir) {
                        return parseInt(element.css("margin-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._border = function(element, dir) {
                        return parseInt(element.css("border-" + dir + "-width").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._padding = function(element, dir) {
                        return parseInt(element.css("padding-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._lineHeight = function(element) {
                        return parseInt(element.css("line-height").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype.init = function() {
                        var that = this,
                            ui = {},
                            $element = $(that.element);
                        return $element.attr("data-ui", that._name), ui.helper = $("<span />").attr("data-name", $element.attr("name") || "").addClass($element.attr("class") + " " + that._name).bind("click." + that._name, function(event) {
                            event.stopPropagation()
                        }).insertAfter($element.hide()), ui.helper.hasClass("text") && ui.helper.removeClass("text").addClass("simulation-text " + pluginName + "-simulation-text").css({
                            "font-size": $element.css("font-size")
                        }), that.disabled() && ui.helper.addClass(pluginName + "-disabled"), ui.list = $("<span />").addClass("items").css({
                            "left": that._padding($element, "left")
                        }).appendTo(ui.helper), ui.element = $('<input type="text" />').addClass(that._name + "-input").css({

                        }).appendTo(ui.helper).bind("blur." + this._name, function() {
                            $element.trigger("blur")
                        }).bind("keyup." + this._name + " focus." + this._name, function(event) {
                            var keys = [9, 13, 27, 38, 40],
                                keyword = $(this).val();
                            if(-1 === keys.indexOf(event.keyCode) && that.options.suggest) {
                                var result, parentCodes, getData = that.options.suggest.call(window, keyword);
                                Array.isArray(getData) ? (result = getData[1], parentCodes = getData[0].split(",")) : (result = getData, parentCodes = Object.keys(result));
                                var val = $element.val(),
                                    vals = val.split(",");
                                if(ui.placeholder && (keyword || val ? ui.placeholder.hide() : ui.placeholder.show()), ui.suggest.empty(), ui.suggest.show(), 0 === parentCodes.length) "focus" === event.type && ui.suggest.hide(), $('<div class="' + pluginName + '-suggest-notfound">没找到相关匹配项，<a href="javascript:;">点击这里</a> 查看全部</div>').appendTo(ui.suggest).find("a").bind("click", function() {
                                    ui.drop.trigger("click")
                                });
                                else {
                                    var suggestList = $('<div class="' + pluginName + '-suggest-list"></div>').appendTo(ui.suggest);
                                    parentCodes.forEach(function(code) {
                                        Array.isArray(result[code]) ? result[code].forEach(function(item) {
                                            $('<div data-id="' + item[0] + '" data-name="' + item[1] + '" class="' + pluginName + '-suggest-item">' + (-1 !== vals.indexOf(item[0]) ? '<i class="suggest-selected">&radic;</i>' : "") + item[1] + "</div>").appendTo(suggestList)
                                        }) : "object" === _typeof(result[code]) && result[code].parent && result[code].children && ($('<div class="' + pluginName + '-suggest-title">' + result[code].parent[1] + "</div>").appendTo(suggestList), result[code].children.forEach(function(item) {
                                            $('<div data-id="' + item[0] + '" data-name="' + item[1] + '" class="' + pluginName + '-suggest-item">' + (-1 !== vals.indexOf(item[0]) ? '<i class="suggest-selected">&radic;</i>' : "") + item[1] + "</div>").appendTo(suggestList)
                                        }))
                                    })
                                }
                            }
                        }).on("keydown." + this._name, function(event) {
                            var listContainer, list, focus, nextItem, lastItem, keys = [9, 13, 27, 38, 40];
                            if(lastItem = ui.list.children("span:last"), 8 === event.keyCode && "" === $(this).val()) return void lastItem.find("a.close").trigger("click", event);
                            if(-1 !== keys.indexOf(event.keyCode)) {
                                switch(listContainer = ui.suggest.find("." + pluginName + "-suggest-list"), list = listContainer.find("." + pluginName + "-suggest-item"), focus = list.filter(".active"), event.keyCode) {
                                    case 9:
                                    case 13:
                                        focus.trigger("click");
                                        break;
                                    case 27:
                                        ui.suggest.hide();
                                        break;
                                    case 38:
                                        nextItem = focus.prevAll("." + pluginName + "-suggest-item").first(), 0 === nextItem.length && (nextItem = list.last()), nextItem.addClass("active").siblings(".active").removeClass("active"), focus = nextItem,
                                            function() {
                                                var focusTop = (focus.position() || {
                                                        "top": 0
                                                    }).top,
                                                    listHeight = (focus.height(), listContainer.height()),
                                                    listScroll = listContainer.scrollTop();
                                                focusTop <= listHeight ? focusTop < 0 && listContainer.scrollTop(listScroll + focusTop) : listContainer.scrollTop(focusTop)
                                            }();
                                        break;
                                    case 40:
                                        nextItem = focus.nextAll("." + pluginName + "-suggest-item").first(), 0 === nextItem.length && (nextItem = list.first()), nextItem.addClass("active").siblings(".active").removeClass("active"), focus = nextItem,
                                            function() {
                                                var nextItemTop = (nextItem.position() || {
                                                        "top": 0
                                                    }).top,
                                                    nextItemHeight = nextItem.outerHeight(!0),
                                                    containerHeight = ui.suggest.height(),
                                                    listScrollTop = listContainer.scrollTop();
                                                nextItemTop > 0 ? nextItemTop + listScrollTop + nextItemHeight > containerHeight && listContainer.scrollTop(nextItemTop + listScrollTop + nextItemHeight - containerHeight) : listContainer.scrollTop(0)
                                            }()
                                } - 1 === [38, 40].indexOf(event.keyCode) && (event.preventDefault(), event.stopPropagation())
                            }
                        }), that.disabled() && ui.element.prop("readonly", !0), ui.suggest = $('<div class="' + pluginName + '-suggest" />').appendTo(ui.helper).on("click." + this._name, "." + pluginName + "-suggest-item", function() {
                            var code = $(this).attr("data-id"),
                                name = $(this).attr("data-name"),
                                val = $element.val(),
                                vals = val.split(","),
                                items = that.options.filter.call(that, vals),
                                overRangeLabel = ui.suggest.find("." + pluginName + "-suggest-over-range");
                            if("" !== val && vals.length >= that.options.max) return 0 === overRangeLabel.length && (overRangeLabel = $('<div class="' + pluginName + '-suggest-over-range">最多只能选择 ' + that.options.max + " 项</div>").prependTo(ui.suggest)), event.stopPropagation(), !1;
                            overRangeLabel.remove(), -1 === vals.indexOf(code) && items.push([code, name]), $element.val(items.map(function(item) {
                                return item[0]
                            }).join(",")).triggerHandler("change"), that.refresh(), ui.element.val("").trigger("focus." + that._name), !!that.options.callback && that.options.callback.call(that, items)
                        }), ui.drop = $("<em />").addClass("drop").attr("data-nick", that.options.dataNick || "").appendTo(ui.helper).height($element.innerHeight() + that._border($element, "top") + that._border($element, "bottom")).css({
                            "margin-top": -that._border($element, "top")
                        }).bind("click." + that._name, function() {
                            if(that.disabled()) return event.stopPropagation(), !1;
                            that.options.drop && that.options.drop.apply(window)
                        }), that.options.width ? ui.helper.width(that.options.width + ui.helper.find("em.drop").width() - that._padding(ui.helper, "right")) : ui.helper.width($element.innerWidth() - that._padding($element, "left") - that._padding($element, "right")), ui.placeholder = $("<i />").addClass("placeholder").css({
                            // "line-height": ui.element.outerHeight() + "px",
                            "padding-left": that._padding(ui.element, "left") + that._border(ui.helper, "left"),
                            "text-indent": ui.element.css("text-indent"),
                            "font-size": ui.element.css("font-size"),
                            "font-family": ui.element.css("font-family"),
                            "margin-top": -that._padding(ui.element, "top") + that._border(ui.helper, "top")
                        }).prependTo(ui.helper).text($element.attr("placeholder") || "").bind("click." + this._name, function(event) {
                            ui.helper.trigger("click"), event.stopPropagation()
                        }), ui.focus = function(handler) {
                            return handler ? ui.element.triggerHandler("focus") : ui.element.trigger("focus"), ui
                        }, that.ui = ui, that.options && that.options.init && that.options.init.call(that), $(document).bind("click." + that._name, function() {
                            ui.suggest.hide()
                        }), that
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? !!("boolean" == typeof that.options.disabled && !0 === that.options.disabled || "function" == typeof that.options.disabled && !0 === that.options.disabled()) : (that.options.disabled = disabled, that.ui.helper[disabled ? "addClass" : "removeClass"](pluginName + "-disabled"), that)
                    }, Plugin.prototype.fetch = function() {
                        return this
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            $element = $(that.element),
                            val = $element.val(),
                            uiUpdater = function() {
                                var list = that.ui.list,
                                    fixSize = that.ui.helper.find("em.drop").width() - that._padding(that.ui.helper, "right");
                                if($element.val() || that.ui.element.val() ? that.ui.placeholder && that.ui.placeholder.hide() : that.ui.placeholder && that.ui.placeholder.show(), that.options.width) {
                                    var width = 0;
                                    "number" == typeof that.options.width ? width = that.options.width : (list.children("span").each(function() {
                                        width += $(this).outerWidth(!0)
                                    }), that.options.maxwidth && width > that.options.maxwidth && (width = that.options.maxwidth), width = Math.max(width, $element.width() - fixSize)), list.width(width), that.ui.helper.width(width + fixSize)
                                }
                                if(that.options.height) {
                                    list.css({
                                        "height": "auto",
                                        "line-height": $element.height() + "px"
                                    });
                                    var height = list.height();
                                    height = "number" == typeof that.options.height ? that.options.height : list.height(), that.options.maxheight && height > that.options.maxheight && (height = that.options.maxheight), height = Math.max(height, $element.height()), 0 === height && (height = "auto"), list.css({
                                        "height": height + "px"
                                    }), that.ui.helper.css({
                                        "height": height + "px",
                                        "line-height": $element.height() + "px"
                                    });
                                    var _closeHeight = list.find("a.close").outerHeight();
                                    list.find("a.close").css({
                                        "top": ($element.height() - _closeHeight) / 2 + "px"
                                    })
                                }
                                var lastItem = list.find("span:last"),
                                    lastItemPosition = 0;
                                lastItem.length > 0 && (lastItemPosition = lastItem.position().left + lastItem.outerWidth(!0)), that.ui.element.css({
                                    "left": lastItemPosition,

                                }), that.ui.drop.height(("auto" === height ? 25 : that.ui.helper.innerHeight()) + that._border($element, "top") + that._border($element, "bottom"))
                            },
                            itemLongString = "",
                            itemLength = 0,
                            items = that.options.filter.call(that, val.split(",")),
                            itemcode = [],
                            list = that.ui.list.empty();
                        if(that.options.maxLength > 0) {
                            for(var i = 0; i < items.length; i++) itemLongString += items[i][1];
                            LT.String.realLength(itemLongString) > that.options.maxLength && (itemLength = Math.floor(that.options.maxLength / items.length))
                        }
                        for(var _i = 0; _i < items.length; _i++) {
                            itemcode.push(items[_i][0]);
                            $("<span />").attr("data-id", items[_i][0]).text(0 === itemLength ? items[_i][1] : LT.String.substr(items[_i][1], 0, itemLength, "...")).append('<a class="close" />').appendTo(list).bind("click." + pluginName, function(event) {
                                event.stopPropagation()
                            }).find("a.close").bind("click." + pluginName, function(event) {
                                if(that.disabled()) return event.stopPropagation(), !1;
                                var code = $(this).closest("span").attr("data-id");
                                items = items.filter(function(item) {
                                    return item[0] !== code
                                }), $element.val(items.map(function(item) {
                                    return item[0]
                                }).join(",")).triggerHandler("change"), $(this).closest("span").remove(), uiUpdater(), event.stopPropagation(), !!that.options.callback && that.options.callback.call(that, items)
                            })
                        }
                        $element.val(itemcode.join(",")), !init && $element.trigger("change"), uiUpdater()
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },
        "b0xf": function(module, exports, __webpack_require__) {
            "use strict";
            (function(global) {
                function _classCallCheck(instance, Constructor) {
                    if(!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
                }
                var _createClass = function() {
                        function defineProperties(target, props) {
                            for(var i = 0; i < props.length; i++) {
                                var descriptor = props[i];
                                descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                            }
                        }
                        return function(Constructor, protoProps, staticProps) {
                            return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                        }
                    }(),
                    CoreClass = function() {
                        function CoreClass() {
                            return _classCallCheck(this, CoreClass), this.tpls = {}, this.scripts = {}, this.datas = {}, this._initTpls()._initScripts(), this
                        }
                        return _createClass(CoreClass, [{
                            "key": "_generate",
                            "value": function() {
                                return Math.random().toString().replace(".", "")
                            }
                        }, {
                            "key": "_initTpls",
                            "value": function() {
                                var $NODETPL = this;
                                return this.tpls = {
                                    "main": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid(), _ += "<style>#" + guid + " {  font-size: 12px;  position: relative;}#" + guid + ' .clearfix:after {  visibility: hidden;  display: block;  font-size: 0;  content: " ";  clear: both;  height: 0;}#' + guid + " .clearfix {  *zoom: 1;}#" + guid + " .data-error {  display: none;  top: 10px;  right: 10px;  padding: 5px 15px;  color: #b94a48;  border-color: #eed3d7;  background-color: #f2dede;  border-radius: 3px;  position: absolute;}#" + guid + " .data-result {  line-height: 32px;  padding: 10px 34px;}#" + guid + " .data-result em {  color: #999;  margin-right: 10px;}#" + guid + " .data-result span {  display: inline-block;  vertical-align: middle;  background-color: #29c;  border-radius: 15px;  padding: 0 14px;  color: #fff;  margin: 0 5px 2px 0;  line-height: 22px;  white-space: nowrap;}#" + guid + " .data-tabs ul {  *zoom: 1;  padding: 0 34px;}#" + guid + ' .data-tabs ul:after {  visibility: hidden;  display: block;  font-size: 0;  content: " ";  clear: both;  height: 0;}#' + guid + " .data-tabs ul li {  float: left;  position: relative;  border-width: 1px 1px 0 1px;  border-color: #d9d9d9;  border-style: solid;  line-height: 26px;  margin-right: -1px;  border-radius: 2px;}#" + guid + " .data-tabs ul li a {  display: block;  padding: 0 15px;  color: #333;}#" + guid + " .data-tabs ul li a em {  display: inline-block;  vertical-align: middle;  width: 10px;  height: 6px;  overflow: hidden;  margin-left: 15px;  margin-right: -5px;  background: url(" + __webpack_require__("b7QJ") + ");}#" + guid + " .data-tabs ul li a:hover,#" + guid + " .data-tabs ul li a:active,#" + guid + " .data-tabs ul li a:focus {  color: #333;  text-decoration: none;}#" + guid + " .data-tabs ul li.active {  padding-bottom: 1px;  margin-bottom: -1px;  background-color: #fcfcfc;}#" + guid + " .data-container {  background-color: #fcfcfc;  border: 1px solid #e5e5e5;  margin: 0 34px 18px;  padding: 0;  border-radius: 2px;  min-height: 330px;}#" + guid + " .data-container a.d-item,#" + guid + " .data-container a.d-cate,#" + guid + " .data-container a.d-sub-cate-all {  line-height: 26px;  padding: 0 10px;  margin-left: 15px;  display: inline-block;  vertical-align: middle;  white-space: nowrap;}#" + guid + " .data-container a.d-item:hover,#" + guid + " .data-container a.d-item:active,#" + guid + " .data-container a.d-item:focus,#" + guid + " .data-container a.d-cate:hover,#" + guid + " .data-container a.d-cate:active,#" + guid + " .data-container a.d-cate:focus,#" + guid + " .data-container a.d-sub-cate-all:active,#" + guid + " .data-container a.d-sub-cate-all:focus {  text-decoration: none;}#" + guid + " .data-container a.d-item:hover,#" + guid + " .data-container a.d-cate:hover,#" + guid + " .data-container a.d-sub-cate-all:hover {  background-color: #d5e9f2;}#" + guid + " .data-container a.d-item:focus,#" + guid + " .data-container a.d-cate:focus,#" + guid + " .data-container a.d-sub-cate-all:focus {  outline: none;}#" + guid + " .data-container a.d-item-active,#" + guid + " .data-container a.d-item-active:hover,#" + guid + " .data-container a.d-sub-cate-active,#" + guid + " .data-container a.d-sub-cate-active:hover {  color: #fff;  background-color: #3d9ccc;}#" + guid + " .data-container a.d-item-disabled,#" + guid + " .data-container a.d-cate-disabled {  cursor: no-drop;  color: #666;}#" + guid + " .data-container a.d-item-disabled:hover,#" + guid + " .data-container a.d-cate-disabled:hover {  background-color: #fff;}#" + guid + " .data-container .data-list-all {  margin-top: 10px;  margin-left: 20px;  margin-bottom: -20px;  position: relative;  z-index: 10;}#" + guid + " .data-container .cate-list-hot {  position: relative;  z-index: 1;}#" + guid + " .data-container .view-all .cate-list-hot .cate-list-title,#" + guid + " .data-container .view-all .cate-list-normal .cate-list-title {  font-weight: bold;  padding: 0 25px;  line-height: 26px;}#" + guid + " .data-container .cate-list-hot a.d-cate-active {  border-top-color: #9dd6f2;  border-left-color: #9dd6f2;  border-right-color: #9dd6f2;  background-color: #fff;  padding-bottom: 2px;  margin-bottom: -2px;}#" + guid + " .data-container-1 .cate-list-hot {  margin-bottom: 10px;}#" + guid + " .data-container-1 .cate-list-hot a.d-cate {  border-bottom: 2px solid #fff;}#" + guid + " .data-container-1 .cate-list-hot a.d-cate-active {  padding-bottom: 0;  margin-bottom: 0;  border-bottom-color: #9dd6f2;  background-color: #9dd6f2;  color: #fff;}#" + guid + " .data-container .view-all .cate-list-normal {  position: relative;}#" + guid + " .data-container .view-all .cate-list-hot ul li,#" + guid + " .data-container .view-all .cate-list-normal ul li {  float: left;  margin-bottom: 5px;  overflow-x: hidden;  text-overflow: ellipsis;  width: 180px;}#" + guid + " .data-container-1 .view-all .cate-list-normal ul li {  width: auto;}#" + guid + " .data-container .view-all .cate-list-normal .d-cate {  line-height: 40px;}#" + guid + " .data-container .view-all {  padding: 25px 0;}#" + guid + " .data-container .view-box {  padding: 0;}#" + guid + " .data-container .view-cate {  padding: 25px 0;}#" + guid + " .data-container .view-box .cate-list-box {  height: 330px;  overflow-y: auto;  padding: 24px 0;}#" + guid + " .data-container .view-tree .tree-container .tree-item-list {  min-height: 330px;  max-height: 450px;  overflow-y: auto;  border-left: 1px solid #d9d9d9;}#" + guid + " .data-container .view-box .cate-list-hot {  border-top: 1px dotted #e0e0e0;  padding-left: 15px;  padding-right: 15px;  margin-top: 15px;}#" + guid + " .data-container .view-box .cate-list-box ul li {  float: left;  margin-bottom: 5px;  _display: inline;  width: 184px;  overflow-x: hidden;  text-overflow: ellipsis;}#" + guid + " .data-container-1 .view-box .cate-list-box ul li {  width: auto;}#" + guid + " .data-container .view-box .cate-list-box ul li.d-sub-cate {  float: none;  clear: both;  margin-left: 10px;  display: block;  color: #666;  line-height: 26px;}#" + guid + " .data-container .view-box .cate-list-box ul li.d-sub-cate a.d-sub-cate-all {  text-decoration: none;  margin-left: 5px;}#" + guid + " .data-container .view-cate .cate-list-subs ul li {  float: left;  margin-bottom: 5px;  width: 180px;}#" + guid + " .data-container .view-cate .cate-list-subs a.d-cate {  line-height: 40px;}#" + guid + " .data-container .view-tree {  background-color: #fff;}#" + guid + " .data-container .view-tree .tree-container {  position: relative;  padding-left: 160px;  zoom: 1;}#" + guid + " .data-container .view-tree .tree-container .tree-list {  position: absolute;  left: 0;  top: 0;  width: 160px;  background-color: #fcfcfc;  border-right: 1px solid #d9d9d9;  min-height: 330px;}#" + guid + " .data-container .view-tree .tree-container .tree-list ul li {  *zoom: 1;}#" + guid + " .data-container .view-tree .tree-container .tree-list ul li a.d-tree {  position: relative;  z-index: 1;  display: block;  line-height: 24px;  height: 24px;  padding-left: 18px;  padding-top: 2px;  color: #33444c;  padding-bottom: 2px;  *zoom: 1;}#" + guid + " .data-container-1 .view-tree .tree-container .tree-list ul li a.d-tree {  padding-left: 8px;}#" + guid + " .data-container .view-tree .tree-container .tree-list ul li a.d-tree:hover,#" + guid + " .data-container .view-tree .tree-container .tree-list ul li a.d-tree:active,#" + guid + " .data-container .view-tree .tree-container .tree-list ul li a.d-tree:focus {  text-decoration: none;  outline: none;}#" + guid + " .data-container .view-tree .tree-container .tree-list ul li.d-tree-active a.d-tree {  color: #fff;  background-color: #9ab;}#" + guid + " .data-container .view-tree .tree-container .tree-list ul li a.d-tree label {  display: none;  font-family: Arial;  line-height: 16px;  margin-left: 4px;  background-color: #29c;  color: #fff;  padding: 0 4px;}#" + guid + " .data-container .view-tree .tree-container .tree-list ul li a.d-tree-multies label {  display: inline-block;}#" + guid + " .data-container .view-tree .tree-container .tree-item-list .item-list {  padding-top: 10px;}#" + guid + " .data-container .view-tree .tree-container .tree-item-list .item-list ul li {  float: left;  width: 198px;  margin-bottom: 5px;  _display: inline;  overflow-x: hidden;  text-overflow: ellipsis;}#" + guid + " .data-container-1 .view-tree .tree-container .tree-item-list .item-list ul li {  width: auto;}#" + guid + " .data-container .view-tree .tree-container .tree-item-list .item-list ul li.d-sub-cate {  margin-left: 6px;  float: none;  clear: both;  display: block;  margin-top: 10px;}#" + guid + " .data-container .view-tree .tree-container .tree-item-list .item-list ul li.d-sub-cate a.d-sub-cate-all {  text-decoration: none;}#" + guid + " .data-container .view-tree .tree-container .tree-item-list .item-list ul li.d-sub-cate {  color: #666;  line-height: 26px;}#" + guid + " .data-container .view-tree-items .data-all {  margin-top: 15px;}</style>";
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + '">\n  <div class="data-result"></div>\n  <div class="data-tabs">\n    <ul>\n      <li data-selector="tab-all"><a href="javascript:;"><span>', _eqstring = $NODETPL.escapeHtml(1 === $DATA.language ? "All" : "全部职能"), _ += void 0 === _eqstring ? "" : _eqstring, _ += '</span><em></em></a></li>\n    </ul>\n  </div>\n  <div class="data-container data-container-', _eqstring = $NODETPL.escapeHtml($DATA.language), _ += void 0 === _eqstring ? "" : _eqstring, _ += '"></div>\n</div>'
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA),
                                            function(scripts) {
                                                var cache = "undefined" != typeof window ? window : void 0 !== global ? global : {};
                                                cache._nodetpl_ = cache._nodetpl_ || {}, cache._nodetpl_[guid + "-" + duid] = scripts["main"]
                                            }($NODETPL.scripts), _ += "<script>\n", _ += "(function(){\n", _ += "  var cache = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : {};\n", _ += "  cache._nodetpl_['" + guid + "-" + duid + "']('" + guid + "', '" + duid + "');\n", _ += "  delete cache._nodetpl_['" + guid + "-" + duid + "'];\n", _ += "})();\n", _ += "<\/script>\n"
                                    }.bind(this),
                                    "view-all": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-all">\n  ', $DATA.options.all && (_ += '\n    <div class="data-list-all">\n      <a class="d-item" data-code="000" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list["000"][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a>\n    </div>\n  "), _ += '\n  <div class="cate-list-hot">\n    <div class="cate-list-title"><em>通用职能</em></div>\n    <ul class="clearfix">\n      ', $DATA.data.category.hotjobs.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-cate" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n      "
                                            }), _ += '\n    </ul>\n  </div>\n  <div class="cate-list-normal">\n    <div class="cate-list-title"><em>专业职能</em></div>\n    <ul class="clearfix">\n      ', $DATA.data.category.jobs.forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-cate" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n      "
                                            }), _ += "\n    </ul>\n    </table>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this),
                                    "view-box": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-box">\n  <div class="cate-list-box">\n    ', $DATA.options.all$ && "hot-06" !== $DATA._currentCode && (_ += '\n      <p class="data-all">\n        <a class="d-item d-item-all" data-code="', _eqstring = $NODETPL.escapeHtml($DATA._currentCode), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml(["选择全部", "Select All"][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a>\n      </p>\n    "), _ += '\n    <ul class="clearfix">\n      ', $DATA._currentCode && $DATA.data.relations[$DATA._currentCode] && $DATA.data.relations[$DATA._currentCode].forEach(function(item, index) {
                                                _ += "\n        ", $DATA.data.relations[item] ? (_ += "\n          ", $DATA.options.all$ ? (_ += '\n            <li class="d-sub-cate"><a class="d-sub-cate-all" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;"><strong>', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</strong></a></li>\n          ") : (_ += '\n            <li class="d-sub-cate"><strong>', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</strong></li>\n          "), _ += "\n          ", $DATA.data.relations[item].forEach(function(item, index) {
                                                    _ += '\n            <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n          "
                                                }), _ += "\n        ") : (_ += '\n          <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n        "), _ += "\n      "
                                            }), _ += "\n    </ul>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this),
                                    "view-cate": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-cate">\n  <div class="cate-list-subs">\n    <ul class="clearfix">\n      ', $DATA._currentCode && $DATA.data.relations[$DATA._currentCode] && $DATA.data.relations[$DATA._currentCode].forEach(function(item, index) {
                                                _ += '\n        <li><a class="d-cate" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n      "
                                            }), _ += "\n    </ul>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this),
                                    "view-tree": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-tree">\n  <div class="tree-container">\n    <div class="tree-list">\n      <ul>\n        ';
                                            var tindex = 0;
                                            _ += "\n        ", $DATA._currentCode && $DATA.data.relations[$DATA._currentCode] && $DATA.data.relations[$DATA._currentCode].forEach(function(item, index) {
                                                tindex++, _ += '\n          <li><a class="d-tree" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n        "
                                            }), _ += "\n        ", $DATA.data.category.hotjobs.forEach(function(item, index) {
                                                tindex++, _ += '\n          <li><a class="d-tree" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "<label></label></a></li>\n        "
                                            }), _ += '\n      </ul>\n    </div>\n    <div class="tree-item-list"></div>\n  </div>\n</div>'
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this),
                                    "view-tree-items": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '" class="view-tree-items">\n  ', $DATA.options.all$ && "hot-06" !== $DATA._currentCode && (_ += '\n    <p class="data-all">\n      <a class="d-item d-item-all" data-code="', _eqstring = $NODETPL.escapeHtml($DATA._currentCode), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;">', _eqstring = $NODETPL.escapeHtml(["选择全部", "Select All"][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a>\n    </p>\n  "), _ += '\n  <div class="item-list">\n    <ul class="clearfix">\n      ', $DATA._currentCode && $DATA.data.relations[$DATA._currentCode] && $DATA.data.relations[$DATA._currentCode].forEach(function(item, index) {
                                                _ += "\n        ", $DATA.data.relations[item] ? (_ += "\n          ", $DATA.options.all$ ? (_ += '\n            <li class="d-sub-cate"><a class="d-sub-cate-all" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;"><strong>', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</strong></a></li>\n          ") : (_ += '\n            <li class="d-sub-cate"><strong>', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</strong></li>\n          "), _ += "\n          ", $DATA.data.relations[item].forEach(function(item, index) {
                                                    _ += '\n            <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n          "
                                                }), _ += "\n        ") : (_ += '\n          <li><a class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" href="javascript:;" title="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</a></li>\n        "), _ += "\n      "
                                            }), _ += "\n    </ul>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "_initScripts",
                            "value": function() {
                                var $NODETPL = this;
                                return this.scripts = {
                                    "main": function(guid, duid) {
                                        var ROOT = document.getElementById(guid),
                                            $TPLS = (document.getElementById(guid + duid), $NODETPL.tpls),
                                            $DATA = $NODETPL.datas[duid],
                                            $ROOT = $(ROOT),
                                            container = $ROOT.find(".data-container"),
                                            DataClass = {},
                                            ViewClass = {};
                                        DataClass.getCode = function() {
                                            return $DATA.codes
                                        }, DataClass.getChildren = function(code) {
                                            var temp = [];
                                            return function loop(code) {
                                                code in $DATA.data.relations && (temp = temp.concat($DATA.data.relations[code]), $DATA.data.relations[code].forEach(function(_code) {
                                                    loop(_code)
                                                }))
                                            }(code), temp
                                        }, DataClass.getParent = function(code) {
                                            var parentCode = "";
                                            return Object.keys($DATA.data.relations).forEach(function(key) {
                                                if(-1 !== $DATA.data.relations[key].indexOf(code)) return parentCode = key, !1
                                            }), parentCode
                                        }, DataClass.toggleData = function(code) {
                                            var temp, that = this;
                                            return "000" !== code ? (temp = that.getChildren(code), $DATA.codes = $DATA.codes.filter(function(_code) {
                                                return -1 === temp.indexOf(_code)
                                            }), -1 === $DATA.codes.indexOf(code) ? $DATA.codes.push(code) : ($DATA.codes = $DATA.codes.filter(function(_code) {
                                                return code !== _code
                                            }), function loop(code) {
                                                var find = !1,
                                                    parentCode = that.getParent(code);
                                                parentCode && (that.getChildren(parentCode).forEach(function(_code) {
                                                    if(-1 !== $DATA.codes.indexOf(_code)) return find = !0, !1
                                                }), find || ($DATA.codes = $DATA.codes.filter(function(_code) {
                                                    return parentCode !== _code
                                                }), loop(parentCode)))
                                            }(code))) : -1 !== $DATA.codes.indexOf(code) ? $DATA.codes = [] : ($DATA.codes = [], $DATA.codes.push(code)), ViewClass.showResult().refresh(), that
                                        }, DataClass.singleData = function(code) {
                                            return $DATA.codes = [], this.toggleData(code), this
                                        }, ViewClass.showResult = function() {
                                            var html = [],
                                                codelist = DataClass.getCode(),
                                                domResult = $ROOT.find(".data-result");
                                            return $DATA.options.max > 0 ? html.push("<em>" + (1 === $DATA.language ? "Max <strong>" + $DATA.options.max + "</strong>" : "最多选择 <strong>" + $DATA.options.max + "</strong> 项") + "</em>") : html.push("<em>" + (1 === $DATA.language ? "Select" : "请选择") + "</em>"), codelist.length > 0 && codelist.forEach(function(r) {
                                                var text = $DATA.data.list[r][$DATA.language];
                                                html.push('<span data-code="' + r + '">' + text + "</span>")
                                            }), domResult.html(html.join("")), this
                                        }, ViewClass.showTab = function(code) {
                                            var tab, tabs = $ROOT.find(".data-tabs ul");
                                            return code = code || "", $DATA._currentCode = code, code ? code in $DATA.data.relations && (tab = tabs.find('li[data-code="' + code + '"]'), 0 === tab.length && (tab = $('<li data-code="' + code + '"><a href="javascript:;"><span>' + $DATA.data.list[code][$DATA.language] + "</span><em></em></a></li>").appendTo(tabs)), tab.addClass("active").nextAll("li").remove(), tab.siblings("li.active").removeClass("active")) : tabs.find('li[data-selector="tab-all"]').addClass("active").siblings("li").remove(), this
                                        }, ViewClass.showCate = function(code) {
                                            var code = code || "";
                                            return $DATA._currentCode = code, code ? code in $DATA.data.relations && container.html($TPLS["view-cate"]($DATA, guid)) : container.html($TPLS["view-all"]($DATA, guid)), this
                                        }, ViewClass.showBox = function(code) {
                                            var code = code || "";
                                            return $DATA._currentCode = code, code ? code in $DATA.data.relations && container.html($TPLS["view-box"]($DATA, guid)) : container.html($TPLS["view-all"]($DATA, guid)), this
                                        }, ViewClass.showTree = function(code) {
                                            var code = code || "";
                                            return $DATA._currentCode = code, code ? code in $DATA.data.relations && container.html($TPLS["view-tree"]($DATA, guid)) : container.html($TPLS["view-all"]($DATA, guid)), this
                                        }, ViewClass.showTreeItems = function(code) {
                                            var container = $ROOT.find(".data-container .tree-item-list");
                                            return code = code || "", $DATA._currentCode = code, code in $DATA.data.relations && (container.html($TPLS["view-tree-items"]($DATA, guid)), container.height(function() {
                                                return Math.max($ROOT.find(".data-container .tree-list").height(), 300)
                                            })), this
                                        }, ViewClass.refresh = function() {
                                            var codelist = DataClass.getCode(),
                                                trees = $ROOT.find(".data-container a.d-tree"),
                                                items = $ROOT.find(".data-container a.d-item"),
                                                subcat = $ROOT.find(".data-container a.d-sub-cate-all"),
                                                allItems = ($ROOT.find(".data-container a.d-cate"), items.filter(".d-item-all").add(items.filter('[data-code="000"]'))),
                                                dataItems = items.not(".d-item-all").not('[data-code="000"]');
                                            return trees.each(function() {
                                                var subcount = 0,
                                                    code = $(this).attr("data-code"),
                                                    label = $(this).find("label");
                                                subcount = DataClass.getChildren(code).filter(function(_code) {
                                                    return -1 !== codelist.indexOf(_code)
                                                }).length, 0 === subcount && -1 !== codelist.indexOf(code) && (subcount = 1), subcount > 0 ? $(this).addClass("d-tree-multies") : $(this).removeClass("d-tree-multies"), label.text(subcount)
                                            }), subcat.each(function() {
                                                var subcount = 0,
                                                    code = $(this).attr("data-code"); - 1 !== codelist.indexOf(code) ? $(this).removeClass("d-item-multies").addClass("d-sub-cate-active") : (subcount = DataClass.getChildren(code).filter(function(_code) {
                                                    return -1 !== codelist.indexOf(_code)
                                                }).length, subcount > 0 ? $(this).addClass("d-item-multies") : $(this).removeClass("d-item-multies"), $(this).removeClass("d-sub-cate-active"))
                                            }), items.each(function() {
                                                var subcount = 0,
                                                    code = $(this).attr("data-code"); - 1 !== codelist.indexOf(code) ? $(this).removeClass("d-item-multies").addClass("d-item-active") : (subcount = DataClass.getChildren(code).filter(function(_code) {
                                                    return -1 !== codelist.indexOf(_code)
                                                }).length, subcount > 0 ? $(this).addClass("d-item-multies") : $(this).removeClass("d-item-multies"), $(this).removeClass("d-item-active"))
                                            }), allItems.hasClass("d-item-active") ? (dataItems.removeClass("d-item-active d-item-multies").addClass("d-item-disabled"), subcat.removeClass("d-sub-cate-active").addClass("d-item-disabled")) : (dataItems.removeClass("d-item-disabled"), subcat.removeClass("d-item-disabled"), subcat.length > 0 && subcat.each(function() {
                                                var code = $(this).attr("data-code"),
                                                    subCodes = DataClass.getChildren(code),
                                                    subItems = dataItems.filter(function() {
                                                        return -1 !== subCodes.indexOf($(this).attr("data-code"))
                                                    });
                                                $(this).hasClass("d-sub-cate-active") ? subItems.removeClass("d-item-active").addClass("d-item-disabled") : subItems.removeClass("d-item-disabled")
                                            })), this
                                        }, $ROOT.find(".data-result").delegate("span", "click", function() {
                                            var code = $(this).attr("data-code");
                                            $ROOT.find(".data-error").hide(), DataClass.toggleData(code)
                                        }), $ROOT.find(".data-tabs ul").delegate("li", "click", function() {
                                            var code = $(this).attr("data-code");
                                            !$(this).hasClass("active") && ViewClass.showTab(code).showCate(code).refresh()
                                        }), container.delegate(".cate-list-hot a.d-cate", "click", function() {
                                            var tabs = $ROOT.find(".data-tabs ul"),
                                                code = $(this).attr("data-code");
                                            if($(this).hasClass("d-cate-disabled")) return !1;
                                            $(this).hasClass("d-cate-active") ? (code = "", tabs.find('li[data-selector="tab-all"]').addClass("active")) : tabs.find('li[data-selector="tab-all"]').removeClass("active").siblings("li").remove(), ViewClass.showTab(code).showBox(code).refresh()
                                        }), container.delegate(".cate-list-normal a.d-cate", "click", function() {
                                            var code = $(this).attr("data-code");
                                            if($(this).hasClass("d-cate-disabled")) return !1;
                                            ViewClass.showTab(code).showCate(code).refresh()
                                        }), container.delegate(".cate-list-subs a.d-cate", "click", function() {
                                            var code = $(this).attr("data-code");
                                            if($(this).hasClass("d-cate-disabled")) return !1;
                                            ViewClass.showTab(code).showTree(code).refresh(), $ROOT.find(".data-container .tree-list ul li a.d-tree:first").trigger("click")
                                        }), container.delegate(".tree-list ul li a.d-tree", "click", function() {
                                            var code = $(this).attr("data-code");
                                            if($(this).hasClass("d-tree-disabled")) return !1;
                                            $(this).closest("li").addClass("d-tree-active").siblings(".d-tree-active").removeClass("d-tree-active"), ViewClass.showTreeItems(code).refresh()
                                        }), container.delegate("a.d-item,a.d-sub-cate-all", "click", function() {
                                            var code = $(this).attr("data-code"),
                                                codelist = DataClass.getCode(),
                                                errMsg = $ROOT.find(".data-error").hide();
                                            return !$(this).hasClass("d-item-disabled") && ("000" !== code && $DATA.options.max > 1 && codelist.length >= $DATA.options.max && -1 === codelist.indexOf(code) && !$(this).hasClass("d-item-multies") ? (0 === errMsg.length && (errMsg = $("<div />").addClass("data-error").appendTo($ROOT)), errMsg.html("最多只能选择 " + $DATA.options.max + " 项").slideDown(), setTimeout(function() {
                                                errMsg.hide()
                                            }, 3e3), !1) : void("000" !== code && !$(this).hasClass("d-item-all") && !$(this).hasClass("d-sub-cate-all") && code in $DATA.data.relations ? DataClass.toggleData(code) : 1 === $DATA.options.max ? (DataClass.singleData(code), ViewClass.refresh()) : DataClass.toggleData(code)))
                                        }), ViewClass.showTab().showResult().showCate().refresh(), $ROOT.width(840)
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "duid",
                            "value": function() {
                                return "nodetpl_d_" + this._generate()
                            }
                        }, {
                            "key": "guid",
                            "value": function() {
                                return "nodetpl_g_" + this._generate()
                            }
                        }, {
                            "key": "escapeHtml",
                            "value": function(html) {
                                return html ? html.toString().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;") : html
                            }
                        }, {
                            "key": "render",
                            "value": function(data, guid) {
                                return this.tpls.main(data, guid || this.guid())
                            }
                        }]), CoreClass
                    }();
                module.exports = {
                    "render": function(data) {
                        return(new CoreClass).render(data)
                    }
                }
            }).call(exports, __webpack_require__("DuR2"))
        },
        "b7QJ": function(module, exports, __webpack_require__) {
            module.exports = __webpack_require__.p + "images/plugins/jquery-LocalDataJobs/dropdown.1e6bd70a.png"
        },
        "fXid": function(module, exports) {},
        "fymN": function(module, exports, __webpack_require__) {
            "use strict";
            ! function($, window, undefined) {
                function Plugin(element, options) {
                    var that = this;
                    return this.element = $(element), this.options = $.extend({}, defaults, options), this._language = 1, !0 === this.options.en && (this._language = 2), this._defaults = defaults, this._name = pluginName, __webpack_require__("AFZZ"), that.LocalData = window.__LocalData, that.init(), that
                }
                var pluginName = "LocalDataSelect",
                    methodHandler = ["destroy", "refresh"],
                    defaults = {
                        "name": "",
                        "en": !1,
                        "all": !1,
                        "allVal": ["000", "不限", "All"],
                        "filter": !0,
                        "init": $.noop,
                        "callback": $.noop
                    };
                Plugin.prototype.init = function() {
                    var that = this,
                        ul = this.element.find("ul").empty();
                    that.options.all && $('<li data-value="' + that.options.allVal[0] + '"><a href="javascript:;">' + that.options.allVal[that._language] + "</a></li>").appendTo(ul), $(that.LocalData.select[that.options.name]).each(function() {
                        $('<li data-value="' + this[0] + '"><a href="javascript:;">' + this[that._language] + "</a></li>").appendTo(ul)
                    }), that.options.callback && that.options.callback.call(this.element)
                }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                    if("string" == typeof options) {
                        var args = arguments,
                            method = options;
                        if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                        if(function() {
                                for(var i = 0; i < methodHandler.length; i++)
                                    if(methodHandler[i] === method) return !0;
                                return !1
                            }()) return this.each(function() {
                            var _plugin = $(this).data("plugin_" + pluginName);
                            _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                        });
                        var _plugin = this.first().data("plugin_" + pluginName);
                        if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                        throw new TypeError(pluginName + ' has no method "' + method + '"')
                    }
                    return this.each(function() {
                        $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                    })
                }
            }(jQuery, window)
        },
        "hsQ4": function(module, exports, __webpack_require__) {
            "use strict";
            __webpack_require__("UJ7A"),
                function($, window, undefined) {
                    function Plugin(element, options) {
                        this.element = element, this.options = $.extend({}, defaults, options), this.ui = {}, this._name = pluginName, this.init()
                    }
                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataUIA",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "width": 0,
                            "maxwidth": 0,
                            "maxLength": 0,
                            "height": "auto",
                            "filter": function(arr) {
                                var _arr = [];
                                arr = arr || [];
                                for(var i = 0; i < arr.length; i++) _arr.push([arr[i], arr[i]]);
                                return _arr
                            },
                            "drop": $.noop,
                            "disabled": !1,
                            "callback": !1
                        };
                    Plugin.prototype._margin = function(element, dir) {
                        return parseInt(element.css("margin-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._border = function(element, dir) {
                        return parseInt(element.css("border-" + dir + "-width").replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype._padding = function(element, dir) {
                        return parseInt(element.css("padding-" + dir).replace(/px|auto|\.\d+/gi, "") || 0)
                    }, Plugin.prototype.init = function() {
                        var that = this,
                            ui = {},
                            $element = $(that.element);
                        return $element.attr("data-ui", that._name), ui.helper = $("<span />").attr("data-name", $element.attr("name") || "").addClass(this._name).css({
                            "margin-left": that._margin($element, "left"),
                            "margin-top": that._margin($element, "top"),
                            "margin-right": that._margin($element, "right"),
                            "margin-bottom": that._margin($element, "bottom")
                        }).insertAfter($element.hide()), that.disabled() && ui.helper.addClass(pluginName + "-disabled"), ui.drop = $("<em />").addClass("drop").attr("data-nick", that.options.dataNick || "").appendTo(ui.helper).height($element.innerHeight() + that._border($element, "top") + that._border($element, "bottom")).css({
                            "margin-top": -that._border($element, "top")
                        }), ui.element = $('<input type="text" readonly="readonly" unselectable="on" />').addClass(this._name + "-input").addClass($element.attr("class")).appendTo(ui.helper).bind("blur." + that._name, function() {
                            $element.trigger("blur")
                        }).bind("click." + that._name, function() {
                            if(that.disabled()) return event.stopPropagation(), !1;
                            that.options.drop && that.options.drop.apply(window)
                        }), ui.element.css({
                            "margin": 0,
                            "width": $element.innerWidth() - that._padding($element, "left") - that._padding(ui.element, "right")
                        }), $element.attr("size") && ui.element.attr("size", $element.attr("size")), ui.placeholder = $("<i />").addClass("placeholder").css({
                            // "line-height": ui.element.outerHeight() + "px",
                            "padding-left": that._padding(ui.element, "left") + that._border(ui.element, "left"),
                            "text-indent": ui.element.css("text-indent"),
                            "font-size": ui.element.css("font-size"),
                            "font-family": ui.element.css("font-family")
                        }).prependTo(ui.helper).text($element.attr("placeholder") || "").bind("click." + that._name, function(event) {
                            ui.element.trigger("click"), event.stopPropagation(), !!that.options.callback && that.options.callback.call(that)
                        }), ui.focus = function(handler) {
                            return handler ? ui.element.triggerHandler("focus") : ui.element.trigger("focus"), ui
                        }, that.ui = ui, that.options && that.options.init && that.options.init.call(that), that
                    }, Plugin.prototype.fetch = function() {
                        return this
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? !!("boolean" == typeof that.options.disabled && !0 === that.options.disabled || "function" == typeof that.options.disabled && !0 === that.options.disabled()) : (that.options.disabled = disabled, that)
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            val = $(that.element).val();
                        if(val) {
                            for(var items = that.options.filter.call(that, val.split(",")), names = [], i = 0; i < items.length; i++) names.push(items[i][1]);
                            that.ui.element.val(names.length > 0 ? names.join(" ") : ""), that.ui.placeholder.hide()
                        } else that.ui.element.val(""), that.ui.placeholder.show();
                        that.ui.focus(init)
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },
        "icNc": function(module, exports, __webpack_require__) {
            module.exports = __webpack_require__.p + "images/common/icons/icon-32.400a9b6d.png"
        },


        "mIGW": function(module, exports, __webpack_require__) {
            "use strict";
            (function(global) {
                function _classCallCheck(instance, Constructor) {
                    if(!(instance instanceof Constructor)) throw new TypeError("Cannot call a class as a function")
                }
                var _createClass = function() {
                        function defineProperties(target, props) {
                            for(var i = 0; i < props.length; i++) {
                                var descriptor = props[i];
                                descriptor.enumerable = descriptor.enumerable || !1, descriptor.configurable = !0, "value" in descriptor && (descriptor.writable = !0), Object.defineProperty(target, descriptor.key, descriptor)
                            }
                        }
                        return function(Constructor, protoProps, staticProps) {
                            return protoProps && defineProperties(Constructor.prototype, protoProps), staticProps && defineProperties(Constructor, staticProps), Constructor
                        }
                    }(),
                    CoreClass = function() {
                        function CoreClass() {
                            return _classCallCheck(this, CoreClass), this.tpls = {}, this.scripts = {}, this.datas = {}, this._initTpls()._initScripts(), this
                        }
                        return _createClass(CoreClass, [{
                            "key": "_generate",
                            "value": function() {
                                return Math.random().toString().replace(".", "")
                            }
                        }, {
                            "key": "_initTpls",
                            "value": function() {
                                var $NODETPL = this;
                                return this.tpls = {
                                    "main": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid(), _ += "<style>#" + guid + " {  position: relative;  zoom: 1;}#" + guid + ' .clearfix:after {  visibility: hidden;  display: block;  font-size: 0;  content: " ";  clear: both;  height: 0;}#' + guid + " .clearfix {  *zoom: 1;}#" + guid + " .data-error {  display: none;  top: 10px;  right: 34px;  padding: 5px 15px;  color: #b94a48;  border-color: #eed3d7;  background-color: #f2dede;  border-radius: 3px;  position: absolute;}#" + guid + " .data-container {  min-height: 330px;  height: 500px;  padding: 10px 34px;}#" + guid + " .data-container ul {  margin-top: 5px;}#" + guid + " .data-container ul li {  float: left;  margin-bottom: 5px;  overflow-x: hidden;  text-overflow: ellipsis;  line-height: 26px;  white-space: nowrap;  width: 220px;  color: #2299cc;  cursor: pointer;}#" + guid + " .data-container ul li.text-item {  cursor: default;  color: #666;  padding-left: 15px;}#" + guid + " .data-container ul li input {  margin: -2px 6px 0 20px;}#" + guid + " .data-container ul li.d-item-disabled {  cursor: no-drop;  color: #666;}#" + guid + " .data-container .data-title {  line-height: 26px;}#" + guid + " .data-container .data-all {  margin-left: 15px;  margin-top: 15px;  margin-bottom: 1px;}#" + guid + " .data-container .data-list {  height: 460px;  overflow: hidden;  overflow-y: auto;}#" + guid + " table {  width: 650px;  overflow: auto;  overflow-x: hidden;}#" + guid + " .data-container table thead tr th {  text-align: left;}#" + guid + " .data-container table tr th,#" + guid + " .data-container table tr td {  border: 1px solid #eaeaea;  background-color: #fcfcfc;}#" + guid + " p.tip {  line-height: 28px;  margin-bottom: 10px;  color: #678;}</style>";
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + '">\n  <div class="data-container data-container-', _eqstring = $NODETPL.escapeHtml($DATA.language), _ += void 0 === _eqstring ? "" : _eqstring, _ += '"></div>\n</div>'
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA),
                                            function(scripts) {
                                                var cache = "undefined" != typeof window ? window : void 0 !== global ? global : {};
                                                cache._nodetpl_ = cache._nodetpl_ || {}, cache._nodetpl_[guid + "-" + duid] = scripts["main"]
                                            }($NODETPL.scripts), _ += "<script>\n", _ += "(function(){\n", _ += "  var cache = typeof window !== 'undefined' ? window : typeof global !== 'undefined' ? global : {};\n", _ += "  cache._nodetpl_['" + guid + "-" + duid + "']('" + guid + "', '" + duid + "');\n", _ += "  delete cache._nodetpl_['" + guid + "-" + duid + "'];\n", _ += "})();\n", _ += "<\/script>\n"
                                    }.bind(this),
                                    "view-all": function($DATA, guid) {
                                        var _ = "",
                                            duid = $NODETPL.duid();
                                        guid = guid || $NODETPL.guid();
                                        try {
                                            var _eqstring;
                                            _ += '<div id="' + guid + duid + '">\n  ', 0 !== $DATA.options.max && (_ += '\n    <p class="tip">最多选择 ', _eqstring = $NODETPL.escapeHtml($DATA.options.max), _ += void 0 === _eqstring ? "" : _eqstring, _ += " 项</p>\n  "), _ += '\n  <div class="data-list">\n    <table>\n      <colgroup>\n        <col width="', _eqstring = $NODETPL.escapeHtml($DATA.options.width$), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" />\n      </colgroup>\n      <thead>\n        ', $DATA.options.all && (_ += '\n        <tr>\n          <th colspan="2">\n            <ul>\n              <li class="d-item" data-code="000"><input type="checkbox" name="item-list" value="', _eqstring = $NODETPL.escapeHtml($DATA.data.list["000"][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list["000"][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</li>\n            </ul>\n          </th>\n        </tr>\n        "), _ += "\n      </thead>\n      \n      <tbody>\n        ", Object.keys($DATA.data.relations).forEach(function(key) {
                                                _ += "\n          <tr>\n            <th>\n              ", !0 === $DATA.options.onlyBigIndustry ? (_ += '\n                <ul>\n                  <li class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(key), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">\n                    <input type="', _eqstring = $NODETPL.escapeHtml($DATA.options.type), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" name="item-list" value="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[key][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[key][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "\n                  </li>\n                </ul>\n              ") : (_ += "\n                ", _eqstring = $NODETPL.escapeHtml($DATA.data.list[key][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "\n              "), _ += "\n            </th>\n            <td>\n              ", !0 === $DATA.options.onlyBigIndustry ? (_ += "\n                <ul>\n                  ", $DATA.data.relations[key].forEach(function(item, index) {
                                                    _ += '\n                    <li class="text-item">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</li>\n                  "
                                                }), _ += "\n                </ul>\n              ") : (_ += "\n                <ul>\n                  ", $DATA.data.relations[key].forEach(function(item, index) {
                                                    _ += '\n                    <li class="d-item" data-code="', _eqstring = $NODETPL.escapeHtml(item), _ += void 0 === _eqstring ? "" : _eqstring, _ += '"><input type="', _eqstring = $NODETPL.escapeHtml($DATA.options.type), _ += void 0 === _eqstring ? "" : _eqstring, _ += '" name="item-list" value="', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += '">', _eqstring = $NODETPL.escapeHtml($DATA.data.list[item][$DATA.language]), _ += void 0 === _eqstring ? "" : _eqstring, _ += "</li>\n                  "
                                                }), _ += "\n                </ul>\n              "), _ += "\n            </td>\n          </tr>\n        "
                                            }), _ += "\n      </tbody>\n    </table>\n  </div>\n</div>"
                                        } catch(e) {
                                            console.log(e.stack)
                                        }
                                        return $DATA && ($NODETPL.datas[duid] = $DATA), _
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "_initScripts",
                            "value": function() {
                                var $NODETPL = this;
                                return this.scripts = {
                                    "main": function(guid, duid) {
                                        var ROOT = document.getElementById(guid),
                                            $TPLS = (document.getElementById(guid + duid), $NODETPL.tpls),
                                            $DATA = $NODETPL.datas[duid],
                                            $ROOT = $(ROOT),
                                            DataClass = {},
                                            ViewClass = {};
                                        DataClass.getCode = function() {
                                            return $DATA.codes
                                        }, DataClass.getChildren = function(code) {
                                            var temp = [];
                                            return function loop(code) {
                                                code in $DATA.data.relations && (temp = temp.concat($DATA.data.relations[code]), $DATA.data.relations[code].forEach(function(_code) {
                                                    loop(_code)
                                                }))
                                            }(code), temp
                                        }, DataClass.getParent = function(code) {
                                            var parentCode = "";
                                            return Object.keys($DATA.data.relations).forEach(function(key) {
                                                if(-1 !== $DATA.data.relations[key].indexOf(code)) return parentCode = key, !1
                                            }), parentCode
                                        }, DataClass.toggleData = function(code) {
                                            var temp, that = this;
                                            return "000" !== code ? (temp = that.getChildren(code), $DATA.codes = $DATA.codes.filter(function(_code) {
                                                return -1 === temp.indexOf(_code)
                                            }), -1 === $DATA.codes.indexOf(code) ? $DATA.codes.push(code) : ($DATA.codes = $DATA.codes.filter(function(_code) {
                                                return code !== _code
                                            }), function loop(code) {
                                                var find = !1,
                                                    parentCode = that.getParent(code);
                                                parentCode && (that.getChildren(parentCode).forEach(function(_code) {
                                                    if(-1 !== $DATA.codes.indexOf(_code)) return find = !0, !1
                                                }), find || ($DATA.codes = $DATA.codes.filter(function(_code) {
                                                    return parentCode !== _code
                                                }), loop(parentCode)))
                                            }(code))) : -1 !== $DATA.codes.indexOf(code) ? $DATA.codes = [] : ($DATA.codes = [], $DATA.codes.push(code)), ViewClass.refresh(), that
                                        }, DataClass.singleData = function(code) {
                                            return $DATA.codes = [], this.toggleData(code), this
                                        }, DataClass.toggleSingleData = function(code) {
                                            var that = this;
                                            that.getParent(code);
                                            return -1 !== $DATA.codes.indexOf(code) && !0, this.toggleData(code), that
                                        }, ViewClass.refresh = function() {
                                            var codelist = DataClass.getCode(),
                                                items = $ROOT.find(".data-container ul li.d-item"),
                                                allItems = items.filter(".d-item-all").add(items.filter('[data-code="000"]')),
                                                dataItems = items.not(".d-item-all").not('[data-code="000"]');

                                            return items.each(function() {
                                                var that = $(this),
                                                    code = that.attr("data-code"); - 1 !== codelist.indexOf(code) ? $("input", that).prop("checked", !0) : $("input", that).prop("checked", !1)
                                            }), allItems.length > 0 && (allItems.find("input").prop("checked") ? dataItems.addClass("d-item-disabled").find("input").prop("checked", !0).prop("disabled", !0) : dataItems.removeClass("d-item-disabled").find("input").prop("disabled", !1)), this
                                        }, $ROOT.find(".data-container").delegate("li.d-item", "click", function() {
                                            var code = $(this).attr("data-code"),
                                                codelist = DataClass.getCode(),
                                                errMsg = $ROOT.find(".data-error").hide();
                                            return !$("input", $(this)).prop("disabled") && ("000" !== code && $DATA.options.max > 1 && codelist.length >= $DATA.options.max && -1 === codelist.indexOf(code) ? (0 === errMsg.length && (errMsg = $("<div />").addClass("data-error").appendTo($ROOT)), errMsg.html("最多只能选择 " + $DATA.options.max + " 项").slideDown(), !1) : void("000" !== code && !$(this).hasClass("d-item-all") && !0 !== $DATA.options.onlyBigIndustry && code in $DATA.data.relations || (1 === $DATA.options.max ? DataClass.singleData(code) : DataClass.toggleData(code))))
                                        }), $ROOT.find(".data-container").html($TPLS["view-all"]($DATA, guid)), ViewClass.refresh(), $ROOT.width($DATA.options.width || 900)
                                    }.bind(this)
                                }, $NODETPL
                            }
                        }, {
                            "key": "duid",
                            "value": function() {
                                return "nodetpl_d_" + this._generate()
                            }
                        }, {
                            "key": "guid",
                            "value": function() {
                                return "nodetpl_g_" + this._generate()
                            }
                        }, {
                            "key": "escapeHtml",
                            "value": function(html) {
                                return html ? html.toString().replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;") : html
                            }
                        }, {
                            "key": "render",
                            "value": function(data, guid) {
                                return this.tpls.main(data, guid || this.guid())
                            }
                        }]), CoreClass
                    }();
                module.exports = {
                    "render": function(data) {
                        return(new CoreClass).render(data)
                    }
                }
            }).call(exports, __webpack_require__("DuR2"))
        },
        "oOy/": function(module, exports, __webpack_require__) {
            "use strict";
            var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
                return typeof obj
            } : function(obj) {
                return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj
            };
            __webpack_require__("hsQ4"), __webpack_require__("ZBKY"), __webpack_require__("LRTM"), __webpack_require__("ar5U"),
                function($, window, undefined) {
                    function Plugin(element, options) {
                        var that = this;
                        return that.data = [], that.LocalData = {}, this.element = element, this.options = $.extend({}, defaults, options), this._language = that.options.en ? 1 : 0, this._uiNameSpace = "", 1 !== that.options.max && "radio" !== that.options.type || (that.options.max = 1, that.options.type = "radio", that.options.all = !1), this._name = pluginName, __webpack_require__("15h4")("./" + that.options.name), that.LocalData = window.__LocalData[that.options.name], that.init(), that.refresh(!0), that
                    }


                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataMultiA",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "title": "请选择",
                            "name": "",
                            "width": 700,
                            "width$": 200,
                            "height$": "auto",
                            "cols": 0,
                            "max": 0,
                            "onlyBigIndustry": !1,
                            "type": "checkbox",
                            "en": !1,
                            "all": !0,
                            "allVal": ["000", "不限", "Open"],
                            "maxLength": 0,
                            "init": !1,
                            "initData": !1,
                            "ui": "C",
                            "msg": "",
                            "disabled": !1,
                            "callback": !1
                        };
                    Plugin.prototype.init = function() {
                        var that = this,
                            $element = $(that.element),
                            _extend = {
                                "max": that.options.max || that.options.maxLength,
                                "maxLength": that.options.maxLength,
                                "dataNick": that.options.name,
                                "filter": function() {
                                    return that._filter.apply(that, arguments)
                                },
                                "drop": function() {
                                    return that._drop.apply(that, arguments)
                                },
                                "suggest": function() {
                                    return that._suggest.apply(that, arguments)
                                },
                                "disabled": function() {
                                    return that.options.disabled
                                },
                                "callback": function() {
                                    if(that.options.callback) return that.options.callback.apply(that, arguments)
                                }
                            };
                        return that.options.ui ? ("string" == typeof that.options.ui && (that.options.ui = {
                            "type": that.options.ui
                        }), "object" === _typeof(that.options.ui) && (that.options.ui.type = that.options.ui.type || "B", that._uiNameSpace = "LocalDataUI" + that.options.ui.type.toUpperCase(), $element[that._uiNameSpace]($.extend(_extend, that.options.ui)), that.ui = ($element[that._uiNameSpace]("fetch") || {}).ui)) : $element.bind("click." + pluginName, function() {
                            if(that.options.disabled) return !1;
                            that._drop.apply(that, arguments)
                        }), that.disabled(that.options.disabled), that.options && that.options.init && that.options.init.call(that), that.data = that._initData(), that
                    }, Plugin.prototype._addCat = function(data) {
                        var _this = this;
                        return $.isArray(data) ? data.map(function(v) {
                            return _this._addCat(v)
                        }) : this.LocalData.relations["cat-" + data] ? "cat-" + data : data
                    }, Plugin.prototype._removeCat = function(str) {
                        return this.LocalData.relations[str] ? str.replace(/[^\d]/g, "") : str
                    }, Plugin.prototype._filter = function(arr) {
                        var that = this;
                        return !0 === that.options.onlyBigIndustry && (arr = this._addCat(arr)), arr = arr.map(function(item) {
                            var text = "";
                            return !!that.LocalData.list[item] && (text = that.LocalData.list[item][that._language], !0 === that.options.onlyBigIndustry && (item = that._removeCat(item)), [item].concat(text))
                        }).filter(function(item) {
                            return !1 !== item
                        })
                    }, Plugin.prototype._initData = function() {
                        var that = this,
                            $element = $(that.element),
                            initdata = [];
                        return that.options.ui ? initdata = $element.val() ? $element.val().split(",") : [] : that.options.initData && ("function" == typeof that.options.initData ? initdata = that.options.initData.call(that).split(",") || [] : "string" == typeof that.options.initData && (initdata = that.options.initData.split(","))), !0 === this.options.onlyBigIndustry && (initdata = this._addCat(initdata)), initdata
                    }, Plugin.prototype._suggest = function(keyword) {
                        var that = this,
                            list = that.LocalData.list || {},
                            relations = that.LocalData.relations || {},
                            result = [],
                            resultObj = {},
                            relationsArr = Object.keys(relations);
                        if("" === (keyword = keyword.trim())) {
                            var defaultSuggest = $(that.element).attr("service-suggest");
                            return defaultSuggest && defaultSuggest.split(",").map(function(code, idx) {
                                "" !== code && (resultObj[code] = resultObj[code] || [], resultObj[code].push([code, list[code][that._language]]))
                            }), defaultSuggest ? [defaultSuggest, resultObj] : resultObj
                        }
                        switch(that.options.name) {
                            case "industry":
                                result = Object.keys(list).filter(function(code) {
                                    return /^\d+$/.test(code) && -1 !== list[code][that._language].toUpperCase().indexOf(keyword.toUpperCase()) && -1 === relationsArr.indexOf(code)
                                }), result.forEach(function(code) {
                                    resultObj[code] = resultObj[code] || [], resultObj[code].push([code, list[code][that._language]])
                                })
                        }
                        return resultObj
                    }, Plugin.prototype._drop = function() {
                        var data, that = this;
                        var test = $(that.element).attr("data-selector");
                        that.data = that._initData(), data = {
                            "data": that.LocalData,
                            "language": that._language,
                            "options": that.options,
                            "codes": that.data
                        }, vdialog({
                            "title": that.options.title,
                            "padding": 0,
                            "lock": !0,
                            "content": __webpack_require__("mIGW").render(data),
                            "ok": function() {
                                $(that.element).attr("value",data.codes.join(","));
                                that.data = data.codes, that.options.ui && $(that.element).val(data.codes.join(",")), that.refresh()
                            },
                            "cancel": !0,
                            "close": function() {
                                that.options.ui && that.ui.focus()
                            }
                        }).showModal()
                    }, Plugin.prototype.text = function() {
                        var that = this,
                            _arr = that._filter(that.data);
                        return _arr = _arr.map(function(item) {
                            return item[1]
                        }), _arr.join(",")
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? that.options.disabled : (that.options.disabled = disabled, that.options.ui && "object" === _typeof(that.options.ui) ? $(that.element)[that._uiNameSpace]("disabled", disabled) : $(that.element).prop("disabled", disabled), that)
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            $element = $(that.element);
                        that.options.ui && $element[that._uiNameSpace]("refresh", init), !init && that.options.callback && that.options.callback.call(that, that._filter(that.data))
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },
        "qVS6": function(module, exports, __webpack_require__) {
            "use strict";
            var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
                return typeof obj
            } : function(obj) {
                return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj
            };
            __webpack_require__("hsQ4"), __webpack_require__("ZBKY"), __webpack_require__("LRTM"),
                function($, window, undefined) {
                    function Plugin(element, options) {
                        var that = this;
                        return that.data = [], that.LocalData = {}, that.element = element, that.options = $.extend({}, defaults, options), that._language = that.options.en ? 1 : 0, that._uiNameSpace = "", 1 !== that.options.max && "radio" !== that.options.type || (that.options.max = 1, that.options.type = "radio", that.options.all = !1), that._defaults = defaults, that._name = pluginName, __webpack_require__("15h4")("./" + that.options.name), that.LocalData = window.__LocalData[that.options.name], that.init(), that.refresh(!0), that
                    }
                    $.noop = $.noop || function() {};
                    var pluginName = "LocalDataCity",
                        methodHandler = ["destroy", "refresh"],
                        defaults = {
                            "title": "选择城市信息",
                            "name": "city",
                            "cols": 7,
                            "max": 0,
                            "type": "checkbox",
                            "districtType": "checkbox",
                            "en": !1,
                            "foreign": !0,
                            "all": !0,
                            "all$": !0,
                            "allVal": ["000", "不限", "Open"],
                            "maxLength": 0,
                            "search": !1,
                            "district": !1,
                            "init": !1,
                            "initData": !1,
                            "ui": "C",
                            "msg": "",
                            "disabled": !1,
                            "callback": !1
                        };
                    Plugin.prototype.init = function() {
                        var that = this,
                            $element = $(that.element),
                            _extend = {
                                "maxLength": that.options.maxLength,
                                "filter": function() {
                                    return that._filter.apply(that, arguments)
                                },
                                "drop": function() {
                                    return that._drop.apply(that, arguments)
                                },
                                "disabled": function() {
                                    return that.options.disabled
                                },
                                "callback": function() {
                                    if(that.options.callback) return that.options.callback.apply(that, arguments)
                                }
                            };
                        return that.options.ui ? ("string" == typeof that.options.ui && (that.options.ui = {
                            "type": that.options.ui
                        }), "object" === _typeof(that.options.ui) && (that.options.ui.type = that.options.ui.type || "B", that._uiNameSpace = "LocalDataUI" + that.options.ui.type.toUpperCase(), $element[that._uiNameSpace]($.extend(_extend, that.options.ui)), that.ui = ($element[that._uiNameSpace]("fetch") || {}).ui)) : $element.bind("click." + pluginName, function() {
                            if(that.options.disabled) return !1;
                            that._drop.apply(that, arguments)
                        }), that.disabled(that.options.disabled), that.options && that.options.init && that.options.init.call(that), that.data = that._initData(), that
                    }, Plugin.prototype._filter = function(arr) {
                        var that = this;
                        return arr = arr.map(function(item) {
                            var parentCode = that._getParent(item),
                                text = "";
                            return !!that.LocalData.list[item] && (text = that.LocalData.list[item][that._language], -1 !== that.LocalData.category.district.indexOf(parentCode) && (text = that.LocalData.list[parentCode][that._language] + " - " + text), [item].concat(text))
                        }).filter(function(item) {
                            return !1 !== item
                        })
                    }, Plugin.prototype._initData = function() {
                        var that = this,
                            $element = $(that.element),
                            initdata = [];
                        return that.options.ui ? initdata = $element.val() ? $element.val().split(",") : [] : that.options.initData && ("function" == typeof that.options.initData ? initdata = that.options.initData.call(that).split(",") || [] : "string" == typeof that.options.initData && (initdata = that.options.initData.split(","))), initdata
                    }, Plugin.prototype._getParent = function(code) {
                        var that = this,
                            parentCode = "";
                        return Object.keys(that.LocalData.relations).forEach(function(key) {
                            if(-1 !== that.LocalData.relations[key].indexOf(code)) return parentCode = key, !1
                        }), parentCode
                    }, Plugin.prototype._drop = function() {
                        var data, that = this;
                        that.data = that._initData(), data = {
                            "data": that.LocalData,
                            "language": that._language,
                            "options": that.options,
                            "codes": that.data
                        }, vdialog({
                            "title": that.options.title,
                            "padding": 0,
                            "lock": !0,
                            "content": __webpack_require__("CJg+").render(data),
                            "ok": function() {
                                $(that.element).attr("value",data.codes.join(","));
                                that.data = data.codes, that.options.ui && $(that.element).val(data.codes.join(",")), that.refresh()
                            },
                            "cancel": !0,
                            "close": function() {
                                that.options.ui && that.ui.focus()
                            }
                        }).showModal()
                    }, Plugin.prototype.text = function() {
                        var that = this,
                            _arr = that._filter(that.data);
                        return _arr = _arr.map(function(item) {
                            return item[1]
                        }), _arr.join(",")
                    }, Plugin.prototype.disabled = function(disabled) {
                        var that = this;
                        return void 0 === disabled ? that.options.disabled : (that.options.disabled = disabled, that.options.ui && "object" === _typeof(that.options.ui) ? $(that.element)[that._uiNameSpace]("disabled", disabled) : $(that.element).prop("disabled", disabled), that)
                    }, Plugin.prototype.refresh = function(init) {
                        var that = this,
                            $element = $(that.element);
                        that.options.ui && $element[that._uiNameSpace]("refresh", init), !init && that.options.callback && that.options.callback.call(that, that._filter(that.data))
                    }, $.fn[pluginName] = $.fn[pluginName] || function(options) {
                        if("string" == typeof options) {
                            var args = arguments,
                                method = options;
                            if(Array.prototype.shift.call(args), "check" === method) return !!this.data("plugin_" + pluginName);
                            if(function() {
                                    for(var i = 0; i < methodHandler.length; i++)
                                        if(methodHandler[i] === method) return !0;
                                    return !1
                                }()) return this.each(function() {
                                var _plugin = $(this).data("plugin_" + pluginName);
                                _plugin && _plugin[method] && _plugin[method].apply(_plugin, args)
                            });
                            var _plugin = this.first().data("plugin_" + pluginName);
                            if(_plugin && _plugin[method]) return _plugin[method].apply(_plugin, args);
                            throw new TypeError(pluginName + ' has no method "' + method + '"')
                        }
                        return this.each(function() {
                            $(this).data("plugin_" + pluginName) || $(this).data("plugin_" + pluginName, new Plugin(this, options))
                        })
                    }
                }(jQuery, window)
        },

        "seXx": function(module, exports, __webpack_require__) {
            "use strict";
            var _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(obj) {
                return typeof obj
            } : function(obj) {
                return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj
            };
            __webpack_require__("oOy/"),
                function($, window, undefined) {
                    $.fn.LocalDataIndustries = $.fn.LocalDataIndustries || function(options) {
                        if("string" == typeof(options = options || {})) return this["LocalDataMultiA"].apply(this, arguments);
                        if("object" === (void 0 === options ? "undefined" : _typeof(options))) {
                            var defaults = {
                                "title": "选择行业分类",
                                "name": "industry",
                                "onlyBigIndustry": !1,
                                "width": 700,
                                "width$": 150,
                                "height$": 400,
                                "cols": 2,
                                "maxLength": 0,
                                "ui": "D",
                                "initData": ""
                            };
                            return options = $.extend(defaults, options), this["LocalDataMultiA"].call(this, options)
                        }
                    }
                }(jQuery, window)
        },
        "syiX": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.country = {
                "list": {
                    "350": ["亚洲", "Asia"],
                    "410": ["中国", "China"],
                    "350020": ["蒙古", "Mongolia"],
                    "350030": ["朝鲜", "North Korea"],
                    "350040": ["韩国", "Korea"],
                    "350050": ["日本", "Japan"],
                    "350060": ["菲律宾", "Philippines"],
                    "350070": ["越南", "Vietnam"],
                    "350080": ["老挝", "Laos"],
                    "350090": ["柬埔寨", "Cambodia"],
                    "350100": ["缅甸", "Burma"],
                    "350110": ["泰国", "Thailand"],
                    "350120": ["马来西亚", "Malaysia"],
                    "350130": ["文莱", "Brunei"],
                    "350140": ["新加坡", "Singapore"],
                    "350150": ["印度尼西亚", "Indonesia"],
                    "350160": ["东帝汶", "east Timor"],
                    "350170": ["尼泊尔", "Nepal"],
                    "350180": ["不丹", "Bhutan"],
                    "350190": ["孟加拉", "Bangladesh"],
                    "350200": ["印度", "India"],
                    "350210": ["巴基斯坦", "Pakistan"],
                    "350220": ["斯里兰卡", "Sri Lanka"],
                    "350230": ["马尔代夫", "Maldives"],
                    "350240": ["哈萨克斯坦", "Kazakhstan"],
                    "350250": ["吉尔吉斯", "Kyrghyzstan"],
                    "350260": ["塔吉克斯坦", "Tajikistan"],
                    "350270": ["乌兹别克", "Uzbekistan"],
                    "350280": ["土库曼斯坦", "Turkmenistan"],
                    "350290": ["阿富汗", "Afghanistan"],
                    "350300": ["伊拉克", "Iraq"],
                    "350310": ["伊朗", "Iran"],
                    "350320": ["叙利亚", "Syria"],
                    "350330": ["约旦", "Jordan"],
                    "350340": ["黎巴嫩", "Lebanon"],
                    "350350": ["以色列", "Israel"],
                    "350360": ["巴勒斯坦", "Palestine"],
                    "350370": ["沙特阿拉伯", "Saudi Arabia"],
                    "350380": ["巴林", "Bahrain"],
                    "350390": ["卡塔尔", "Qatar"],
                    "350400": ["科威特", "Kuwait"],
                    "350410": ["阿联酋", "United Arab Emirates"],
                    "350420": ["阿曼", "Oman"],
                    "350430": ["也门", "Yemen"],
                    "350440": ["格鲁吉亚", "Georgia"],
                    "350450": ["亚美尼亚", "Armenia"],
                    "350460": ["阿塞拜疆", "Azerbaijan"],
                    "350470": ["土耳其", "Turkey"],
                    "350480": ["塞浦路斯", "Cyprus"],
                    "360": ["北美洲", "North America"],
                    "360020": ["加拿大", "Canada"],
                    "360030": ["美国", "America"],
                    "360040": ["墨西哥", "Mexico"],
                    "360050": ["格陵兰", "Greenland"],
                    "360060": ["危地马拉", "Guatemala"],
                    "360070": ["伯利兹", "Belize"],
                    "360080": ["萨尔瓦多", "Salvador"],
                    "360090": ["洪都拉斯", "Honduras"],
                    "360100": ["尼加拉瓜", "Nicaragua"],
                    "360110": ["哥斯达黎加", "Costa Rica"],
                    "360120": ["巴拿马", "Panama"],
                    "360130": ["巴哈马", "Bahamas"],
                    "360140": ["古巴", "Cuba"],
                    "360150": ["牙买加", "Jamaica"],
                    "360160": ["海地", "Haiti"],
                    "360170": ["多米尼加", "Dominican Republic"],
                    "360180": ["安提瓜", "Antigua and Barbuda"],
                    "360190": ["圣基茨", "St. Kitts and Nevis"],
                    "360200": ["多米尼克", "Dominica"],
                    "360210": ["圣卢西亚", "Saint Lucia"],
                    "360220": ["圣文森特", "Saint Vincent and the Grenadines"],
                    "360230": ["格林纳达", "Grenada"],
                    "360240": ["巴巴多斯", "Barbados"],
                    "360250": ["特立尼达", "Trinidad and Tobago"],
                    "360260": ["波多黎各", "Puerto Rico"],
                    "360270": ["英属维尔京", "British Virgin Islands"],
                    "360280": ["美属维尔京", "Virgin Islands"],
                    "360290": ["安圭拉", "Anguilla"],
                    "360300": ["蒙特塞拉特", "Montserrat"],
                    "360310": ["瓜德罗普", "Guadeloupe"],
                    "360320": ["马提尼克", "martinique"],
                    "360330": ["安的列斯", "Nederlandse Antillen"],
                    "360340": ["阿鲁巴", "Aruba"],
                    "360350": ["特克斯", "The turks and caicos islands"],
                    "360360": ["开曼群岛", "Cayman Islands"],
                    "360370": ["百慕大", "Bermuda"],
                    "370": ["南美洲", "South America"],
                    "370020": ["哥伦比亚", "Columbia"],
                    "370030": ["委内瑞拉", "Venezuela"],
                    "370040": ["圭亚那", "Guyana"],
                    "370050": ["法属圭亚那", "French Guiana"],
                    "370060": ["苏里南", "Surinam"],
                    "370070": ["厄瓜多尔", "Ecuador"],
                    "370080": ["秘鲁", "Peru"],
                    "370090": ["玻利维亚", "Bolivia"],
                    "370100": ["巴西", "Brazil"],
                    "370110": ["智利", "Chile"],
                    "370120": ["阿根廷", "Argentina"],
                    "370130": ["乌拉圭", "Uruguay"],
                    "370140": ["巴拉圭", "Paraguay"],
                    "380": ["大洋洲", "Oceania"],
                    "380020": ["澳大利亚", "Australia"],
                    "380030": ["新西兰", "New Zealand"],
                    "380040": ["巴布亚", "Papua New Guinea"],
                    "380050": ["所罗门群岛", "Solomon Islands"],
                    "380060": ["瓦努阿图", "Vanuatu"],
                    "380080": ["马绍尔群岛", "Marshall Islands"],
                    "380090": ["帕劳群岛", "Palau"],
                    "380100": ["瑙鲁", "Nauru"],
                    "380110": ["基里巴斯", "Kiribati"],
                    "380120": ["图瓦卢", "Tuvalu"],
                    "380130": ["萨摩亚", "Samoa"],
                    "380140": ["斐济群岛", "Fiji Islands"],
                    "380150": ["汤加", "Tonga"],
                    "380160": ["库克群岛", "Cook Islands"],
                    "380170": ["关岛", "Guam"],
                    "380190": ["波利尼西亚", "Polynesia"],
                    "380200": ["皮特凯恩岛", "Pitcairn Island"],
                    "380210": ["瓦利斯", "Wallis and Futuna"],
                    "380220": ["纽埃", "Niue"],
                    "380230": ["托克劳", "Tokelau"],
                    "380240": ["美属萨摩亚", "American Samoa"],
                    "380250": ["北马里亚纳", "Northern Marianas"],
                    "380070": ["密克罗尼西亚", "Micronesia"],
                    "380180": ["新喀里多尼亚", "New Caledonia"],
                    "390": ["欧洲", "Europe"],
                    "390020": ["芬兰", "Finland"],
                    "390030": ["瑞典", "Sweden"],
                    "390040": ["挪威", "Norway"],
                    "390050": ["冰岛", "Iceland"],
                    "390060": ["丹麦", "Denmark"],
                    "390070": ["法罗群岛", "Faroe islands"],
                    "390080": ["爱沙尼亚", "Estonia"],
                    "390090": ["拉脱维亚", "Latvia"],
                    "390100": ["立陶宛", "Lithuania"],
                    "390110": ["白俄罗斯", "The Republic of Belarus"],
                    "390120": ["俄罗斯", "Russia"],
                    "390130": ["乌克兰", "Ukraine"],
                    "390140": ["摩尔多瓦", "Moldova"],
                    "390150": ["波兰", "Poland"],
                    "390160": ["捷克", "Czechoslovakia"],
                    "390450": ["斯洛伐克", "The Slovak Republic"],
                    "390170": ["匈牙利", "Hungary"],
                    "390180": ["德国", "Germany"],
                    "390190": ["奥地利", "Austria"],
                    "390200": ["瑞士", "Switzerland"],
                    "390210": ["列支敦士登", "Liechtenstein"],
                    "390220": ["英国", "United Kingdom"],
                    "390230": ["爱尔兰", "Ireland"],
                    "390240": ["荷兰", "Netherlands"],
                    "390250": ["比利时", "Belgium"],
                    "390260": ["卢森堡", "Luxembourg"],
                    "390270": ["法国", "France"],
                    "390280": ["摩纳哥", "Monaco"],
                    "390290": ["罗马尼亚", "Roumania"],
                    "390300": ["保加利亚", "Bulgaria"],
                    "390310": ["塞尔维亚", "Serbia"],
                    "390320": ["马其顿", "Macedonia"],
                    "390330": ["阿尔巴尼亚", "Albania"],
                    "390340": ["希腊", "Greece"],
                    "390350": ["斯洛文尼亚", "Slovenia"],
                    "390360": ["克罗地亚", "Croatia"],
                    "390370": ["波墨", "Bosnia and ink plug elder brother d that"],
                    "390380": ["意大利", "Italy"],
                    "390390": ["梵蒂冈", "Vatican"],
                    "390400": ["圣马力诺", "San Marino"],
                    "390410": ["马耳他", "Malta"],
                    "390420": ["西班牙", "Spain"],
                    "390430": ["葡萄牙", "Portugal"],
                    "390440": ["安道尔", "Andorra"],
                    "400": ["非洲", "Africa"],
                    "400020": ["埃及", "Egypt"],
                    "400030": ["利比亚", "Libya"],
                    "400040": ["苏丹", "Sultan"],
                    "400050": ["突尼斯", "Tunisia"],
                    "400060": ["阿尔及利亚", "Algeria"],
                    "400070": ["摩洛哥", "Morocco"],
                    "400080": ["亚速尔群岛", "Azores"],
                    "400090": ["马德拉群岛", "Madeira"],
                    "400100": ["埃塞俄比亚", "Ethiopia"],
                    "400110": ["厄立特里亚", "Eritrea"],
                    "400120": ["索马里", "Somalia"],
                    "400130": ["吉布提", "Djibouti"],
                    "400140": ["肯尼亚", "Kenya"],
                    "400150": ["坦桑尼亚", "Tanzania"],
                    "400160": ["乌干达", "Uganda"],
                    "400170": ["卢旺达", "Rwanda"],
                    "400180": ["布隆迪", "Burundi"],
                    "400190": ["塞舌尔", "Seychelles"],
                    "400200": ["乍得", "Chad"],
                    "400210": ["中非", "Central Africa"],
                    "400220": ["喀麦隆", "Cameroon"],
                    "400230": ["赤道几内亚", "Equatorial Guinea"],
                    "400240": ["加蓬", "Gabon"],
                    "400250": ["刚果", "Congo"],
                    "400260": ["圣普", "Sao Tome and Principe"],
                    "400270": ["毛里塔尼亚", "Mauritania"],
                    "400280": ["西撒哈拉", "EH West Sahara"],
                    "400290": ["塞内加尔", "Senegal"],
                    "400300": ["冈比亚", "Gambia"],
                    "400310": ["马里", "Mali"],
                    "400320": ["布基纳法索", "Burkina faso"],
                    "400330": ["几内亚", "Guinea"],
                    "400340": ["几内亚比绍", "Guinea-Bissau"],
                    "400350": ["佛得角", "Cape Verde"],
                    "400360": ["塞拉利昂", "Sierra leone"],
                    "400370": ["利比里亚", "Liberia"],
                    "400380": ["科特迪瓦", "Cote d'ivoire"],
                    "400390": ["加纳", "Ghana"],
                    "400400": ["多哥", "Togo"],
                    "400410": ["贝宁", "Benin"],
                    "400420": ["尼日尔", "The Niger"],
                    "400430": ["加那利群岛", "Canary Islands"],
                    "400440": ["赞比亚", "Zambia"],
                    "400450": ["安哥拉", "Angola"],
                    "400460": ["津巴布韦", "Zimbabwe"],
                    "400470": ["马拉维", "Malawi"],
                    "400480": ["莫桑比克", "Mozambique"],
                    "400490": ["博茨瓦纳", "Botswana"],
                    "400500": ["纳米比亚", "Namibia"],
                    "400510": ["南非", "South Africa"],
                    "400520": ["斯威士兰", "Swaziland"],
                    "400530": ["莱索托", "Lesotho"],
                    "400540": ["马达加斯加", "Madagascar"],
                    "400550": ["科摩罗", "Comorin"],
                    "400560": ["毛里求斯", "Mauritius"],
                    "400570": ["留尼旺", "Reunion"],
                    "400580": ["圣赫勒拿", "Saint Helena"],
                    "400590": ["尼日利亚", "Federal Republic of Nigeria"],
                    "000": ["全部", "All"]
                },
                "relations": {
                    "350": ["410", "350020", "350030", "350040", "350050", "350060", "350070", "350080", "350090", "350100", "350110", "350120", "350130", "350140", "350150", "350160", "350170", "350180", "350190", "350200", "350210", "350220", "350230", "350240", "350250", "350260", "350270", "350280", "350290", "350300", "350310", "350320", "350330", "350340", "350350", "350360", "350370", "350380", "350390", "350400", "350410", "350420", "350430", "350440", "350450", "350460", "350470", "350480"],
                    "360": ["360020", "360030", "360040", "360050", "360060", "360070", "360080", "360090", "360100", "360110", "360120", "360130", "360140", "360150", "360160", "360170", "360180", "360190", "360200", "360210", "360220", "360230", "360240", "360250", "360260", "360270", "360280", "360290", "360300", "360310", "360320", "360330", "360340", "360350", "360360", "360370"],
                    "370": ["370020", "370030", "370040", "370050", "370060", "370070", "370080", "370090", "370100", "370110", "370120", "370130", "370140"],
                    "380": ["380020", "380030", "380040", "380050", "380060", "380080", "380090", "380100", "380110", "380120", "380130", "380140", "380150", "380160", "380170", "380190", "380200", "380210", "380220", "380230", "380240", "380250", "380070", "380180"],
                    "390": ["390020", "390030", "390040", "390050", "390060", "390070", "390080", "390090", "390100", "390110", "390120", "390130", "390140", "390150", "390160", "390450", "390170", "390180", "390190", "390200", "390210", "390220", "390230", "390240", "390250", "390260", "390270", "390280", "390290", "390300", "390310", "390320", "390330", "390340", "390350", "390360", "390370", "390380", "390390", "390400", "390410", "390420", "390430", "390440"],
                    "400": ["400020", "400030", "400040", "400050", "400060", "400070", "400080", "400090", "400100", "400110", "400120", "400130", "400140", "400150", "400160", "400170", "400180", "400190", "400200", "400210", "400220", "400230", "400240", "400250", "400260", "400270", "400280", "400290", "400300", "400310", "400320", "400330", "400340", "400350", "400360", "400370", "400380", "400390", "400400", "400410", "400420", "400430", "400440", "400450", "400460", "400470", "400480", "400490", "400500", "400510", "400520", "400530", "400540", "400550", "400560", "400570", "400580", "400590"]
                },
                "category": {
                    "continents": ["350", "360", "370", "380", "390", "400"],
                    "hotcountries": ["360030", "390220", "380020", "360020", "380030", "390120", "390130", "390110", "390180", "390270", "350050", "350040", "350140", "350120", "390040", "390030", "390020", "390230", "390240", "390060", "390380", "390420", "390200"]
                }
            }
        },
        "t3D4": function(module, exports) {},
        "tnc4": function(module, exports, __webpack_require__) {
            "use strict";
            window.__LocalData = window.__LocalData || {}, window.__LocalData.jobs = {
                "list": {
                    "020": ["销售管理", "Sales Management"],
                    "535": ["销售管理", "Sales Management"],
                    "020125": ["销售总经理/销售副总裁", "Sales General Manager/Vice President"],
                    "020010": ["销售总监", "Sales Director"],
                    "020020": ["销售经理/主管", "Sales Manager/Supervisor"],
                    "020005": ["区域销售总监", "Regional Sales Director"],
                    "020025": ["区域销售经理/主管", "Regional Sales Manager/Supervisor"],
                    "020040": ["渠道/分销总监", "Channel/Distribution Director"],
                    "020050": ["渠道/分销经理/主管", "Channel/Distribution Manager/Supervisor"],
                    "020127": ["客户总监", "Account Director"],
                    "020122": ["客户经理/主管", "Sales Account Manager/Supervisor"],
                    "020121": ["大客户销售管理", "Key Account Sales Management"],
                    "020120": ["业务拓展经理/主管", "Business Development Supervisor/Manager"],
                    "020126": ["团购经理/主管", "Team Buying Manager/Supervisor"],
                    "020160": ["其他", "Others"],
                    "370": ["销售人员", "Salespersons"],
                    "536": ["销售人员", "Salespersons"],
                    "370001": ["销售代表", "Sales Representative"],
                    "370012": ["区域销售专员/助理", "Regional Sales Specialist/Assistant"],
                    "370002": ["渠道/分销专员", "Channel/Distribution Representative"],
                    "370003": ["客户代表", "Sales Account Representative"],
                    "370007": ["大客户销售", "Key Account Sales"],
                    "370013": ["业务拓展专员/助理", "BD Specialist/Assistant"],
                    "370005": ["电话销售", "Telesales"],
                    "370004": ["销售工程师", "Sales Engineer"],
                    "370008": ["医药销售代表", "Pharmaceutical Sales Representative"],
                    "370010": ["团购业务员", "Team Buying Sales"],
                    "370011": ["网络/在线销售", "Online Sales"],
                    "370006": ["经销商", "Distributor"],
                    "370009": ["其他", "Others"],
                    "380": ["销售行政/商务", "Sales Administration"],
                    "537": ["销售行政/商务", "Sales Administration"],
                    "380001": ["销售行政经理/主管", "Sales Admin. Manager/Supervisor"],
                    "380002": ["销售行政专员/助理", "Sales Admin. Executive/Assistant"],
                    "380004": ["销售运营经理/主管", "Sales Operations Manager/Supervisor"],
                    "380005": ["销售运营专员/助理", "Sales Operations Executive/Assistant"],
                    "380008": ["业务分析经理/主管", "Business Analysis Manager/Supervisor"],
                    "380009": ["业务分析专员/助理", "Business Analysis Specialist/Assistant"],
                    "020100": ["商务经理/主管", "Business Manager/Supervisor"],
                    "380003": ["商务专员/助理", "Business Executive/Assistant"],
                    "380007": ["销售培训讲师", "Sales trainer"],
                    "380010": ["其他", "Others"],
                    "030": ["客户服务/技术支持", "Customer Service and Technical Support"],
                    "538": ["客户服务/技术支持", "Customer Service and Technical Support"],
                    "030010": ["客户服务总监", "Director of Customer Service"],
                    "030085": ["客户服务经理/主管", "Customer Service Manager/Specialist"],
                    "030081": ["客户服务专员/助理", "Customer Service Specialist/Assistant"],
                    "030082": ["咨询热线/呼叫中心人员", "Hotline/Call Center Staff"],
                    "030083": ["投诉处理专员", "Complaint Coordinator"],
                    "030084": ["会员/VIP管理", "VIP Member Management"],
                    "360130": ["网店店长/客服管理", "Online Shop Manager/Customer Service Management"],
                    "030086": ["网络/在线客服", "Online Customer Service"],
                    "020070": ["售前支持经理/主管", "Pre-Sales Support Manager/Supervisor"],
                    "020080": ["售前支持工程师", "Pre-Sales Support Engineer"],
                    "030060": ["售后支持经理/主管", "After-Sales Support Manager/Supervisor"],
                    "030070": ["售后支持工程师", "Sales Support Engineer"],
                    "030080": ["其他", "Others"],
                    "350": ["软件/互联网开发/系统集成", "Software Development/System Integration"],
                    "100100": ["高级软件工程师", "Senior Software Engineer"],
                    "100090": ["软件工程师", "Software Engineer"],
                    "360321": ["架构师", "Architect"],
                    "100080": ["系统分析师", "System Analyst"],
                    "350040": ["需求分析师", "Demand Analyst"],
                    "360310": ["移动开发工程师", "Mobile Development Engineer"],
                    "360333": ["数据库开发工程师", "Database Developer"],
                    "350030": ["ERP技术开发", "ERP R&D"],
                    "100290": ["多媒体/游戏开发工程师", "Multimedia/Game Development Engineer"],
                    "100280": ["语音/视频/图形开发工程师", "Audio/Video/Graphics Development Engineer"],
                    "110070": ["嵌入式软件开发", "Embedded Software Engineer"],
                    "360300": ["WEB前端开发工程师", "WEB Front-end Developer"],
                    "360335": ["移动前端开发工程师", "Mobile Front-end Developer"],
                    "360320": ["BI工程师", "Business Intelligence Engineer"],
                    "360332": ["数据分析师", "Data Analyst"],
                    "360336": ["数据挖掘工程师", "Data Mining Engineer"],
                    "360334": ["算法工程师", "Algorithm Engineer"],
                    "100140": ["系统集成工程师", "Systems Integration Engineer"],
                    "100350": ["计算机辅助设计工程师", "Computer Aided Design Engineer"],
                    "350020": ["仿真应用工程师", "Simulation Application Engineer"],
                    "350070": ["其他", "Others"],
                    "390": ["硬件开发", "Hardware Development"],
                    "100130": ["高级硬件工程师", "Senior Hardware Engineer"],
                    "100150": ["硬件工程师", "Hardware Engineer"],
                    "110065": ["嵌入式硬件开发(主板机…)", "Embedded Hardware Engineer(PCB…)"],
                    "390002": ["其他", "Others"],
                    "360": ["产品/运营/设计", "Product/Operation/Design"],
                    "360040": ["产品总监", "Product Director"],
                    "100071": ["产品经理/主管", "Product Manager/Supervisor"],
                    "360050": ["产品专员/助理", "Product Specialist/Assistant"],
                    "360010": ["运营总监", "Operations Director"],
                    "360020": ["运营经理/主管", "Operations Manager/Supervisor"],
                    "360030": ["运营专员", "Operations Specialist"],
                    "100300": ["网站营运管理", "Web Operations Management"],
                    "100320": ["网站策划", "Site Planning"],
                    "100310": ["网站编辑", "Website Editor"],
                    "360070": ["网络推广总监", "Online Marketing Director"],
                    "360080": ["网络推广经理/主管", "Online Marketing Manager/Supervisor"],
                    "360090": ["网络推广专员", "Online Marketing Specialist"],
                    "360060": ["SEO搜索引擎优化", "SEO"],
                    "060210": ["SEM搜索引擎营销", "SEM"],
                    "360100": ["电子商务总监", "E-Commerce Director"],
                    "360110": ["电子商务经理/主管", "E-Commerce Manager/Supervisor"],
                    "360120": ["电子商务专员", "E-Commerce Specialist"],
                    "360180": ["游戏策划师", "Game Planner"],
                    "360270": ["用户研究总监/经理", "User Research Director/Manager"],
                    "360280": ["用户研究员", "User Researcher"],
                    "100340": ["网页设计/制作/美工", "Web Designer/Production/Creative"],
                    "360290": ["视觉设计总监/经理", "Visual Design Director/Manager"],
                    "360220": ["视觉设计师", "Visual Effects Designer"],
                    "350010": ["UI设计师", "UI Designer"],
                    "360260": ["交互设计总监/经理", "Interaction Design Director/Manager"],
                    "360150": ["UE交互设计师", "UE Interaction Designer"],
                    "360240": ["三维/3D设计/制作", "Three-dimensional/3D Design/Production"],
                    "360190": ["游戏界面设计师", "Game UI Designer"],
                    "360200": ["Flash设计/开发", "Flash Designer/Developer"],
                    "360210": ["特效设计师", "Special Effects Designer"],
                    "360230": ["音效设计师", "Sound Effects Designer"],
                    "360250": ["其他", "Others"],
                    "100": ["IT质量管理/测试/配置管理", "IT QA/Testing/Configuration Management"],
                    "360322": ["测试经理/主管", "Testing Manager/Supervisor"],
                    "360323": ["测试工程师", "Testing Engineer"],
                    "360327": ["测试开发", "Test Development Engineer"],
                    "360324": ["自动化测试", "Automation Testing Engineer"],
                    "360325": ["功能测试", "Functional Testing Engineer"],
                    "360326": ["性能测试", "Performance Testing Engineer"],
                    "360340": ["软件测试", "Software Testing"],
                    "100250": ["硬件测试", "Hardware Testing"],
                    "100235": ["计量/标准化工程师", "Measure/Standardization Engineer"],
                    "360338": ["配置管理经理/主管", "Configuration Management Manager/Supervisor"],
                    "360337": ["配置管理工程师", "Configuration Management Engineer"],
                    "100360": ["其他", "Others"],
                    "110": ["电信/通信技术开发及应用", "Telecommunication/Communication Techonlogy and Application"],
                    "110030": ["电信/通讯工程师", "Telecommunications/Communications Engineer"],
                    "110210": ["通信技术工程师", "Communication Engineer"],
                    "110240": ["数据通信工程师", "Data Communication Engineer"],
                    "110250": ["移动通信工程师", "Mobile Communication Engineer"],
                    "110260": ["电信网络工程师", "Telecommunication Network Engineer"],
                    "110230": ["电信交换工程师", "Telecommunication Exchange Engineer"],
                    "110220": ["有线传输工程师", "Wired Transmission Engineer"],
                    "110080": ["无线/射频通信工程师", "RF/ Communication Engineer"],
                    "110270": ["通信电源工程师", "Communication Power Supply Engineer"],
                    "110280": ["增值产品开发工程师", "Value-Added Product Development Engineer"],
                    "110300": ["通信标准化工程师", "Communication Standardization Engineer"],
                    "110290": ["通信项目管理", "Communication Project Management"],
                    "110200": ["其他", "Others"],
                    "400": ["电子/电器/半导体/仪器/仪表", "Electronics/Wiring/Semiconductor/Instrument/Industry"],
                    "110020": ["电子/电器工程师", "Electronic/Electrical Equipment Engineer"],
                    "110180": ["电子技术研发工程师", "Electronics Development Engineer"],
                    "110170": ["电气工程师", "Electrical Engineer"],
                    "110400": ["电气线路设计", "Electrical Circuit Design"],
                    "110401": ["线路结构设计", "Route structure design"],
                    "110010": ["电路工程师/技术员", "Electronic Circuit Engineer"],
                    "110040": ["工艺/制程工程师(PE)", "PE Engineer"],
                    "110404": ["模拟电路设计/应用工程师", "Analogical Electronic Design / Application Engineer"],
                    "110130": ["集成电路IC设计/应用工程师", "IC Design/Application Engineer"],
                    "110330": ["版图设计工程师", "Engineer Layout Design Engineer"],
                    "110380": ["IC验证工程师", "IC Verification Engineer"],
                    "110403": ["自动化工程师", "Automation Engineer"],
                    "110350": ["自动控制工程师/技术员", "Autocontrol Engineer/Technician"],
                    "110060": ["家用电器/数码产品研发", "Household Electronics/Digital Products Development"],
                    "110405": ["空调工程/设计", "Air Conditioning Engineering/Design"],
                    "110050": ["电声/音响工程师/技术员", "Electroacoustics Engineer"],
                    "110360": ["电池/电源开发", "Battery/Power Engineer"],
                    "110090": ["半导体技术", "Semiconductor Technology"],
                    "110100": ["电子元器件工程师", "Electronic Component Engineer"],
                    "110310": ["射频工程师", "RF Engineer"],
                    "110320": ["变压器与磁电工程师", "Transformer and Magnetoelectricity"],
                    "110340": ["激光/光电子技术", "Laser/Optoelectronics Technology"],
                    "110402": ["机电工程师", "Electrical & Mechanical Engineer"],
                    "110407": ["安防系统工程师", "Security Systems Engineer"],
                    "110120": ["光源与照明工程师", "Light Source and Lighting Engineer"],
                    "110406": ["仪器/仪表/计量", "Instrument/Measurement Analyst"],
                    "110370": ["FAE现场应用工程师", "Field Application Engineer(FAE)"],
                    "110110": ["电子/电器维修", "Electronics/Electronics Repair"],
                    "110190": ["工程与项目实施", "Engineering and Project Implementation"],
                    "110140": ["技术文档工程师", "Technical Documentation Engineer"],
                    "110408": ["其他", "Others"],
                    "140": ["基金/证券/期货/投资", "Fund/Security/Futures/Investments"],
                    "140010": ["证券/外汇/期货经纪人", "Securities/Foreign Exchange/Futures/Brokerage"],
                    "140143": ["证券交易员", "Securities Trader"],
                    "140144": ["投资/理财顾问", "Investment/Financial Management Advisor"],
                    "140146": ["基金管理", "Fund Management"],
                    "140152": ["证券投资", "Securities Investment/Portfolio Investment"],
                    "140153": ["机构客户服务", "Institutional Investor Service"],
                    "140149": ["零售客户服务", "Retail Banking"],
                    "140040": ["投资银行业务", "Investment Banking"],
                    "140141": ["融资总监", "Treasury Director"],
                    "140050": ["融资经理/主管", "Treasury Manager/Supervisor"],
                    "140142": ["融资专员/助理", "Treasury Executive/Assistant"],
                    "140151": ["经纪业务", "Brokerage"],
                    "140148": ["固定收益业务", "Fixed Income"],
                    "140154": ["资产管理", "Asset Management"],
                    "140070": ["资产评估", "Asset Evaluation"],
                    "140160": ["PE/VC投资", "Private Equity/Venture Capital"],
                    "140080": ["风险管理/控制", "Risk Management/Control"],
                    "140150": ["合规稽查", "Compliance And Audit"],
                    "140145": ["金融产品经理", "Financial Product Manager"],
                    "140147": ["行业研究", "Industry Research"],
                    "140030": ["证券分析/金融研究", "Security Analysis/Financial Research"],
                    "140140": ["其他", "Others"],
                    "410": ["银行", "Banking"],
                    "140020": ["行长/副行长", "President/Vice-President/Branch Manager"],
                    "410022": ["客户总监", "Account Director"],
                    "140060": ["客户经理/主管", "Account Manager/Supervisor"],
                    "410002": ["客户代表", "Account Representative"],
                    "410007": ["综合业务经理/主管", "Integrated Service Manager/Supervisor"],
                    "410008": ["综合业务专员/助理", "Integrated Service Executive/Assistant"],
                    "410003": ["公司业务部门经理/主管", "Corporate Banking Manager"],
                    "410004": ["公司业务客户经理", "Corporate Banking Account Manager"],
                    "410005": ["个人业务部门经理/主管", "Personal Banking Manager/Supervisor"],
                    "410006": ["个人业务客户经理", "Personal Banking Account Manager"],
                    "410001": ["银行经理/主任", "Bank Manager/Supervisor"],
                    "410009": ["大堂经理", "Hall Manager"],
                    "140110": ["柜员/银行会计", "Bank Teller/Bank Accountan"],
                    "410020": ["信用卡中心", "Credit Card Center"],
                    "140120": ["银行卡/电子银行/新业务开拓", "Bank card/Electronic Banking/New Business"],
                    "140130": ["国际结算/外汇交易", "International Account Settlement/Foreign Exchange"],
                    "410010": ["进出口/信用证结算", "Trading / LC Officer"],
                    "140090": ["信贷管理/资信评估/分析", "Loan/Credit Officer、Assets/Credit Valuation/Analyst"],
                    "410011": ["风险控制", "Risk Management"],
                    "410012": ["信审核查", "Credit Review"],
                    "140100": ["清算人员", "Settlement Officer"],
                    "410014": ["资金管理", "Fund Management"],
                    "410016": ["资产管理", "Asset Management"],
                    "410017": ["金融同业", "Interbank"],
                    "410015": ["行业研究", "Industry Research"],
                    "410019": ["基金托管", "Trust Fund"],
                    "410013": ["其他", "Others"],
                    "090": ["财务/审计/税务", "Accounting/Auditing/Taxation"],
                    "010040": ["首席财务官CFO", "Chief Financial Officer/CFO"],
                    "090020": ["财务总监", "Chief Financial Officer"],
                    "090030": ["财务经理", "Financial Manager"],
                    "090040": ["财务主管/总帐主管", "Financial Director/General Accounts Director"],
                    "090200": ["财务顾问", "Finance Consultant"],
                    "090140": ["财务助理", "Finance Assistant"],
                    "090050": ["会计经理/主管", "Accounting Manager/Supervisor"],
                    "090060": ["会计/会计师", "Accountant"],
                    "090201": ["会计助理/文员", "Accounting Clerk"],
                    "090202": ["出纳员", "Cashier"],
                    "090120": ["审计经理/主管", "Audit Manager/Supervisor"],
                    "090130": ["审计专员/助理", "Audit Executive/Assistant"],
                    "090160": ["税务经理/主管", "Tax Manager/Supervisor"],
                    "090170": ["税务专员/助理", "Tax Executive/Assistant"],
                    "090080": ["财务分析经理/主管", "Financial Analysis Manager/Supervisor"],
                    "090090": ["财务分析员", "Financial Analyst"],
                    "090100": ["成本经理/主管", "Cost Accounting Manager/Supervisor"],
                    "090110": ["成本管理员", "Capital Manager"],
                    "090180": ["投融资经理/主管", "Investment and Finance Manager/Supervisor"],
                    "090203": ["资产/资金管理", "Treasury Manager/Supervisor"],
                    "090150": ["统计员", "Statistician"],
                    "090190": ["其他", "Others"],
                    "150": ["保险", "Insurance"],
                    "150040": ["保险代理人/经纪人/客户经理", "Insurance Agent/Broker/Account Manager"],
                    "150100": ["保险顾问/财务规划师", " Insurance Consultant"],
                    "150080": ["业务经理/主管", "Business Manager/Supervisor"],
                    "150050": ["客户服务/续期管理", "Customer Service/Account Renewals Management"],
                    "150010": ["稽核/法律/合规", "Compliance/Audit"],
                    "150020": ["核保/理赔", "Underwriting/Claim Management"],
                    "150130": ["契约管理", "Policy Management"],
                    "150070": ["保险精算师", "Actuary"],
                    "150090": ["产品开发/项目策划", "Product Development/Planner"],
                    "150030": ["保险培训师", "Insurance Trainer"],
                    "150131": ["再保险", "Reinsurance"],
                    "150132": ["行业研究", "Industry Research"],
                    "150110": ["保险内勤", "Staff"],
                    "150120": ["储备经理人", "Agency Management Associate"],
                    "150060": ["其他", "Others"],
                    "420": ["汽车制造", "Automobile Manufacture"],
                    "420003": ["汽车设计工程师", "Automotive Design Engineer"],
                    "420002": ["汽车机构工程师", "Automotive Structural Engineer"],
                    "420010": ["汽车动力系统工程师", "Automobile Power System Engineers"],
                    "420008": ["汽车底盘/总装工程师", "Automobile Chassis/Assembly Engineer"],
                    "420004": ["汽车电子工程师", "Automotive Electronic Engineer"],
                    "420007": ["汽车装配工艺工程师", "Assembly Engineer"],
                    "420005": ["汽车质量工程师", "Automotive Quality Engineer"],
                    "420006": ["汽车安全性能工程师", "Safety Performance Engineer"],
                    "420001": ["汽车项目管理", "Automotive Project Management"],
                    "420009": ["其他", "Others"],
                    "430": ["汽车销售与服务", "Automotive Sales and Service"],
                    "430003": ["4S店管理", "4S Shop Management"],
                    "430001": ["汽车销售", "Automobile Sales"],
                    "430004": ["零配件销售", "Parts Sales"],
                    "430002": ["售后服务客户服务", "After-Sales Service/Customer Service"],
                    "430006": ["汽车质量管理", "Automotive Quality Management"],
                    "430007": ["检验检测", "Check/Test"],
                    "430008": ["二手车评估师", "Second-Hand Car Appraisers"],
                    "430011": ["汽车定损/车险理赔", "Automobile Insurance"],
                    "430009": ["其他", "Others"],
                    "220": ["机械设计/制造/维修", "Mechanical Design/Production/Maintenance"],
                    "220010": ["机械工程师", "Mechanical Engineer"],
                    "220030": ["机械设计师", "Mechanical Designer"],
                    "220040": ["机械制图员", "Mechanical Draftsman"],
                    "220240": ["机械结构工程师", "Mechanical Structural Engineer"],
                    "220282": ["工艺/制程工程师(PE)", "PE Engineer"],
                    "220230": ["工业工程师(IE)", "IE Engineer"],
                    "220090": ["CNC工程师", "CNC Engineer"],
                    "220100": ["冲压工程师/技师", "Punch Engineer"],
                    "220110": ["夹具工程师/技师", "Clamp Engineer"],
                    "220020": ["模具工程师", "Mold Engineer"],
                    "220130": ["焊接工程师/技师", "Welding Engineer"],
                    "220080": ["注塑工程师/技师", "Injection Engineer"],
                    "220070": ["铸造/锻造工程师/技师", "Casting/Forging Engineer"],
                    "220120": ["锅炉工程师/技师", "Boiler Engineer"],
                    "220281": ["气动工程师", "Pneumatic Engineer"],
                    "220270": ["轨道交通工程师/技师", "Railway Engineer/Technician"],
                    "220160": ["飞机设计与制造", "Aircraft Design & Manufacture"],
                    "220250": ["飞机维修/保养", "Aircraft Repair/Maintenance"],
                    "220140": ["列车设计与制造", "Train Design & Manufacture"],
                    "220284": ["列车维修/保养", "Train Repair/Maintenance"],
                    "220150": ["船舶设计与制造", "Watercraft Design & Manufacture"],
                    "220283": ["船舶维修/保养", "Watercraft Repair/Maintenance"],
                    "220190": ["食品机械", "Food Machinery"],
                    "220200": ["纺织机械", "Textile Machinery"],
                    "220060": ["精密机械", "Precision Machinery"],
                    "220280": ["材料工程师", "Material Engineer"],
                    "120130": ["制冷/暖通", "HVAC/Refrigeration"],
                    "220050": ["机电工程师", "Electrical and Mechanical Engineers"],
                    "220005": ["机械设备经理", "Mechanical Equipment Manager"],
                    "220285": ["机械设备工程师", "Mechanical Equipment Engineer"],
                    "220260": ["维修经理/主管", "Maintenance Manager/Supervisor"],
                    "220170": ["维修工程师", "Maintenance Engineer"],
                    "220210": ["设备修理", "Equipment Repair"],
                    "220220": ["其他", "Others"],
                    "210": ["生产/营运", "Manufacturing/Operation"],
                    "210210": ["工厂经理/厂长", "Plant/Factory Manager"],
                    "210020": ["总工程师/副总工程师", "Chief Engineer/Deputy Chief Engineer"],
                    "210240": ["生产总监", "Production Director"],
                    "210140": ["生产经理/车间主任", "Production Manager/Workshop Supervisor"],
                    "210150": ["组长/拉长", "Group Leader"],
                    "210260": ["生产文员", "Production Clerk"],
                    "210220": ["生产项目总监", "Production Project Director"],
                    "210230": ["生产项目经理/主管", "Production Project Manager/Supervisor"],
                    "210030": ["生产项目工程师", "Production Project Engineer"],
                    "210090": ["技术或工艺设计经理", "Technology or Process Design Manager"],
                    "210170": ["工艺/制程工程师(PE)", "PE Engineer"],
                    "210180": ["工业工程师(IE)", "Industrial Engineer"],
                    "210190": ["制造工程师", "Manufacturing Engineer"],
                    "210080": ["产品管理", "Product Management"],
                    "210040": ["采购管理", "Purchasing Management"],
                    "160210": ["供应链总监", "Supply Chain Director"],
                    "160095": ["供应链经理/主管", "Supply Chain Executive/Manager/Director"],
                    "160220": ["供应链专员/助理", "Supply Chain Specialist/Assistant"],
                    "210015": ["运营经理/主管", "Operations Manager/Supervisor"],
                    "210160": ["生产计划/调度", "Production Planning/Scheduling"],
                    "210050": ["生产物料管理(PMC)", "Production Material Control(PMC)"],
                    "210060": ["生产设备管理", "Production Equipment Management"],
                    "210270": ["维修经理/主管", "Maintenance Manager/Supervisor"],
                    "210130": ["维修工程师", "Maintenance Engineer"],
                    "210110": ["生产质量管理", "Production Quality Management"],
                    "210070": ["安全/健康/环境管理", "Safety/Health/Environmental Management"],
                    "210250": ["包装工程师", "Packaging Engineer"],
                    "210200": ["其他", "Others"],
                    "050": ["质量管理/安全防护", "Quality Control/Safety Protection"],
                    "050010": ["质量管理/测试经理(QA/QC经理)", "QA/QC Manager"],
                    "050020": ["质量管理/测试主管(QA/QC主管)", "QA/QC Supervisor"],
                    "050030": ["质量检测员/测试员", "Quality Inspector/Tester"],
                    "050070": ["认证工程师/审核员", "Certification Engineer/Auditor"],
                    "050080": ["体系工程师/审核员", "Systems Engineer/Auditor"],
                    "050060": ["环境/健康/安全(EHS)经理/主管", "EHS Manager/Supervisor"],
                    "050110": ["环境/健康/安全(EHS)工程师", "EHS Engineer"],
                    "050090": ["可靠度工程师", "Reliability Engineer"],
                    "050100": ["故障分析工程师", "Failure Analysis Engineer"],
                    "340020": ["安全防护/安全管理", "Safety Protection"],
                    "050040": ["供应商/采购质量管理", "Supplier/Purchasing Quality Management"],
                    "050050": ["其他", "Others"],
                    "440": ["服装/纺织/皮革", "Apparels/Textiles/Leather Goods"],
                    "440001": ["服装/纺织设计总监", "Fashion/Textiles Design Director"],
                    "240040": ["服装/纺织设计", "Fashion/Textiles Designer"],
                    "440006": ["服装/纺织/皮革工艺师", "Apparels/Textiles/Leather Goods Technologist"],
                    "240050": ["服装打样/制版", "Sample Production"],
                    "440009": ["质量管理/验货员(QA/QC)", "Quality Management QA/QC"],
                    "440003": ["面料辅料开发", "Fabric/Accessories Development"],
                    "440004": ["面料辅料采购", "Fabric/Accessories Purchasing"],
                    "440005": ["服装/纺织/皮革跟单", "Apparels/Textiles/Leather Goods Merchandiser"],
                    "440011": ["其他", "Others"],
                    "160": ["物流/仓储", "Logistics/Warehouse"],
                    "160190": ["物流总监", "Logistics Director"],
                    "160090": ["物流经理/主管", "Logistics manager/Supervisor"],
                    "160200": ["物流专员/助理", "Logistics Specialist/Assistant"],
                    "160140": ["货运代理", "Freight Forwarder"],
                    "160130": ["运输经理/主管", "Transport Management/Executive"],
                    "160050": ["水运/空运/陆运操作", "Transport Operation"],
                    "160110": ["物料经理/主管", "Materials Manager/Supervisor"],
                    "160230": ["物料专员/助理", "Materials Specialist/Assistant"],
                    "160250": ["海关事务管理", "Customs Affairs Management"],
                    "160040": ["报关员", "Document Management/Customs Agent"],
                    "160260": ["单证员", "Documentation Specialist"],
                    "160120": ["仓库经理/主管", "Warehouse Manager/Supervisor"],
                    "160160": ["物流/仓储调度", "Logistics/Warehousing Dispatcher"],
                    "160240": ["集装箱业务", "Container Operator"],
                    "160270": ["物流/仓储项目管理", "Logistics/Warehousing Project Management"],
                    "160180": ["其他", "Others"],
                    "450": ["采购/贸易", "Purchasing/Trade"],
                    "160010": ["外贸经理/主管", "Trading Manager/Supervisor"],
                    "450005": ["外贸专员/助理", "Trading Specialist/Assistant"],
                    "160020": ["国内贸易经理/主管", "Domestic Trade manager/Supervisor"],
                    "450006": ["国内贸易专员/助理", "Domestic Trade Specialist/Assistant"],
                    "450001": ["采购总监", "Purchasing Director"],
                    "160070": ["采购经理/主管", "Purchasing Executive/Manager/Director"],
                    "450002": ["采购专员/助理", "Purchasing Specialist/Assistant"],
                    "450003": ["买手", "Buyer"],
                    "450004": ["供应商开发", "Supplier Development"],
                    "160021": ["商务经理/主管", "Business Manager/Supervisor"],
                    "450007": ["商务专员/助理", "Business Specialist/Assistant"],
                    "450008": ["业务跟单经理/主管", "Merchandising Manager/Supervisor"],
                    "450009": ["业务跟单员", "Merchandiser"],
                    "450010": ["其他", "Others"],
                    "060": ["市场", "Marketing"],
                    "060010": ["市场总监", "Marketing Director"],
                    "060020": ["市场经理/主管", "Marketing Manager/Supervisor"],
                    "060200": ["市场专员/助理", "Marketing Specialist/Assistant"],
                    "060130": ["市场企划经理/主管", "Marketing Planning Manager/Supervisor"],
                    "060207": ["市场企划专员/助理", "Marketing Planning Specialist/Assistant"],
                    "060201": ["市场拓展经理/主管", "BD manager/Supervisor"],
                    "060202": ["市场拓展专员/助理", "BD Specialist/Assistant"],
                    "060205": ["市场通路经理/主管", "Trade Marketing Manager/Supervisor"],
                    "060206": ["市场通路专员/助理", "Trade Marketing Specialist/Assistant"],
                    "060090": ["产品经理/主管", "Product Manager/Supervisor"],
                    "060204": ["产品专员/助理", "Product Specialist/Assistant"],
                    "060203": ["品牌经理/主管", "Brand Manager/Supervisor"],
                    "060209": ["品牌专员/助理", "Brand Specialist/Assistant"],
                    "060110": ["促销经理/主管", "Promotion Manager/ Supervisor"],
                    "460005": ["活动策划", "Event Planner"],
                    "460006": ["活动执行", "Event Excution"],
                    "060060": ["市场调研与分析", "Market Research and Analysis"],
                    "060208": ["选址拓展/新店开发", "Site Development"],
                    "060190": ["其他", "Others"],
                    "460": ["公关/媒介", "Public Relations/Media"],
                    "460001": ["公关总监", "Public Relations Director"],
                    "060040": ["公关经理/主管", "Public Relations Manager/Supervisor"],
                    "460002": ["公关专员/助理", "Public Relations Specialist/Assistant"],
                    "290100": ["政府事务管理", "Government Affairs"],
                    "460003": ["媒介经理/主管", "Media Manager/Supervisor"],
                    "460004": ["媒介专员/助理", "Media Specialist/Assistant"],
                    "460009": ["媒介策划", "Media Planning"],
                    "460007": ["媒介销售", "Media Sales"],
                    "460008": ["其他", "Others"],
                    "470": ["广告/会展", "Advertising/Exhibition"],
                    "470003": ["广告创意/设计总监", "Advertising Creative Director"],
                    "060150": ["广告创意/设计经理/主管", "Advertising Creative Manager/Supervisor"],
                    "470004": ["广告创意/设计师", "Advertising Designer"],
                    "470005": ["文案/策划", "Copywriter/Planner"],
                    "470008": ["美术指导", "Art Director"],
                    "470012": ["制作执行", "Event executive"],
                    "470014": ["广告/会展项目管理", "Advertising/Exhibition Project Management"],
                    "470001": ["广告客户总监", "Advertising Account Director"],
                    "060170": ["广告客户经理/主管", "Advertising Account Manager/Supervisor"],
                    "470002": ["广告客户专员", "Advertising Account Executive"],
                    "470006": ["广告/会展业务拓展", "Advertising/Exhibition BD"],
                    "060070": ["会务/会展经理/主管", "Exhibition/Event Manager/Supervisor"],
                    "470009": ["会务/会展专员/助理", " Exhibition Specialist/Assistant"],
                    "470010": ["会展策划/设计", "Exhibition Planning /Design"],
                    "470013": ["其他", "Others"],
                    "250": ["写作/采编/出版/印刷", "Writing/Newspaper/Publishing/Printing"],
                    "250020": ["总编/副总编", "General Editor/Deputy Editor"],
                    "250250": ["记者/采编", "Reporter"],
                    "250190": ["电话采编", "Telephone Reporter"],
                    "250030": ["文字编辑/组稿", "Copy Editor"],
                    "250040": ["美术编辑", "Art Editor"],
                    "250070": ["校对/录入", "Proofreading/Copy Entry"],
                    "250010": ["作家/编剧/撰稿人", "Writer/Screenwriter"],
                    "250080": ["排版设计", "Layout Design"],
                    "250050": ["发行管理", "Distribution Management"],
                    "250210": ["印刷排版/制版", "Layout Designer"],
                    "250200": ["电分操作员", "Operator-Colour Distinguishing"],
                    "250230": ["调墨技师", "Ink Technician"],
                    "250220": ["数码直印/菲林输出", "Digital/Film Printing"],
                    "250240": ["印刷机械机长", "Printing Machine Operator"],
                    "220180": ["包装/印刷", "Packaging/Printing"],
                    "250180": ["其他", "Others"],
                    "480": ["影视/媒体", "Film Entertainment/Media"],
                    "250100": ["影视策划/制作/发行", "Film Planning/Production/Distribution"],
                    "250110": ["导演/编导", "Director/Choreographer"],
                    "250090": ["艺术/设计总监", "Artistic/Design Director"],
                    "250120": ["摄影/摄像", "Photographer/Videographer"],
                    "250130": ["录音/音效师", "Recording/Audio Engineer"],
                    "250160": ["主持人/播音员", "Host/Broadcaster"],
                    "480001": ["后期制作", "Postproduction"],
                    "480002": ["放映管理", "Projection Management"],
                    "480003": ["其他", "Others"],
                    "240": ["艺术/设计", "Art/Design"],
                    "240151": ["创意指导/总监", "Creative Director/Director"],
                    "240153": ["平面设计总监/经理", "Graphic Design Director/Manager"],
                    "240010": ["平面设计经理/主管", "Graphic Design Manager/Supervisor"],
                    "240080": ["平面设计师", "Graphic Designer"],
                    "240020": ["美术/图形设计", "Art/Graphic Design"],
                    "240152": ["绘画", "Graphic Illustrator"],
                    "240157": ["原画师", "Original Artist"],
                    "240120": ["3D设计/制作", "3D Design/Production"],
                    "240110": ["多媒体/动画设计", "Multimedia/Animation Design"],
                    "240156": ["CAD设计/制图", "CAD design/drafting"],
                    "240090": ["媒体广告设计", "Media Advertising"],
                    "240030": ["工业/产品设计", "Industrial/Product Design"],
                    "240060": ["工艺品/珠宝设计", "Crafts/Jewelry Design"],
                    "240070": ["家具/家居设计", "Furniture/Household Product Design"],
                    "240155": ["玩具设计", "Toy Design"],
                    "240130": ["展示/陈列设计", "Exhibition/Display Design"],
                    "240125": ["包装设计", "Packaging Design"],
                    "240150": ["其他", "Others"],
                    "290": ["生物/制药/医疗器械", "Biotechnology/Pharmaceuticals/Medical Equipment"],
                    "280070": ["医药技术研发管理人员", "Pharmaceutical Technology R&D Management"],
                    "290010": ["生物工程/生物制药", "Biopharmaceutical/Biotechnology"],
                    "290030": ["药品研发", "Medicine R&D"],
                    "290040": ["药品生产/质量管理", "Drug Manufacturing/Quality Management"],
                    "290094": ["医疗器械研发", "Medical Equipment R&D"],
                    "290097": ["医疗器械生产/质量管理", "Medical Equipment Manufacturing/Quality Control"],
                    "290020": ["临床研究员", "Clinical Researcher"],
                    "290090": ["临床数据分析员", "Clinical Data Analyst"],
                    "290096": ["化学分析测试员", "Chemical Analyst"],
                    "280130": ["药品注册", "Drug Registration"],
                    "290095": ["医疗器械注册", "Medical Equipment Registration"],
                    "290093": ["医药销售经理/主管", "Pharmaceutical Sales Manager"],
                    "280150": ["医药代表", "Medical Representative"],
                    "290098": ["医疗器械销售代表", "Medical Equipment Sales"],
                    "290102": ["医药招商经理/主管", "Pharmaceutical Business Development Manager/Supervisor"],
                    "290099": ["医药招商专员/助理", "Pharmaceutical Business Development Specialist/Assistant"],
                    "290091": ["药品市场推广经理/主管", "Pharmaceutical Promotion Manager/Supervisor"],
                    "290092": ["药品市场推广专员/助理", "Pharmaceutical Promotion Specialist/Assistant"],
                    "290055": ["医疗器械市场推广", "Medical Equipment Marketing"],
                    "290101": ["招投标管理", "Tendering Coordinator"],
                    "290080": ["其他", "Others"],
                    "490": ["化工", "Chemical"],
                    "290060": ["化工技术应用/化工工程师", "Chemical Technical Application/Chemical Engineer"],
                    "490001": ["化工实验室研究员/技术员", "Chemical Lab Scientist / Technician"],
                    "490002": ["涂料研发工程师", "R&D Chemist Scientist"],
                    "490003": ["配色技术员", "Color Matcher (Technician)"],
                    "490004": ["塑料工程师", "Plastics Engineer"],
                    "490005": ["化妆品研发", "Cosmetics Scientist"],
                    "490006": ["食品/饮料研发", "Food / Beverage Scientist"],
                    "490007": ["造纸研发", "Paper Making Scientist"],
                    "490008": ["其他", "Others"],
                    "280": ["医院/医疗/护理", "Hospital/Medicine/Nursing"],
                    "280010": ["医院管理人员", "Hospital Management"],
                    "280175": ["综合门诊/全科医生", "General Practitioner (GP)"],
                    "280161": ["内科医生", "Doctor Internal Medicine"],
                    "280166": ["外科医生", "Doctor Surgeial"],
                    "280172": ["儿科医生", "Pediatrician"],
                    "280168": ["牙科医生", "Dentist"],
                    "280167": ["专科医生", "Doctor Specialist"],
                    "280090": ["美容/整形师", "Beautician/Plastic Surgeon"],
                    "280169": ["中医科医生", "Chinese Medicine Practioners"],
                    "280163": ["麻醉医生", "Anesthesiologist"],
                    "280164": ["心理医生", "Psychologist/Psychiatrist"],
                    "280174": ["放射科医师", "Radiologist"],
                    "280173": ["验光师", "Optometrist"],
                    "280110": ["药库主任/药剂师", "Drug Storehouse Director/Pharmacist"],
                    "280020": ["医疗技术人员", "Medical Technicians"],
                    "280030": ["理疗师", "Physical Therapist"],
                    "280120": ["针灸推拿", "Acupuncture and Massage"],
                    "280100": ["兽医/宠物医生", "Veterinarian/Pet Doctor"],
                    "280171": ["护理主任/护士长", "Nursing Officer"],
                    "280162": ["护士/护理人员", "Nurse/Medical Assistant"],
                    "280050": ["医药学检验", "Clinical Laboratory"],
                    "280080": ["疾病控制/公共卫生", "Disease Control/Public Health"],
                    "280165": ["营养师", "Dietitian"],
                    "280160": ["其他", "Others"],
                    "120": ["电力/能源/矿产/地质勘查", "Electricity/Energy/Mining/Geological Survey"],
                    "120060": ["电力工程师/技术员", "Electric Power Engineer"],
                    "120040": ["输电线路工程师", "Transmission Line Engineer"],
                    "120070": ["电力维修技术员", "Electricity Maintenance Technician"],
                    "120080": ["水利/水电工程师", "Water Resources/Water and Electric Engineer"],
                    "120090": ["核力/火力工程师", "Nuclear Power/Fire Engineer"],
                    "120100": ["空调/热能工程师", "Air-Conditioning/Energy Engineers"],
                    "340050": ["地质勘查/选矿/采矿", "Geological Exploration"],
                    "120110": ["石油/天然气技术人员", "Oil/Gas Technician"],
                    "120160": ["冶金工程师", "Metallurgical Engineer"],
                    "120170": ["光伏技术工程师", "Photovoltaic Technology Engineer"],
                    "120150": ["能源/矿产项目管理", "Energy/Mining Project Management"],
                    "120140": ["其他", "Others"],
                    "500": ["环境科学/环保", "Environmental Science/Environmental"],
                    "290070": ["环保工程师", "Environmental Engineer"],
                    "500002": ["环境评价工程师", "Environmental Assessment Engineer"],
                    "500003": ["环保检测", "Environmental Inspector"],
                    "500007": ["EHS管理", "EHS Management"],
                    "500004": ["水质检测员", "Water Quality Inspector"],
                    "500001": ["水处理工程师", "Water Treatment Engineer"],
                    "500005": ["固废处理工程师", "Solid Waste Treatment Engineer"],
                    "500006": ["废气处理工程师", "Waste Gas Treatment Engineer"],
                    "500008": ["其他", "Others"],
                    "170": ["建筑装潢/市政建设", "Construction"],
                    "170191": ["高级建筑工程师/总工", "Senior Architect"],
                    "170010": ["建筑工程师", "Architect"],
                    "170030": ["建筑设计师", "Architectural Designer"],
                    "170020": ["土木/土建工程师", "Civil Engineer"],
                    "170211": ["结构工程师", "Structural Engineer"],
                    "170206": ["钢结构工程师", "Steel Structure Engineer"],
                    "170193": ["岩土工程", "Geotechnical Engineer"],
                    "170212": ["水利/港口工程技术", "Water Conservancy/Port Engineering Technology"],
                    "170110": ["道路/桥梁/隧道工程技术", "Road/Bridge/Tunnel Technology"],
                    "170197": ["建筑制图/模型/渲染", "CAD Drafter/Building Model/Rendering"],
                    "340040": ["测绘/测量", "Mapping/Surveyor"],
                    "170207": ["爆破工程师", "Blast Engineer"],
                    "170214": ["架线和管道工程技术", "Pipeline Engineering Technology"],
                    "170194": ["楼宇自动化", "Building Automation"],
                    "170202": ["智能大厦/综合布线/安防/弱电", "Intelligent Building/Integrated Wiring/Defence&Security/Weak Current"],
                    "170060": ["给排水/制冷暖通", "Drainage / refrigeration HVAC"],
                    "170208": ["空调工程师", "Air Conditioner Engineer"],
                    "170130": ["室内装潢设计", "Interior Design"],
                    "170213": ["软装设计师", "Soft outfit Designer"],
                    "170196": ["幕墙工程师", "Curtain Wall Engineer"],
                    "170195": ["建筑机电工程师", "Building Electrical Engineer"],
                    "170150": ["城市规划与设计", "Urban Planning and Design"],
                    "170199": ["市政工程师", "Municipal Project Engineer"],
                    "170120": ["园艺/园林/景观设计", "Gardenning Designer"],
                    "170210": ["土建造价工程师", "Civil Engineering Cost Engineer "],
                    "170209": ["安装造价工程师", "Installation Cost Engineer"],
                    "170170": ["公路桥梁预算师", "Road and Bridge Estimator"],
                    "170100": ["工程预结算管理", "Construction Budget/Cost Management"],
                    "170205": ["现场/施工管理", "Construction Management"],
                    "170180": ["施工员", "Construction Worker"],
                    "170090": ["建筑设备工程师", "Construction Equipment Engineer"],
                    "170050": ["工程监理", "Project Management"],
                    "170040": ["建筑工程管理/项目经理", "Construction Management"],
                    "170201": ["建筑工程安全管理", "Construction Security Management"],
                    "170192": ["建筑工程验收", "Construction Project Inspector"],
                    "170200": ["合同管理", "Contract Management"],
                    "170203": ["资料员", "Data Management Specialist"],
                    "170190": ["其他", "Others"],
                    "520": ["物业管理", "Property Management"],
                    "170140": ["物业管理经理/主管", "Property Management Manager/Supervisor"],
                    "520001": ["物业管理专员/助理", "Property Management"],
                    "520002": ["高级物业顾问/物业顾问", "Senior Property Advisor/Property Advisor"],
                    "520003": ["物业招商/租赁/租售", "Property Lease/Rent"],
                    "520004": ["物业设施管理人员", "Property Establishment Management"],
                    "520005": ["物业机电工程师", "Property Mechanical Engineer"],
                    "520006": ["其他", "Others"],
                    "070": ["人力资源", "Human Resource"],
                    "010121": ["首席人力资源官CHO/HRVP", "Chief Human Resource Officer/Vice President"],
                    "070010": ["人力资源总监", "Director of Human Resources"],
                    "070020": ["人力资源经理/主管", "Human Resources Manager/Supervisor"],
                    "070040": ["人力资源专员/助理", "HR Specialist/Assistant"],
                    "070050": ["招聘经理/主管", "Recruiting Manager/Supervisor"],
                    "070051": ["招聘专员/助理", "Recruiting Specialist/Assistant"],
                    "070070": ["培训经理/主管", "Training Manager/Supervisor"],
                    "070080": ["培训专员/助理", "Training Specialist/Assistant"],
                    "070161": ["企业培训师/讲师", "Staff Trainer"],
                    "070100": ["薪资福利经理/主管", "Compensation and Benefits Manager/Director"],
                    "070101": ["薪资福利专员/助理", "Compensation & Benefits Specialist/Assistant"],
                    "070120": ["绩效经理/主管", "Performance Assessment Manager/Supervisor"],
                    "070121": ["绩效专员/助理", "Performance Assessment Specialist/Assistant"],
                    "070140": ["员工关系/企业文化/工会", "Employee Relations/Corporate Culture/Unions"],
                    "070143": ["组织发展(OD)", "Organization Development"],
                    "070141": ["人力资源信息系统", "HRIS"],
                    "070142": ["人力资源伙伴(HRBP)", "HR Business Partner"],
                    "070162": ["猎头顾问/助理", "Headhunter/Assistant"],
                    "070160": ["其他", "Others"],
                    "010": ["高级管理", "Senior Management"],
                    "010010": ["首席执行官CEO/总裁/总经理", "CEO/President/General Manager"],
                    "010020": ["首席运营官COO", "Chief Operating Officer/COO"],
                    "010060": ["合伙人", "Partner"],
                    "010050": ["副总裁/副总经理", "Vice President/Deputy General Manager"],
                    "010102": ["分公司/代表处负责人", "Head of Branch Company"],
                    "010070": ["部门/事业部管理", "Department Management"],
                    "010101": ["投资者关系", "Investor Relations"],
                    "010080": ["总裁助理/总经理助理", "Executive Assistant/General Manager Assistant"],
                    "010103": ["企业秘书/董事会秘书", "Corporate/Board Secretary"],
                    "010130": ["其他", "Others"],
                    "080": ["行政/后勤/文秘", "Admin./Support Services/Secretarial"],
                    "080010": ["行政总监", "Executive Director"],
                    "080020": ["行政经理/主管/办公室主任", "Administration Manager/Supervisor"],
                    "080021": ["行政专员/助理", "Administration Specialist/Assistant"],
                    "080061": ["助理/秘书/文员", "Executive Assistant/Secretary"],
                    "080062": ["前台/总机/接待", "Receptionist"],
                    "080060": ["图书/资料/档案管理", "Document Keeper"],
                    "080063": ["电脑操作/打字/录入员", "Computer Operator/Typist"],
                    "080065": ["后勤/总务", "Logistics/General Affairs"],
                    "080080": ["其他", "Others"],
                    "040": ["项目管理/项目协调", "Project Management"],
                    "040010": ["项目总监", "Project Director"],
                    "040020": ["项目经理/主管", "Project Manager/Supervisor"],
                    "040040": ["项目专员/助理", "Project Specialist/Assistant"],
                    "040030": ["其他", "Others"],
                    "130": ["咨询/调研", "Consultant/Research"],
                    "130020": ["咨询总监", "Advisory Director"],
                    "130030": ["咨询经理/主管", "Consulting Manager/Supervisor"],
                    "130040": ["咨询顾问/咨询员", "Consultant"],
                    "130010": ["企管顾问/专业顾问/策划师", "Business Management/Consultant/Adviser/Professional Planner"],
                    "130070": ["涉外咨询师", "Foreign Consultants"],
                    "130060": ["培训师", "Trainers"],
                    "130050": ["调研员", "Researcher"],
                    "130071": ["情报信息分析师", "Intelligence Analyst"],
                    "130073": ["咨询项目管理", "Consulting Project Management"],
                    "130080": ["其他", "Others"],
                    "270": ["律师/法务/合规", "Legal/Compliance"],
                    "270010": ["律师", "Lawyer"],
                    "270060": ["律师助理", "Paralegal"],
                    "270040": ["法务经理/主管", "Legal manager/Supervisor"],
                    "270041": ["法务专员/助理", "Lega Specialist/Assistant"],
                    "270020": ["法律顾问", "Legal Adviser"],
                    "270043": ["合规经理", "Compliance Manager"],
                    "270044": ["合规主管/专员", "Compliance Supervisor/Specialist"],
                    "270042": ["知识产权/专利/商标代理人", " Intellectual Property/Patent Advisor"],
                    "270050": ["其他", "Others"],
                    "260": ["教育/培训", "Education/Training"],
                    "260009": ["校长", "School Principal"],
                    "260010": ["教学/教务管理人员", "Teaching/Educational Administration"],
                    "260030": ["大学教师/教授", "Professor"],
                    "260052": ["职业中专/技校教师", "Vocational Technical Secondary School/Technical School Teacher"],
                    "260051": ["高中教师", "High School Teacher"],
                    "260053": ["初中教师", "Junior high school teacher"],
                    "260054": ["小学教师", "Grade School Teacher"],
                    "260020": ["幼教", "Preschool Education"],
                    "260057": ["理科教师", "Science teacher"],
                    "260058": ["文科教师", "Liberal Arts Teacher"],
                    "260059": ["外语教师", "Foreign language teacher"],
                    "260055": ["音乐教师", "Music Teacher"],
                    "260056": ["美术教师", "Art Teacher"],
                    "260070": ["体育教师/教练", "Physical Teacher/Coach"],
                    "260072": ["培训督导", "Supervision Training"],
                    "260071": ["培训师/讲师", "Teacher/Trainer"],
                    "260073": ["培训助理/助教", "Training Assistant"],
                    "260075": ["培训策划", "Training Planning"],
                    "260074": ["培训/招生/课程顾问", "Enrollment/Course Consultant"],
                    "260077": ["教育产品开发", "Education Product Development"],
                    "260080": ["其他", "Others"],
                    "180": ["翻译", "Translator"],
                    "180010": ["英语翻译", "English Translator"],
                    "180030": ["法语翻译", "French Translator"],
                    "180040": ["德语翻译", "German Translator"],
                    "180050": ["俄语翻译", "Russian Translator"],
                    "180020": ["日语翻译", "Japanese Translator"],
                    "180070": ["韩语/朝鲜语翻译", "Korean Translator"],
                    "180060": ["西班牙语翻译", "Spanish Translator"],
                    "180073": ["葡萄牙语翻译", "Portuguese Translator"],
                    "180072": ["意大利语翻译", "Italian Translator"],
                    "180071": ["阿拉伯语翻译", "Arabic Translator"],
                    "180074": ["泰语翻译", "Thai Translator"],
                    "180075": ["中国方言翻译", "Chinese Dialect Translator"],
                    "180080": ["其他", "Others"],
                    "191": ["酒店/餐饮/娱乐/生活服务", "Hospitality/Restaurant/Entertainmen/Life Service"],
                    "190010": ["酒店/宾馆管理", "Hotel Management"],
                    "190020": ["餐饮/娱乐管理", "Restaurant & Food / Entertainment Services Management"],
                    "190030": ["大堂经理/领班", "Lobby Manager/Supervisor"],
                    "190040": ["楼面管理", "Floor Management"],
                    "190200": ["宴会管理", "Banquet Management"],
                    "190220": ["管家部经理/主管", "Housekeeping Manager"],
                    "190230": ["宾客服务经理", "Guest Service Manager"],
                    "190240": ["预定部主管", "Reservation Supervisor"],
                    "190180": ["酒店/宾馆营销", "Hotel Sales"],
                    "190060": ["营养师", "Dietitian"],
                    "470011": ["婚礼策划服务", "Wedding Planning Service"],
                    "190170": ["其他", "Others"],
                    "190100": ["导游/旅行顾问", "Tour Guide/Travel Consultant"],
                    "190": ["旅游/出入境服务", "Tourism/Exit and Entry Service"],
                    "190260": ["旅游产品销售", "Tourism Product Sales"],
                    "190270": ["行程管理/计调", "Travel Management"],
                    "190190": ["票务服务", "Ticket Service"],
                    "190210": ["机场代表", "Hotel Airport Representatives"],
                    "190280": ["签证专员", "Visa Specialist"],
                    "191020": ["其他", "Others"],
                    "291": ["百货/连锁/零售服务", "Department Store/Chain Shops/Retail"],
                    "291010": ["店长/卖场管理", "Store Manager/Floor Manager"],
                    "291040": ["品类管理", "Category Management"],
                    "291050": ["安防主管", "Security Technical Service Executive"],
                    "291031": ["其他", "Others"],
                    "292": ["交通运输服务", "Traffic Service"],
                    "340018": ["列车车长/司机", "Train Driver"],
                    "292050": ["列车乘务", "Train Crew"],
                    "292030": ["船长/副船长", "Fleet Captain"],
                    "292070": ["船舶乘务", "Shipping Service"],
                    "340015": ["飞机机长/副机长", "Flight Captain"],
                    "292010": ["航空乘务", "Airline Crew"],
                    "292020": ["地勤人员", "Ground Attendant"],
                    "292040": ["其他", "Others"],
                    "300": ["公务员/事业单位/科研", "Official/Public Organizations/Science Research"],
                    "300021": ["公务员/事业单位人员", "Civil Servant"],
                    "300010": ["科研管理人员", "Research Management"],
                    "300020": ["科研人员", "Researchers"],
                    "310010": ["志愿者", "Volunteer"],
                    "300030": ["其他", "Others"],
                    "310": ["实习生/培训生/储备干部", "Intern/Trainee/Associate Trainee"],
                    "310020": ["实习生", "Intern"],
                    "310040": ["培训生", "Trainee"],
                    "310050": ["储备干部", "Associate Trainee"],
                    "310060": ["其他", "Others"],
                    "320": ["农/林/牧/渔", "Agriculture/Forestry/Animal Husbandry/Fishing"],
                    "320040": ["农艺师", "Agronomist"],
                    "340070": ["园艺师", "Gardener/Horticulturist"],
                    "320020": ["畜牧师", "Animal Husbandry Technician"],
                    "320030": ["动物营养/饲料研发", "Animal nutrition/Feed Development"],
                    "320050": ["其他", "Others"],
                    "340": ["其他", "Other"],
                    "340080": ["其他", "Others"],
                    "563": ["信托/担保/拍卖/典当", "Other"],
                    "140157": ["信托业务", "Trust"],
                    "140155": ["房地产信托/物业投资", "Real Estate Investment Trust/REITS"],
                    "640020": ["担保业务", "Guarantee Business"],
                    "640030": ["拍卖师", "Auctioneer"],
                    "640040": ["典当业务", "Pawn Business"],
                    "640010": ["珠宝/收藏品鉴定", "Jewellery /Collection Appraiser"],
                    "640050": ["其他", "Others"],
                    "620": ["IT管理/项目协调", "IT Management/Project Coordination"],
                    "010030": ["首席技术官CTO/首席信息官CIO", "Chief Technology Officer/Chief Information Officer"],
                    "100020": ["技术/研发总监", "Technology Director"],
                    "360339": ["技术/研发经理", "Technology Manager"],
                    "100170": ["工程与项目实施", "Engineering and Project Implementation"],
                    "100370": ["项目总监", "Project Director"],
                    "100060": ["项目经理/主管", "Project Manager/Supervisor"],
                    "100070": ["项目执行/协调人员", "Project Specialist/Coordinator"],
                    "620010": ["其他", "Others"],
                    "630": ["IT运维/技术支持", "IT Operation/Technical Support"],
                    "360329": ["运维总监", "OPS Director"],
                    "630020": ["运维经理/主管", "OPS Manager/Supervisor"],
                    "360160": ["运维工程师", "Maintenance Engineer"],
                    "360330": ["运维开发", "OPS Developer"],
                    "100030": ["信息技术经理/主管", "IT Manager/Supervisor"],
                    "100040": ["信息技术专员", "Information Technology Specialist"],
                    "360331": ["系统工程师", "System Engineer"],
                    "100330": ["网络工程师", "Network Engineer"],
                    "100190": ["数据库管理员(DBA)", "Database Administrator"],
                    "360328": ["IT支持", "IT Surpport"],
                    "390001": ["硬件维护工程师", "Hardware maintenance engineer"],
                    "100230": ["网络信息安全工程师", "Network and Information Security Engineer"],
                    "100180": ["ERP实施顾问", "ERP Implementation"],
                    "100260": ["文档工程师", "Documentation Engineer"],
                    "630010": ["其他", "Others"],
                    "650": ["房地产交易/中介", "Real Estate Agent/Broker"],
                    "170160": ["房地产交易/中介", "Real Estate Agent/Broker"],
                    "510006": ["房地产销售经理/主管", "Real Estate Sales Manager/Supervisor"],
                    "510007": ["房地产销售人员", "Real Estate Sales"],
                    "510008": ["房地产招商", "Real Estate Investment"],
                    "170080": ["房地产评估", "Real Estate Appraisal"],
                    "510018": ["其他", "Others"],
                    "510": ["房地产规划/开发", "Real Estate Development"],
                    "170070": ["房地产项目策划经理/主管", "Real Estate Planning Manager/Supervisor"],
                    "510001": ["房地产项目策划专员/助理", "Real Estate Planning Specialist/Assistant"],
                    "510003": ["房地产项目招投标", "Real Estate Tender /Bidding"],
                    "170198": ["开发报建经理/主管", "Applying for Construction Manager/Supervisor"],
                    "170204": ["开发报建专员/助理", "Applying for Construction Specialist/Assistant"],
                    "510011": ["规划设计总监", "Planning Director"],
                    "510019": ["规划设计经理/主管", "Planning Manager/Supervisor"],
                    "510012": ["规划设计师", "Planning Designer"],
                    "510002": ["配套经理/主管", "Real Estate Supporting Manager/Supervisor"],
                    "510010": ["配套工程师", "Real Estate Supporting Engineer"],
                    "510016": ["房地产项目管理", "Real Estate Project Management"],
                    "510017": ["房地产项目运营", "Real Estate Project Operation"],
                    "510014": ["成本总监", "Cost Accounting Director"],
                    "510015": ["成本经理/主管", "Cost Accounting Manager/Supervisor"],
                    "510005": ["房地产资产管理", "Real Estate Asset Management"],
                    "510004": ["房地产投资分析", "Real Estate Investment Analysis"],
                    "510009": ["其他", "Others"],
                    "530": ["高级管理", "Senior Management"],
                    "531": ["人力资源", "Human Resource"],
                    "532": ["财务/审计/税务", "Financial Affairs"],
                    "533": ["市场", "Marketing Management"],
                    "534": ["公关/媒介", "Public Relations/Media"],
                    "539": ["法务", "Legal"],
                    "540": ["行政/后勤/文秘", "Administration"],
                    "542": ["后端开发", "Back-end Development"],
                    "657": ["前端开发", "Front-end Development"],
                    "658": ["BI", "BI"],
                    "547": ["UI/UE/平面设计", "UI/UE/Graphic Design"],
                    "546": ["产品", "Product"],
                    "545": ["运营", "Operations"],
                    "543": ["IT质量管理", "IT QA"],
                    "659": ["配置管理", "Configuration Management"],
                    "660": ["IT管理", "IT Management"],
                    "661": ["IT项目管理", "IT Project Management"],
                    "662": ["IT运维/技术支持", "IT Operation/Technical Support"],
                    "551": ["硬件开发", "Hardware Development"],
                    "550": ["电信/通信技术", "Telecommunication/Communication Techonlogy"],
                    "664": ["房地产规划/开发", "Real Estate Development"],
                    "553": ["建筑工程", "Construction"],
                    "554": ["土木/土建规划设计", "Civil Planning/Design"],
                    "663": ["建筑装潢", "Architectural Decoration"],
                    "665": ["房地产交易/中介", "Real Estate Agent/Broker"],
                    "555": ["物业管理", "Property Management"],
                    "556": ["银行", "Banking"],
                    "557": ["保险", "Insurance"],
                    "558": ["业务服务", "Financial Service"],
                    "559": ["金融产品/行业研究/风控", "Financial Product/Industry Research/Risk Management"],
                    "640": ["信托/担保/拍卖/典当", "Trust/Guarantee/Auction/Pawn Business"],
                    "564": ["生产工艺", "Production Technology"],
                    "565": ["采购/物料/设备管理", "Purchasing/Material/Equipment Management"],
                    "566": ["生产管理/维修", "Production Management/Maintenance"],
                    "603": ["医学研发/临床试验", "Medical Research /Clinical Trials"],
                    "655": ["医药注册/推广", "Medical Registration/Marketing"],
                    "656": ["汽车制造", "Automobile Manufacture"],
                    "579": ["汽车销售与服务", "Automotive Sales and Service"],
                    "549": ["电子/电器/半导体/仪器", "Electronics/Wiring/Semiconductor/Instrument"],
                    "613": ["化工", "Chemical"],
                    "571": ["服装/纺织/皮革", "Apparels/Textiles/Leather Goods"],
                    "652": ["机械设计/制造", "Mechanical Design/Production"],
                    "653": ["机械设备/维修", "Mechanical Maintenance"],
                    "666": ["质量管理/安全防护", "Quality Management/Safety Protection"],
                    "667": ["项目管理/项目协调", "Project Management"],
                    "597": ["教育/培训", "Education/Training"],
                    "589": ["咨询/调研", "Consultant/Research"],
                    "591": ["翻译", "Translator"],
                    "594": ["广告/会展", "Advertising/Exhibition"],
                    "595": ["影视/媒体", "Film Entertainment/Media"],
                    "668": ["写作/采编/出版", "Writing/Newspaper/Publishing"],
                    "585": ["印刷/包装", "Packaging/Printing"],
                    "596": ["艺术/设计", "Art/Design"],
                    "602": ["贸易", "Trade"],
                    "670": ["采购", "Purchasing"],
                    "599": ["交通/运输", "Traffic Service"],
                    "600": ["物流/仓储", "Logistics/Warehouse"],
                    "610": ["医院/医疗/护理", "Hospital/Medicine/Nursing"],
                    "569": ["百货/连锁/零售服务", "Department Store/Chain Shops/Retail"],
                    "593": ["酒店/餐饮/娱乐/生活服务", "Hospitality/Restaurant/Entertainmen/Life Service"],
                    "592": ["旅游/出入境服务", "Tourism/Exit and Entry Service"],
                    "611": ["电力/能源/矿产/地质勘查", "Electricity/Energy/Mining/Geological Survey"],
                    "614": ["环境科学/环保", "Environmental Science/Environmental"],
                    "615": ["公务员/公益事业/科研", "Official/Public Service/Science Research"],
                    "616": ["农/林/牧/渔", "Agriculture/Forestry/Animal Husbandry/Fishing"],
                    "598": ["实习生/培训生/储备干部", "Intern/Trainee/Associate Trainee"],
                    "669": ["其他", "Others"],
                    "000": ["全部职能", "All"],
                    "hot-06": ["销售/客服/技术支持", "Sales/Customer Service/Technical Support"],
                    "cate-01": ["IT/互联网/通信", "IT/Internet/Communication"],
                    "cate-01-01": ["软件/互联网开发/系统集成", "Software Development/System Integration"],
                    "cate-01-02": ["产品/运营/设计", "Product/Operation/Design"],
                    "cate-01-03": ["IT质量管理/测试/配置管理", "IT QA/Testing/Configuration Management"],
                    "cate-01-04": ["IT管理/项目协调", "IT Management/Project Coordination"],
                    "cate-01-05": ["IT运维/技术支持", "IT Operation/Technical Support"],
                    "cate-01-06": ["硬件开发", "Hardware Development"],
                    "cate-01-07": ["电信/通信技术", "Telecommunication/Communication Techonlogy"],
                    "cate-02": ["房地产/建筑/物业", "Real Estate/Construction/Property Management"],
                    "cate-02-01": ["房地产规划/开发", "Real Estate Development"],
                    "cate-02-02": ["建筑装潢/市政建设", "Construction"],
                    "cate-02-03": ["房地产交易/中介", "Real Estate Agent/Broker"],
                    "cate-02-04": ["物业管理", "Property Management"],
                    "cate-03": ["金融", "Finance"],
                    "cate-03-01": ["银行", "Banking"],
                    "cate-03-02": ["保险", "Insurance"],
                    "cate-03-03": ["基金/证券/期货/投资", "Fund/Security/Futures/Investments"],
                    "cate-03-04": ["信托/担保/拍卖/典当", "Trust/Guarantee/Auction/Pawn Business"],
                    "cate-04": ["生产/制造", "Production/Manufacturing"],
                    "cate-04-01": ["生产/营运", "Manufacturing/Operation"],
                    "cate-04-02": ["生物/制药/医疗器械", "Biotechnology/Pharmaceuticals/Medical Equipment"],
                    "cate-04-03": ["汽车制造", "Automobile Manufacture"],
                    "cate-04-04": ["汽车销售与服务", "Automotive Sales and Service"],
                    "cate-04-05": ["电子/电器/半导体/仪器/仪表", "Electronics/Wiring/Semiconductor/Instrument/Industry"],
                    "cate-04-06": ["化工", "Chemical"],
                    "cate-04-07": ["服装/纺织/皮革", "Apparels/Textiles/Leather Goods"],
                    "cate-04-08": ["机械设计/制造/维修", "Mechanical Design/Production/Maintenance"],
                    "cate-05": ["质量管理/项目管理", "Quality Management/Project Management"],
                    "cate-05-01": ["质量管理/安全防护", "Quality Management/Safety Protection"],
                    "cate-05-02": ["项目管理/项目协调", "Project Management"],
                    "cate-06": ["教育/咨询/翻译", "Education/Consultant/Translation"],
                    "cate-06-01": ["教育/培训", "Education/Training"],
                    "cate-06-02": ["咨询/调研", "Consultant/Research"],
                    "cate-06-03": ["翻译", "Translator"],
                    "cate-07": ["广告/传媒/设计", "Advertising/Media/Design"],
                    "cate-07-01": ["广告/会展", "Advertising/Exhibition"],
                    "cate-07-02": ["影视/媒体", "Film Entertainment/Media"],
                    "cate-07-03": ["写作/采编/出版/印刷", "Writing/Newspaper/Publishing/Printing"],
                    "cate-07-04": ["艺术/设计", "Art/Design"],
                    "cate-08": ["采购/贸易/交通/物流", "Purchasing/Trade/Transportation/Logistics"],
                    "cate-08-01": ["采购/贸易", "Purchasing/Trade"],
                    "cate-08-02": ["交通运输服务", "Traffic Service"],
                    "cate-08-03": ["物流/仓储", "Logistics/Warehouse"],
                    "cate-09": ["医疗护理/生活服务", "Healthcare/Life Service"],
                    "cate-09-01": ["医院/医疗/护理", "Hospital/Medicine/Nursing"],
                    "cate-09-02": ["百货/连锁/零售服务", "Department Store/Chain Shops/Retail"],
                    "cate-09-03": ["酒店/餐饮/娱乐/生活服务", "Hospitality/Restaurant/Entertainmen/Life Service"],
                    "cate-09-04": ["旅游/出入境服务", "Tourism/Exit and Entry Service"],
                    "cate-10": ["能源/矿产/环保", "Energy/Mining/Environmental Protection"],
                    "cate-10-01": ["电力/能源/矿产/地质勘查", "Electricity/Energy/Mining/Geological Survey"],
                    "cate-10-02": ["环境科学/环保", "Environmental Science/Environmental"],
                    "cate-11": ["公务员/农林牧渔/其他", "Official/Agriculture/Others"],
                    "cate-11-01": ["公务员/公益事业/科研", "Official/Public Service/Science Research"],
                    "cate-11-02": ["农/林/牧/渔", "Agriculture/Forestry/Animal Husbandry/Fishing"],
                    "cate-11-03": ["实习生/培训生/储备干部", "Intern/Trainee/Associate Trainee"],
                    "cate-11-04": ["其他", "Others"]
                },
                "relations": {
                    "hot-06": ["535", "536", "537", "538"],
                    "530": ["010010", "010020", "010060", "010050", "010102", "010070", "010101", "010080", "010103"],
                    "531": ["010121", "070010", "070020", "070040", "070050", "070051", "070070", "070080", "070161", "070100", "070101", "070120", "070121", "070140", "070143", "070141", "070142", "070162"],
                    "532": ["010040", "090020", "090030", "090040", "090200", "090140", "090050", "090060", "090201", "090202", "090120", "090130", "090160", "090170", "090080", "090090", "090100", "090110", "090180", "090203", "090150"],
                    "533": ["060010", "060020", "060200", "060130", "060207", "060201", "060202", "060205", "060206", "060090", "060204", "060203", "060209", "060110", "460005", "460006", "060060", "060208"],
                    "534": ["460001", "060040", "460002", "290100", "460003", "460004", "460009", "460007"],
                    "535": ["020125", "020010", "020020", "020005", "020025", "020040", "020050", "020127", "020122", "020121", "020120", "020126"],
                    "536": ["370001", "370012", "370002", "370003", "370007", "370013", "370005", "370004", "370008", "370010", "370011", "370006"],
                    "537": ["380001", "380002", "380004", "380005", "380008", "380009", "020100", "380003", "380007"],
                    "538": ["030010", "030085", "030081", "030082", "030083", "030084", "360130", "030086", "020070", "020080", "030060", "030070"],
                    "539": ["270010", "270060", "270040", "270041", "270020", "270043", "270044", "270042"],
                    "540": ["080010", "080020", "080021", "080061", "080062", "080060", "080063", "080065"],
                    "542": ["100100", "100090", "360321", "100080", "350040", "360310", "360333", "350030", "100290", "100280", "110070", "360334", "100140"],
                    "657": ["360300", "360335"],
                    "658": ["360320", "360332", "360336", "100350", "350020"],
                    "547": ["100340", "360290", "360220", "350010", "360260", "360150", "360240", "360190", "360200", "360210", "360230"],
                    "546": ["360040", "100071", "360050", "360180", "360270", "360280"],
                    "545": ["360010", "360020", "360030", "100300", "100320", "100310", "360070", "360080", "360090", "360060", "060210", "360100", "360110", "360120"],
                    "543": ["360322", "360323", "360327", "360324", "360325", "360326", "360340", "100250", "100235"],
                    "659": ["360338", "360337"],
                    "660": ["010030", "100020", "360339"],
                    "661": ["100170", "100370", "100060", "100070"],
                    "662": ["360329", "630020", "360160", "360330", "100030", "100040", "360331", "100330", "100190", "360328", "390001", "100230", "100180", "100260"],
                    "551": ["100130", "100150", "110065"],
                    "550": ["110030", "110210", "110240", "110250", "110260", "110230", "110220", "110080", "110270", "110280", "110300", "110290"],
                    "664": ["170070", "510001", "510003", "170198", "170204", "510011", "510019", "510012", "510002", "510010", "510016", "510017", "510014", "510015", "510005", "510004"],
                    "553": ["170191", "170010", "340040", "170207", "170202", "170195", "170199", "170210", "170209", "170170", "170100", "170205", "170180", "170090", "170050", "170040", "170201", "170192", "170200", "170203"],
                    "554": ["170030", "170020", "170211", "170206", "170193", "170212", "170110", "170197", "170214", "170194", "170060", "170208", "170150", "170120"],
                    "663": ["170130", "170213", "170196"],
                    "665": ["170160", "510006", "510007", "510008", "170080"],
                    "555": ["170140", "520001", "520002", "520003", "520004", "520005"],
                    "556": ["140020", "410022", "140060", "410002", "410007", "410008", "410003", "410004", "410005", "410006", "410001", "410009", "140110", "410020", "140120", "140130", "410010", "140090", "410011", "410012", "140100", "410014", "410016", "410017", "410015", "410019"],
                    "557": ["150040", "150100", "150080", "150050", "150010", "150020", "150130", "150070", "150090", "150030", "150131", "150132", "150110", "150120"],
                    "558": ["140010", "140143", "140144", "140146", "140152", "140153", "140149", "140040", "140141", "140050", "140142", "140151", "140148", "140154", "140160"],
                    "559": ["140070", "140080", "140150", "140145", "140147", "140030"],
                    "563": ["140157", "140155", "640020", "640030", "640040", "640010"],
                    "564": ["210090", "210170", "210180", "210190", "210080", "210250"],
                    "565": ["210040", "160210", "160095", "160220", "210050", "210060", "210130"],
                    "566": ["210210", "210020", "210240", "210140", "210150", "210260", "210220", "210230", "210030", "210015", "210160", "210270", "210110", "210070"],
                    "603": ["280070", "290010", "290030", "290040", "290094", "290097", "290020", "290090", "290096"],
                    "655": ["280130", "290095", "290093", "280150", "290098", "290102", "290099", "290091", "290092", "290055", "290101"],
                    "656": ["420003", "420002", "420010", "420008", "420004", "420007", "420005", "420006", "420001"],
                    "579": ["430003", "430001", "430004", "430002", "430006", "430007", "430008", "430011"],
                    "549": ["110020", "110180", "110170", "110400", "110401", "110010", "110040", "110404", "110130", "110330", "110380", "110403", "110350", "110060", "110405", "110050", "110360", "110090", "110100", "110310", "110320", "110340", "110402", "110407", "110120", "110406", "110370", "110110", "110190", "110140"],
                    "613": ["290060", "490001", "490002", "490003", "490004", "490005", "490006", "490007"],
                    "571": ["440001", "240040", "440006", "240050", "440009", "440003", "440004", "440005"],
                    "652": ["220010", "220030", "220040", "220240", "220282", "220230", "220090", "220100", "220110", "220020", "220130", "220080", "220070", "220120", "220281", "220270", "220160", "220140", "220150", "220190", "220200", "220060", "220280", "120130", "220050"],
                    "653": ["220250", "220284", "220283", "220005", "220285", "220260", "220170", "220210"],
                    "666": ["050010", "050020", "050030", "050070", "050080", "050060", "050110", "050090", "050100", "340020", "050040"],
                    "667": ["040010", "040020", "040040"],
                    "597": ["260009", "260010", "260030", "260052", "260051", "260053", "260054", "260020", "260057", "260058", "260059", "260055", "260056", "260070", "260072", "260071", "260073", "260075", "260074", "260077"],
                    "589": ["130020", "130030", "130040", "130010", "130070", "130060", "130050", "130071", "130073"],
                    "591": ["180010", "180030", "180040", "180050", "180020", "180070", "180060", "180073", "180072", "180071", "180074", "180075"],
                    "594": ["470003", "060150", "470004", "470005", "470008", "470012", "470014", "470001", "060170", "470002", "470006", "060070", "470009", "470010"],
                    "595": ["250100", "250110", "250090", "250120", "250130", "250160", "480001", "480002"],
                    "668": ["250020", "250250", "250190", "250030", "250040", "250070", "250010", "250080", "250050"],
                    "585": ["250210", "250200", "250230", "250220", "250240", "220180"],
                    "596": ["240151", "240153", "240010", "240080", "240020", "240152", "240157", "240120", "240110", "240156", "240090", "240030", "240060", "240070", "240155", "240130", "240125"],
                    "602": ["160010", "450005", "160020", "450006", "160021", "450007", "450008", "450009"],
                    "670": ["450001", "160070", "450002", "450003", "450004"],
                    "599": ["340018", "292050", "292030", "292070", "340015", "292010", "292020"],
                    "600": ["160190", "160090", "160200", "160140", "160130", "160050", "160110", "160230", "160250", "160040", "160260", "160120", "160160", "160240", "160270"],
                    "610": ["280010", "280175", "280161", "280166", "280172", "280168", "280167", "280090", "280169", "280163", "280164", "280174", "280173", "280110", "280020", "280030", "280120", "280100", "280171", "280162", "280050", "280080", "280165"],
                    "569": ["291010", "291040", "291050"],
                    "593": ["190010", "190020", "190030", "190040", "190200", "190220", "190230", "190240", "190180", "190060", "470011"],
                    "592": ["190260", "190100", "190270", "190190", "190210", "190280"],
                    "611": ["120060", "120040", "120070", "120080", "120090", "120100", "340050", "120110", "120160", "120170", "120150"],
                    "614": ["290070", "500002", "500003", "500007", "500004", "500001", "500005", "500006"],
                    "615": ["300021", "300010", "300020", "310010"],
                    "616": ["320040", "340070", "320020", "320030"],
                    "598": ["310020", "310040", "310050"],
                    "669": ["340080"],
                    "cate-01": ["cate-01-01", "cate-01-02", "cate-01-03", "cate-01-04", "cate-01-05", "cate-01-06", "cate-01-07"],
                    "cate-02": ["cate-02-01", "cate-02-02", "cate-02-03", "cate-02-04"],
                    "cate-03": ["cate-03-01", "cate-03-02", "cate-03-03", "cate-03-04"],
                    "cate-04": ["cate-04-01", "cate-04-02", "cate-04-03", "cate-04-04", "cate-04-05", "cate-04-06", "cate-04-07", "cate-04-08"],
                    "cate-05": ["cate-05-01", "cate-05-02"],
                    "cate-06": ["cate-06-01", "cate-06-02", "cate-06-03"],
                    "cate-07": ["cate-07-01", "cate-07-02", "cate-07-03", "cate-07-04"],
                    "cate-08": ["cate-08-01", "cate-08-02", "cate-08-03"],
                    "cate-09": ["cate-09-01", "cate-09-02", "cate-09-03", "cate-09-04"],
                    "cate-10": ["cate-10-01", "cate-10-02"],
                    "cate-11": ["cate-11-01", "cate-11-02", "cate-11-03", "cate-11-04"],
                    "cate-01-01": ["542", "657", "658"],
                    "cate-01-02": ["546", "545", "547"],
                    "cate-01-03": ["543", "659"],
                    "cate-01-04": ["660", "661"],
                    "cate-01-05": ["662"],
                    "cate-01-06": ["551"],
                    "cate-01-07": ["550"],
                    "cate-02-01": ["664"],
                    "cate-02-02": ["553", "554", "663"],
                    "cate-02-03": ["665"],
                    "cate-02-04": ["555"],
                    "cate-03-01": ["556"],
                    "cate-03-02": ["557"],
                    "cate-03-03": ["558", "559"],
                    "cate-03-04": ["563"],
                    "cate-04-01": ["564", "565", "566"],
                    "cate-04-02": ["603", "655"],
                    "cate-04-03": ["656"],
                    "cate-04-04": ["579"],
                    "cate-04-05": ["549"],
                    "cate-04-06": ["613"],
                    "cate-04-07": ["571"],
                    "cate-04-08": ["652", "653"],
                    "cate-05-01": ["666"],
                    "cate-05-02": ["667"],
                    "cate-06-01": ["597"],
                    "cate-06-02": ["589"],
                    "cate-06-03": ["591"],
                    "cate-07-01": ["594"],
                    "cate-07-02": ["595"],
                    "cate-07-03": ["668", "585"],
                    "cate-07-04": ["596"],
                    "cate-08-01": ["602", "670"],
                    "cate-08-02": ["599"],
                    "cate-08-03": ["600"],
                    "cate-09-01": ["610"],
                    "cate-09-02": ["569"],
                    "cate-09-03": ["593"],
                    "cate-09-04": ["592"],
                    "cate-10-01": ["611"],
                    "cate-10-02": ["614"],
                    "cate-11-01": ["615"],
                    "cate-11-02": ["616"],
                    "cate-11-03": ["598"],
                    "cate-11-04": ["669"]
                },
                "category": {
                    "hotjobs": ["530", "531", "532", "533", "534", "hot-06", "539", "540"],
                    "jobs": ["cate-01", "cate-02", "cate-03", "cate-04", "cate-05", "cate-06", "cate-07", "cate-08", "cate-09", "cate-10", "cate-11"]
                }
            }
        },

    }, ["LOfQ"]);
