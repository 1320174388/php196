/**
 *
 * author：xyzsyx@163.com 在使用中遇到问题或发现bug更或者有技术交流爱好的朋友请发邮件到我的email，大家一起学习，一起进步！
 *
 * 在你的项目中的使用步骤：
 * 1，DOM中的input如需加入验证，请将input或textarea标签写在id为centerBody的容器内
 * 2，在该input中加入input的类别，例如创建一个用来输入用户名的input：data-sign="username"
 *    目前定义好的data-sign包括
 *      用户名  ：username
 *      密码    ：pwd
 *      验证密码 ：rePwd
 *      电子邮件 ：email
 *      地址    ：address
 *      姓名    ：name
 *      自我介绍 ：intro_self
 * 3，所有input默认为必填，如需设置为选填，请在input内加入控制代码：data-null="true"
 * 4，未列出所有验证情况，如电话验证等，如需要，请参照 inp_message.message.verification 的格式自行添加
 * 5，目前只支持input[type=text|password] | textarea标签的验证，其他标签暂时未提供
 */



/**
 * 状态
 * @type {{verArr: {}, warning: string, correct: string, illegal: string, focus: string, wait: string}}
 */
var inp_icon = {
    verArr : {},
    warning : "warning",
    correct : "correct",
    illegal : "error",
    focus : "focus",
    wait : "wait"
};

/**
 * 准备需要显示给用户的信息
 * @param obj 当前的jquery对象
 * @param sign 当前jquery对象的类型，在DOM的data-sign中声明
 * @param value 当前jquery对象的值
 * @param isNull 当前jquery对象是否允许空值，默认不允许空（data-null="false"），要设置为空请在DOM中声明data-null="true"
 */
function inp_message(obj, sign, value, isNull) {
    this.control = obj;
    this.sign = sign;
    this.value = value;
    this.null = isNull;
    if (this.value) {
        this.result = this.message.verification(this.sign, this.value);
    } else if (this.value == "") {
        this.result = this.message.null(this.null, this.sign);
    } else {
        this.result = this.message.prompt(this.sign);
    }
    this.control.siblings().remove();
    this.control.after(this.result);
    if (inp_icon.verArr[sign] == inp_icon.correct) {
        this.control.removeClass("illegal focus").addClass("correct");
    } else if (inp_icon.verArr[sign] == inp_icon.illegal) {
        this.control.removeClass("correct focus").addClass("illegal");
    } else if (inp_icon.verArr[sign] == inp_icon.warning) {
        this.control.removeClass("correct illegal").addClass("focus");
    }
    if(isNull){
        if(this.value != ""){
            this.control.removeClass("normal illegal focus").addClass("correct");
        } else {
            this.control.removeClass("correct illegal focus").addClass("normal");
        }
    }
}

/**
 * 配置验证信息及其返回
 * @type {{pre_message: Function, null: Function, verification: Function, prompt: Function}}
 */
