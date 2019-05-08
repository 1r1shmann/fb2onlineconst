function rollInOut(rollID) {
	_sign = _$(rollID + 'sign');
	_roll = _$(rollID);
	if (_sign.innerHTML.match(/\+/)) {
		_roll.style.display = 'block';
		_sign.innerHTML = _sign.innerHTML.replace(/\+/, '^');
	} else if (_sign.innerHTML.match(/\^/)) {
		_roll.style.display = 'none';
		_sign.innerHTML = _sign.innerHTML.replace(/\^/, '+');
	}
}

function switchAppendix(classID) {
	_sign = _$('appsign');
	lst = getElementsByClassName(classID);
	if (_sign.innerHTML.match(/\+/)) {
		for (i = 0; i < lst.length; i++)
			lst[i].style.display = 'block';
		_sign.innerHTML = _sign.innerHTML.replace(/\+/, '^');
		eraseCookie('hiddenAppendix');
	} else if (_sign.innerHTML.match(/\^/)) {
		for (i = 0; i < lst.length; i++)
			lst[i].style.display = 'none';
		_sign.innerHTML = _sign.innerHTML.replace(/\^/, '+');
		createCookie('hiddenAppendix', 1, 365);
	}
}

function captionLayout(content, helpID, s12) {
	_$(helpID).innerHTML='<table style="width: 100%; border: solid 3px black; background-color: white;' +
		' font-family: sans-serif;" cellspacing="0"><tr>' +
		'<td style="width: 1%; padding: 8px; line-height: 1; vertical-align: top;">' +
		'<a class="fakelink s12 nowr" onclick="_$(\'' + helpID + '\').innerHTML=\'\';">' +
		'<b>[ x ]<\/b><\/a><\/td><td class="' + ((s12) ? 's12' : 's11') + '" style="padding: 8px 8px 8px 2px; text-align: justify;">' +
		content + '<\/td><\/tr><\/table>';
}

var rq;
var tout;

function checkBik(act, tgt, inID, cc) {
	val = _$(inID).value;
	val.replace(/[^0-9]/g, '');
	if (act == 'check' || act == 'fill_n' || act == 'fill_k') {
		if (val.length != 9) {
			if (act == 'check' && val.length != 0)
				captionLayout('Ошибка: Некорректный БИК', tgt, true);
			return false;
		}
		query = 'dbaccess.php?mode=bik&bik=' + val + ((cc) ? '&cc=1' : '');
	} else if (act == 'okato') {
		if (val.length == 0)
			return false;
		else if (val.length != 2 && val.length != 5 && val.length != 8 && val.length != 11) {
			captionLayout('Ошибка: Некорректный код ОКАТО', tgt, true);
			return false;
		}
		query = 'dbaccess.php?okato=' + val;
	} else if (act == 'kbk') {
		if (val.length == 0)
			return false;
		else if (val.length != 20) {
			captionLayout('Ошибка: Некорректный КБК', tgt, true);
			return false;
		}
		query = 'dbaccess.php?kbk=' + val;
	}

	rq = createHttpRequest();
	if (rq) {
		if (act == 'check' || act == 'okato' || act == 'kbk')
			captionLayout('Запрос...', tgt, true);

		rq.onreadystatechange = function() {
			if (rq.readyState == 4) {
				clearTimeout(tout);
				if (rq.status == 200) {
					if (act == 'check' || act == 'fill_n' || act == 'fill_k') {
						out = '<div style=\"padding: 0 0 4px 0; font-weight: bold;\">' +
							'Проверка БИК ' + val + '<\/div>';
						spl = rq.responseText.split('|');
						if (spl[0] != '0') {
							if (act == 'check') {
								out += 'Ошибка: ' + spl[1];
								captionLayout(out, tgt, true);
							}
						} else {
							if (act == 'check') {
								if (spl[4])
									out += '<tt>Тип кредитной организации ....<\/tt> ' +
										spl[4] + '<br>';
								out += '<tt>Платежное наименование .......<\/tt> ' +
									spl[1] + '<br>';
								out += '<tt>Местонахождение ..............<\/tt> ' +
									spl[2] + '<br>';
								out += '<tt>БИК ..........................<\/tt> ' +
									spl[6] + '<br>';
								if (spl[3])
									out += '<tt>Корреспондентский счет .......<\/tt> ' +
										spl[3] + '<br>';
								if (spl[5])
									out += '<span class="s11">&nbsp;<br>'+
										'<span class="tracking">' +
										'Примечание: <\/span>' + spl[5] + '<\/span>';
								captionLayout(out, tgt, true);
							} else if (act == 'fill_n') {
								_$(tgt).value = htmlSpecialCharsDecode(
										spl[1] + ((spl[2]) ? ', ' + spl[2] : ''));
							} else if (act == 'fill_k') {
								_$(tgt).value = spl[3];
								_$(tgt).style.color = 'black';
							}
						}
					} else if (act == 'okato') {
						out = '<div style=\"padding: 0 0 4px 0; font-weight: bold;\">' +
							'Проверка кода ОКАТО ' + val + '<\/div>';
						res = rq.responseText;
						res = res.replace(/(\d{3})   /g, '<tt>$1&nbsp;&nbsp;</tt>');
						res = res.replace(/ (\d{2})   /g, '<tt>&nbsp;$1&nbsp;&nbsp;</tt>');
						res = res.replace(/\n/g, '<br>');
						out += res;
						captionLayout(out, tgt, true);
					} else if (act == 'kbk') {
						out = '<div style=\"padding: 0 0 4px 0; font-weight: bold;\">' +
							'Проверка КБК ' + val + '<\/div>';
						out += rq.responseText;
						captionLayout(out, tgt, true);
					}
				} else if (act == 'check' || act == 'okato' || act == 'kbk') {
					captionLayout('Ошибка: ' + rq.statusText, tgt, true);
				}
			}
		}

		if (act == 'check' || act == 'okato' || act == 'kbk')
			tout = setTimeout('captionLayout(\'Ошибка: Timeout\', \''+ tgt + '\', true); rq.abort()', 10000);
		else
			tout = setTimeout('rq.abort()', 10000);
		rq.open("GET", query, true);
		rq.send(null);
	}
}

