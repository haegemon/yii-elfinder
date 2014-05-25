/**
 * Автор: Beaten_Sect0r
 * http://fault.ws
 */

Yii обёртка для https://github.com/Studio-42/elFinder

Установка
Скачать и распаковать в extensions.
Добавить в view, поправить путь до action:
<?php $this->widget('ext.yii-elfinder.elFinder', array('url' => Yii::app()->request->hostInfo . '/site/elfinder/')); ?>

Добавить в контроллер:
	public function actions()
	{
		return array(
			'elfinder' => "ext.yii-elfinder.elFinderConnectorAction",
		);
	}

Если используется CSRF token - нужно добавить action в исключения http://www.yiiframework.com/forum/index.php/topic/14173-disable-csrf-token-validation-for-certain-paths
