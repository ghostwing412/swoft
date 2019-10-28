## Annotation 使用规则

*PS：要改变思维方式，此处定义的解析类在系统启动的时候就会执行完毕并将解析完成的内容存放于注册类中*

### Mapping 

+ 定义解析器解析的对象内容
+ 可使用@Target指定解析类型

### Parser

+ 解析后执行程序
+ 需要使用@AnnotationParse(annotation=xxx)指定解析器对象设定

### Register

+ 解析注册机


### FormUpgrade插件

+ FormBase {name=string,title=string,isInline=boolean}
+ FormAttr {obj=array}
+ FormLay {obj=array}
+ FormVerify {type=regex|required|phone|email|url|number|date|identity,msg=string} 注意此处的正则属于javascript的正则表达式
+ FormText {placeholder=string}
