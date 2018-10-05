# ssrR Detector 
根据配置执行对vultr托管的SSR的监控和创建，并且提供一个对外可访问的订阅源

## 翻墙工具使用说明
本工具是在Vultr.com上购买的虚拟机搭建而成，可以实现10分钟级别自动IP封禁检测和替换，只需要添加更新订阅即可无忧使用。

具体使用步骤如下：
### Mac
1. 下载客户端软件 ShadowsocksX-NG-R8

下载地址：https://github.com/flowithwind/ShadowsocksX-NG-R8-Bakup/blob/master/ShadowsocksX-NG-R8.dmg

还没太搞清楚，不过貌似和ShadowsocksX-NG不是一个项目，NG不支持订阅功能，-_-||
2. 安装到本机，可能需要手工拷贝到应用程序文件夹。
3. 启动APP，在上方状态栏可以找到一个纸飞机的icon 
4. 单击图标后选择：服务器->编辑订阅
5. 在打开的页面中输入
> 订阅地址： http://116.85.23.78/feed.php
> 
> 口令（留空即可）：
> 
> 组名：auto
> 
> 最大数量（默认值）: -1
> 
6. 编辑完成后点击OK保存，可以再手工触发一次订阅更新拉取最新的服务器信息。

注意：

1. 使用中发现这个订阅属于合并追加式的使用，可以自动获取新加入的资源，但是旧的废弃IP需要手工删除，大家用的时候记得不通的时候选择一下服务器。
2. 可以把“显示网速”勾上，这样已经被墙的IP就能显示出来了。

### 其他平台
原理类似，因为本代理是用的shadowsocksR的协议实现，所以只要是能够支持ssr://并且支持订阅的就都可以使用。

客户端软件：
* https://github.com/shadowsocksr-backup/shadowsocks-rss  这个是官方项目的某个fork备份，可以作为源头
* https://github.com/erguotou520/electron-ssr   这个不推荐，一个是python的lib依赖有问题，一个是软件稳定性不好，断开连接后不能自动重连。
* https://github.com/yjij/avege/tree/master  官方推荐，我没用过

## 开发向的一些说明
* https://github.com/flowithwind/ssrR_detector  检测工具项目源码
* Vultr.com   翻墙服务器服务提供商
* didiyun.com    检测和管理工具不熟服务提供商，感谢沈老板友情赞助服务器费用。

## 捐助和贡献
欢迎推荐靠谱的各平台客户端软件，可以直接发送push merge request 更新README.md。
服务器费用由 flowithwind@github 个人负担，每月成本 5刀/台，欢迎支付宝(flowithwind@gmail.com)友情赞助。
