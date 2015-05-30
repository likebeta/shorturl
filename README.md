## 服务功能

类似 [ady.ly](http://adf.ly/?id=2688008) 的短网址服务。 提供缩略和还原网址的api，可以自定义网址，注册后可以指定网址还原时的跳转行为。api分为GET和POST两种http请求方式，每种请求方式又分为两种操作(action)： 缩略(short)或还原(extend)

#### 缩略

缩略时需要指定原始地址,自定义链接时需要指定alias字段和token，自定义跳转类型时需要指定token和jump字段

#### 还原

还原时需要指定缩略地址


## api

#### GET && 缩略

最简单的示例：

	请求：
	http://exemple.com/api.php?action=short&&srcurl=http%3a%2f%2fwww.google.com
	返回成功：
	{
		result: 1,
		shorturl: http://exemple.com/tr0iww
	}
	返回失败：
	{
		result: 0,
		shorturl: 
	}
指定跳转类型：

	请求：
	http://exemple.com/api.php?action=short&&token=123456&&jump=1&&srcurl=http%3a%2f%2fwww.google.com
	返回成功：
	{
		result: 1,
		shorturl: http://exemple.com/tr0iww
	}
	返回失败：
	{
		result: 0,
		shorturl: 
	}
自定义短链接：

	请求：
	http://exemple.com/api.php?action=short&&token=123456&&alias=likebeta&&jump=1&&srcurl=http%3a%2f%2fwww.ixxoo.me
	返回成功：
	{
		result: 1,
		shorturl: http://exemple.com/likebeta
	}
	返回失败：
	{
		result: 0,
		shorturl: 
	}

#### GET && 还原
	请求：
	http://exemple.com/api.php?action=extend&&srcurl=http%3a%2f%2fexemple.com%2ftr0iww
	返回成功：
	{
		result: 1,
		srcurl: http://www.google.com
	}
	返回失败：
	{
		result: 0,
		srcurl: 
	}

#### POST && 缩略

	请求：
	{
		action: short,
		data:
		[
			{
				srcurl: http://www.google.com
			},
			{
				token: 123456,
				jump: 1,
				srcurl: http://www.google.com
			},
			{
				token: 123456,
				alias: likebeta
				jump: 1,
				srcurl: http://www.google.com
			},
			{
				jump: 1;
				srcurl: http://www.google.com
			}
		]
	}
	返回：
	{
		[
			{
				result: 1,
				srcurl: http://www.google.com,
				shorturl: http://exemple.com/tr0iww
			},
			{
				result: 1,
				srcurl: http://www.google.com,
				shorturl: http://exemple.com/tr0iww
			},
			{
				result: 1,
				srcurl: http://www.google.com,
				shorturl: http://exemple.com/likebeta
			},
			{
				result: 0,
				srcurl: http://www.google.com,
				shorturl: 
			}
		]
	}

#### POST && 还原

	请求：
	{
		action: extend,
		data:
		[
			{
				shorturl: http://exemple.com/tr0iww
			},
			{
				shorturl: http://exemple.com/likebeta
			},
			{
				srcurl: http://exemple.com
			}
		]
	}
	返回：
	{
		[
			{
				result: 1,
				srcurl: http://www.google.com,
				shorturl: http://exemple.com/tr0iww
			},
			{
				result: 1,
				srcurl: http://www.google.com,
				shorturl: http://exemple.com/tr0iww
			},
			{
				result: 0,
				srcurl: http://www.google.com,
				shorturl: 
			}
		]
	}