function showCaption(capID, helpID) {
	captionLayout(_$(capID).innerHTML, helpID);
}

function hideAppendix(capPrefix, sw) {
	if (sw) act = 'block'; else act = 'none';
	for (i = 1; i < 10; i++) {
		elm = _$(capPrefix + i);
		if (elm) elm.style.display = act;
	}
}

function mkHiddenProp(formId, propName, propValue) {
	var element = null;
	element = document.createElement('input');
	element.type = "hidden";
	element.name = propName;
	element.value = propValue;
	_$(formId).appendChild(element);
}

function collectTableStream(formId, prefix, nrow, ncol, hv, lim) {
	if (!lim) lim = 1024;
	var ret = '';
	var k = 0;
	var added = '';
	for (i = 0; i < nrow; i++) for (j = 0; j < ncol; j++) {
		key = i * ncol + j;
		added = _$(prefix + key).value + unescape('%07');
		if (ret.length + added.length > lim) {
			mkHiddenProp(formId, hv + k, ret);
			k++;
			ret = '';
		}
		ret += added;
	}
	mkHiddenProp(formId, hv + k, ret);
	return true;
}

function updateSaveState(bID) {
	if (formIsChanged(_$('frm'))) _$(bID).disabled = false;
	else _$(bID).disabled = true;
}

function saveHandler(url, post) {
	formRelink('frm', url, '_self');
	_$('frm').method = (post) ? 'post' : 'get';
	_$('frm').submit();
}

var tOut = false;
var trackedObject;
var validLength;
function startTrack() {
	val = trackedObject.value;
	newval = val.replace(/[^0-9]/g, '');
	newval = newval.substr(0, trackedObject.maxLength / 4);
	if (newval != val) trackedObject.value = newval;
	tOut = setTimeout('startTrack()', 300);
}

function filterTracked(evt, allowed) {
	var keyCode, chr, inputField;
	
	// Get the Key Code of the Key pressed if possible else - allow
	if (window.event) {
		keyCode = window.event.keyCode;
		evt = window.event;
	} else if (evt) keyCode = evt.which;
	else return true;

	if (allowed == '') return true;

	// Get the Element that triggered the Event
	inputField = evt.srcElement ? evt.srcElement : evt.target || evt.currentTarget;

	// If the Key Pressed is a CTRL key like Esc, Enter etc - allow
	if (keyCode == null || keyCode == 0 || keyCode == 8 || keyCode == 9 ||
		keyCode == 13 || keyCode == 27) return true;

	// Ctrl-c, Ctrl-v, Ctrl-x
	if ((keyCode == 99 || keyCode == 67 || keyCode == 118 || keyCode == 86 ||
		keyCode == 120 || keyCode == 88) && evt.ctrlKey) return true;

	if (trackedObject.maxLength / 4 <= trackedObject.value.length)
		return false;

	// Get the Pressed Character
	chr = String.fromCharCode(keyCode);

	// If the Character is a number - allow
	if (allowed.indexOf(chr) > -1) return true;
	else return false;

}

function onFocusTracking(obj, validLen) {
	if (!tOut) {
		obj.maxLength *= 4;
		trackedObject = obj;
		validLength = validLen;
		startTrack();
		trackedObject.style.color = 'black';
	}
}

function onBlurTracking(obj) {
	if (tOut) {
		obj.maxLength /= 4;
		clearTimeout(tOut);
		tOut = false;
		isValid = (trackedObject.value.length == 0 || validLength == 0 ||
			trackedObject.value.length == validLength ||
			trackedObject.value.length == obj.maxLength);
		if (isValid) trackedObject.style.color = 'black';
		else trackedObject.style.color = 'red';
	}
}