inp_message.prototype.message = {
    pre_message : function(way){
        return "<span class='ui_info ui_" + way + "'><img src='img/" + way + ".png' />";
    },
    null : function(isNull, sign){
        if(!isNull){
            inp_icon.verArr[sign] = inp_icon.illegal;
            return this.pre_message(inp_icon.illegal) + "该项不能为空"
        }
    },
    verification : function(sign, value){ //验证
        switch(sign){
            case 'shopname':
                if(value.length > 1 && value.length < 101){
                    inp_icon.verArr[sign] = inp_icon.correct;
                    return this.pre_message(inp_icon.correct);
                }
                inp_icon.verArr[sign] = inp_icon.illegal;
                return this.pre_message(inp_icon.illegal) + "请输入餐店名称</span>";
            case 'phone':
                if(value.length > 1 && value.length < 101){
                    inp_icon.verArr[sign] = inp_icon.correct;
                    return this.pre_message(inp_icon.correct);
                }
                inp_icon.verArr[sign] = inp_icon.illegal;
                return this.pre_message(inp_icon.illegal) + "请输入餐厅电话</span>";
            case 'name_id':
                if(value.length > 1 && value.length < 101){
                    inp_icon.verArr[sign] = inp_icon.correct;
                    return this.pre_message(inp_icon.correct);
                }
                inp_icon.verArr[sign] = inp_icon.illegal;
                return this.pre_message(inp_icon.illegal) + "请输入真实姓名</span>";
            case 'number_id':
                if(value.length > 1 && value.length < 101){
                    inp_icon.verArr[sign] = inp_icon.correct;
                    return this.pre_message(inp_icon.correct);
                }
                inp_icon.verArr[sign] = inp_icon.illegal;
                return this.pre_message(inp_icon.illegal) + "请输入身份证号</span>";
            case 'detailed':
                if(value.length > 1 && value.length < 101){
                    inp_icon.verArr[sign] = inp_icon.correct;
                    return this.pre_message(inp_icon.correct);
                }
                inp_icon.verArr[sign] = inp_icon.illegal;
                return this.pre_message(inp_icon.illegal) + "请输入店铺的信息</span>";
            default:
                inp_icon.verArr[sign] = inp_icon.illegal;
                return this.pre_message(inp_icon.illegal) + "</span>";
        }
    },
    prompt : function(sign){
        inp_icon.verArr[sign] = inp_icon.warning;
        switch(sign){
            case 'username':
                return this.pre_message(inp_icon.warning) + "请输入6-20位以英文字母开头的英文和数字的组合</span>";
            case 'pwd':
                return this.pre_message(inp_icon.warning) + "请输入6-16位不含空格的字符组合</span>";
            case 'rePwd':
                return this.pre_message(inp_icon.warning) + "请重复输入一次密码</span>";
            case 'email':
                return this.pre_message(inp_icon.warning) + "请输入您的电子邮件地址</span>";
            case 'name':
                return this.pre_message(inp_icon.warning) + "请输入您的真实姓名</span>";
            case 'intro_self':
                return this.pre_message(inp_icon.warning) + "请输入店铺的的详细信息</span>";
            case 'address':
                return this.pre_message(inp_icon.warning) + "请输入您的详细地址</span>";
            default:
                return this.pre_message(inp_icon.warning) + "</span>";
        }
    }
};

var control_container = $("#centerBody input, #centerBody textarea");
control_container.addClass("ui_reset");
var ui_controls = $(".ui_reset"),
    submit = $("#submit");
ui_controls.wrap("<div class='ui_container'></div>");
ui_controls.attr("disabled", false);

var time = 4;
function add(){
    --time;
    submit.text("请先完成表单" + time);
    if(time <= 0){
        submit.removeClass("btn_disable").addClass("btn_enable").text("提 交");
    } else {
        setTimeout("add()", 1000);
    }
}

/**
 * 获得焦点
 */
ui_controls.focus(function(){
    var sign = $(this).data("sign");
    new inp_message($(this), sign);
});

/**
 * 失去焦点
 */
ui_controls.blur(function(){
    var sign = $(this).data("sign"),
        value = $(this).val(),
        isNull = $(this).data("null") || false;
    new inp_message($(this), sign, value, isNull);
});

/**
 * 提交
 */
submit.click(function(){
    if($(this).hasClass("btn_enable")){
        time = 4;
        $(".ui_reset").each(function(i, e){
            var sign = $(e).data("sign"),
                value = $(e).val(),
                isNull = $(e).data("null") || false;
            new inp_message($(e), sign, value, isNull);
        });
        var ver = true;
        $.each(inp_icon.verArr, function(i, e){
            if(e != inp_icon.correct){
                ver = false;
                return false;
            }
        });
        if(ver){
            $("#form").submit();
        } else {
            submit.removeClass("btn_enable").addClass("btn_disable");
            add();
        }
    }
});