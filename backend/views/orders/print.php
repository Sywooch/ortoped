<?php if (isset($model)): ?>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<style>
			.table-bordered>tbody>tr>th{text-align: center; background: #f1efef; }
			.table-bordered>tbody>tr>td{text-align: center;}
			.first_td:nth-child(1){width:20%; }
			td li{list-style-type:none }
			.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {padding: 5px 5px!important; }
			table>tbody>tr>td.base{vertical-align: middle; display: table-cell; }
			.container{page-break-after:always; }
		</style>
	</head>
	<div class="container">
		<h4> 
			<span>ЗАКАЗ-НАРЯД НА ПРОИЗВОДСТВО №<?php echo $model->num ?></span>
			<span class="pull-right">ТОО &quot;SmartForce&quot;</span>
		</h4><br>

		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>Дата</td>
					<td colspan="5"><?php echo date('d.m.Y', strtotime($model->date)) ?></td>
				</tr>
				<tr>
					<td>Код пациента</td>
					<td colspan="5"><?php echo $model->pacient_code ?></td>
				</tr>
				<tr>
					<td>ФИО Пациента</td>
					<td colspan="5">XXX</td>
				</tr>
				<tr>
					<td>Челюсть (В, Н, ВН)</td>
					<td colspan="5"><?=$model->scull_type?></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<h3 class="text-center">Наименовании продукции</h3>
			<tr>
				<td rowspan="2" class="base">Элайнер</td>
				<td colspan="2">Коррекция</td>
				<td rowspan="2" class="base">Ретейнер</td>
				<td rowspan="2" class="base">Бесплатный элайнер</td>
				<td rowspan="2" class="base">Клинические исследования</td>
			</tr>
			<tr>
				<td>Платная</td>
				<td>Бесплатная</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<tbody>
			<h3 class="text-center">Заказ</h3>
			<tr>
				<td>Заказ</td>
				<td>Планируемое кол-во по ВП</td>
				<td>Количество на изготовление</td>
				<td>Этап ВЧ</td>
				<td>Этап НЧ</td>
				<td></td>
			</tr>
			<tr>
				<td>Количество моделей</td>
				<td><?=$model->count_models_vp?></td>
				<td><?=$model->count_models?></td>
				<td><?=$model->count_models_vc?></td>
				<td><?=$model->count_models_nc?></td>
				<td></td>
			</tr>
			<tr>
				<td>Количество элайнеров (кап)</td>
				<td><?=$model->count_elayners_vp?></td>
				<td><?=$model->count_elayners?></td>
				<td><?=$model->count_elayners_vc?></td>
				<td><?=$model->count_elayners_nc?></td>
				<td></td>
			</tr>
			<tr>
				<td>Количество аттачментов (кап)</td>
				<td><?=$model->count_attachment_vp?></td>
				<td><?=$model->count_attachment?></td>
				<td><?=$model->count_attachment_vc?></td>
				<td><?=$model->count_attachment_nc?></td>
				<td></td>
			</tr>
			<tr>
				<td>Количество Check-point (кап)</td>
				<td><?=$model->count_checkpoint_vp?></td>
				<td><?=$model->count_checkpoint?></td>
				<td><?=$model->count_checkpoint_vc?></td>
				<td><?=$model->count_checkpoint_nc?></td>
				<td></td>
			</tr>
			<tr>
				<td>Количество ретейнеров (кап)</td>
				<td><?=$model->count_reteiners_vp?></td>
				<td><?=$model->count_reteiners?></td>
				<td><?=$model->count_reteiners_vc?></td>
				<td><?=$model->count_reteiners_nc?></td>
				<td></td>
			</tr>
			<tr>
				<td>Всего кап</td>
				<td>
					<?php echo $model->count_models_vp + $model->count_elayners_vp + $model->count_attachment_vp + $model->count_checkpoint_vp + $model->count_reteiners_vp?>
				</td>
				<td>
					<?php echo $model->count_models + $model->count_elayners + $model->count_attachment + $model->count_checkpoint + $model->count_reteiners?>
				</td>
				<td>
					<?php echo $model->count_models_vc + $model->count_elayners_vc + $model->count_attachment_vc + $model->count_checkpoint_vc + $model->count_reteiners_vc?>
				</td>
				<td>
					<?php echo $model->count_models_nc + $model->count_elayners_nc + $model->count_attachment_nc + $model->count_checkpoint_nc + $model->count_reteiners_nc?>
				</td>
				<td></td>
			</tr>

			<tr>
				<td colspan="6">Заполняется бухгалтером</td>
			</tr>
			<tr>
				<td colspan="6" >Стоимость по прайсу и предыдущие оплаты</td>
			</tr>
			<tr>
				<td rowspan="2" class="base">Стоимость по прайсу</td>
				<td rowspan="2" class="base">Стоимость с учетом скидки</td>
				<td colspan="2">Оплата на дату заказа</td>
				<td colspan="2">Элайнеры</td>
			</tr>
			<tr>
				<td>План</td>
				<td>Факт</td>
				<td>Отпущено</td>
				<td>Оплачено</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
	</table>
	<table class="table table-bordered">
		<tbody>
			<p><span>Сумма задолженности (при наличии)</span><span class="pull-right">_______________________</span></p>
			<tr>
				<td>Подлежит к оплате по заказу</td>
				<td>Оплачено по заказу</td>
				<td>Дата оплаты</td>
				<td>Долг по заказу</td>
				<td>Дата планируемого погашения</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan=2>Основание скидки/долга/бесплатного отпуска (при наличии)</td>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td colspan="2">Разрешить печать со скидкой/долгом/бесплатно (подписывается руководителем)</td>
				<td></td>
				<td colspan="2"></td>
			</tr>

			<tr>
				<td>Бухгалтер</td>
				<td colspan="2">_____________________________</td>
				<td colspan="2">_________</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">ФИО</td>
				<td colspan="2">Подпись</td>
			</tr>
			<tr>
				<td>Техник</td>
				<td colspan="2">_____________________________</td>
				<td colspan="2">_________</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">ФИО</td>
				<td colspan="2">Подпись</td>
			</tr>
			<tr>
				<td>Руководитель</td>
				<td colspan="2">_____________________________</td>
				<td colspan="2">_________</td>
				<tr>
					<td></td>
					<td colspan="2">ФИО</td>
					<td colspan="2">Подпись</td>
				</tr>
			</tbody>
		</table>
	</div><div class="container">
	<h4 class="text-right">Приложение № </h4>
	<h4 class="text-right">к Договору №____ от «___» _______ 201___г.</h4>
	<h3 class="clearfix"><a class="navbar-brand " href="#">«ORTHOLINER»</a></h3><br>
	<h4><span class="pull-left">БЛАНК ЗАКАЗА на изготовление элайнеров №____</span>  		<span class="pull-right">«____»_____________ 201___г.</span></h4><br><br>
	<table class="table table-bordered">
		<tbody>
			<tr> <th colspan="2" >ПАСПОРТНАЯ ЧАСТЬ</th> </tr> <tr> <th colspan="2">ЗАКАЗЧИК</th> </tr>
			<tr>
				<td class="first_td">ФИО Врача</td>
				<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit suscipit repellat aspernatur eum architecto omnis amet eos? Temporibus sint earum, autem recusandae fuga vitae eos excepturi sunt officia saepe alias?</td>
			</tr>
			<tr>
				<td class="first_td">Специализация</td>
				<td></td>
			</tr>
			<tr>
				<td class="first_td">Название Клиникиа</td>
				<td></td>
			</tr>
			<tr>
				<td class="first_td">Телефон</td>
				<td></td>
			</tr>
			<tr>
				<td class="first_td">e-mail</td>
				<td></td>
			</tr>

			<tr> <th colspan="2">ПАЦИЕНТ</th> </tr>
			<tr>
				<td class="first_td">ФИО Пациента</td>
				<td></td>
			</tr>
			<tr>
				<td class="first_td">Дата рождения</td>
				<td></td>
			</tr>
			<tr>
				<td class="first_td">Пол</td>
				<td></td>
			</tr>
			<tr>
				<td class="first_td">Диагноз</td>
				<td></td>
			</tr>

			<tr>
				<th colspan="2">ЗУБНАЯ ФОРМУЛА<br>
					Сокращения исп. в таблице ниже: С – кариес; Р – пульпит; Pt – периодонтит;F – резорцин-формалиновый зуб; П – пломба; A –пародонтит, пародонтоз , в скобках (I-IV) - степень  подвижности; К – коронка; И – искусственный  зуб; О – отсутствующий зуб; R – корень; I –имплантат.
				</th>
			</tr>

		</table>
		<table class="table table-bordered ">
			<tbody>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr>
				<tr><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
			</tbody>
		</table>
		<table class="table table-bordered ">
			<tbody>
				<tr> <th colspan="7">ПЛАН ЛЕЧЕНИЯ</th> </tr>
				<tr> <th colspan="7">ИСПРАВЛЕНИЕ ЗУБНОЙ ДУГИ</th> </tr>
				<tr> <th rowspan="2" class="base">ЗУБНАЯ ДУГА</th> <th colspan="3">ВЕРХНЯЯ ЧЕЛЮСТЬ</th> <th colspan="3">НИЖНЯЯ ЧЕЛЮСТЬ</th> </tr>
				<tr> <th>ОСТАВИТЬ КАК ЕСТЬ</th> <th>РАСШИРИТЬ</th> <th>СУЗИТЬ</th> <th>ОСТАВИТЬ КАК ЕСТЬ</th> <th>РАСШИРИТЬ</th> <th>СУЗИТЬ</th> </tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered ">
			<tbody>
				<tr> <th colspan="10">Соотношение резцов</th> </tr>
				<tr> <td rowspan="2" class="base">Соотношение резцов по трансверзали (средняя линия) </td> <td colspan="5">не менять</td> <td colspan="5">улучшить</td> </tr>
				<tr> <td colspan="5"></td> <td colspan="5"></td> </tr>
				<tr> <td rowspan="3">По Сагиттали</td> <td colspan="3">верхние</td> <td colspan="3">нижние</td> <td colspan="3">сагиттальная щель</td> </tr>
				<tr> <td>Не менять</td> <td>Устранить протрузию</td> <td>Устранить ретрузию</td> <td>Не менять</td> <td>Устранить протрузию</td> <td>Устранить ретрузию</td> <td>Не менять</td> <td>Устранить протрузию</td> <td>Устранить ретрузию</td> </tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<tbody>
				<tr> <th rowspan="3">ВЕРТИКАЛЬНОЕ ПЕРЕКРЫТИЕ</th> <th colspan="3">Верхние</th> <th colspan="3">Нижние</th> </tr>
				<tr> <td>Не менять</td> <td>Интрузия</td> <td>Экструзия</td> <td>Не менять</td> <td>Интрузия</td> <td>Экструзия</td> </tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>	
		</table> 
		<table class="table table-bordered">
			<tbody>
				<tr><th colspan="7">СООТНОШЕНИЕ ЗУБОВ ПОСЛЕ ЛЕЧЕНИЯ (отметить)</th></tr>
				<tr> <th>СООТНОШЕНИЕ ЗУБОВ</th> <th colspan="3">R</th> <th colspan="3">L</th> </tr>
				<tr>
					<td>ПЕРВЫХ МОЛЯРОВ</td>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>1</td>
					<td>2</td>
					<td>3</td>
				</tr>
				<tr> <th rowspan="2">ЗА СЧЕТ ЧЕГО? (способ) </th> <td colspan="2">Дистализация</td> <td colspan="2">Мезиализация</td> <td colspan="2">Сепарация</td> </tr>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"></td>
					<td colspan="2"></td>
				</tr>
			</tbody>
		</table>	
		<table class="table table-bordered">
			<tbody>
				<tr><th colspan="16">УДАЛЕНИЕ (отметить планируемые к удалению зубы)</th></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr>
				<tr><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

				<tr><th colspan="16">ЗУБЫ НЕТРЕБУЮЩИЕ ПЕРЕМЕЩЕНИЯ (отметить)</th></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr>
				<tr><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

				<tr><th colspan="16">НЕВОЗМОЖНО УСТАНОВИТЬ АТТАЧМЕНТЫ (отметить)</th></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr>
				<tr><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

				<tr><th colspan="16">ИЗМЕНИТЬ ПОЛОЖЕНИЕ ЗУБОВ</th></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr>
				<tr><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>

				<tr><th colspan="16">ПЛАНИРУЕМЫЕ ПРОТЕЗЫ / ИМПЛАНТЫ (отметить место и размеры в мм.)</th></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr><td>18</td><td>17</td><td>16</td><td>15</td><td>14</td><td>13</td><td>12</td><td>11</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td></tr>
				<tr><td>48</td><td>47</td><td>46</td><td>45</td><td>44</td><td>43</td><td>42</td><td>41</td><td>31</td><td>32</td><td>33</td><td>34</td><td>35</td><td>36</td><td>37</td><td>38</td></tr>
				<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
				<tr> <th colspan="16">КОММЕНТАРИИ</th> </tr>

				<tr>
					<td colspan="16">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus porro voluptate culpa suscipit soluta, neque reiciendis iste deserunt commodi maxime facere distinctio itaque reprehenderit tempora a alias, accusamus modi vel.
						Hic cumque, odit tempore soluta, magni quod quae tempora odio amet. Rerum eum ipsa, nam iusto sunt autem fuga quam voluptates deleniti ipsam molestias officiis in commodi culpa temporibus. Dolores?
						Eligendi molestiae commodi nihil rem dicta aperiam facilis, illum, harum odit reiciendis porro veritatis dolor ipsam eveniet repellat laudantium voluptatibus cumque? Amet vel, alias blanditiis nemo obcaecati aspernatur suscipit officia?
						Ipsum cumque, deserunt dolorum vitae quo architecto, dignissimos odit delectus, debitis est autem non nostrum placeat hic quisquam maiores esse. Tenetur, inventore, amet. 
					</td>
				</tr>
				<tr><th colspan="16">Врач предоставил</th></tr>
				<tr>
					<td colspan="16" style="padding:20px 40px">
						<li class="text-left"><label><input type="checkbox"> Диагностические гипсовые модели</label></li>
						<li class="text-left"><label><input type="checkbox"> Оттиски</label></li>
						<li class="text-left"><label><input type="checkbox"> Прикусной валик</label></li>
						<li class="text-left"><label><input type="checkbox"> Ортопантогмограмму/ Телерентгенограмма</label></li>
						<li class="text-left"><label><input type="checkbox"> Фотографии Пациента анфас и профиль, улыбки Пациента, внутриротовой снимок слева, справа, центр</label></li>
						<li class="text-left">Оплата в сумме: ___________ тенге</li>
					</td>
				</tr>
			</tbody>
		</table>
		<div>
			<span>ФИО Врача__________________________</span>
			<span class="pull-right">Подпись_________________________</span>
			<div class="clearfix"></div><br>
			<h5>Лаборатория <strong>«SmartForce»</strong>, 010000, г. Астана,  пр.Туран, 19/1, БЦ "ЭДЕМ", оф.505 Тел.: +7 (717) 246 -96-92, <i>info@ortholiner.kz</i></h5>
		</div>
	</div><!-- end of container-->				

	<div class="container">
		<a href="#">ORTHOLINER</a><br>
		<h5>Бланк заказ для изготовления ретенционной капы/капы для лечения бруксизма №_____ </h5>
		<h5>«   » _______ 201__г.</h5><br>
		<table class="table table-bordered">
			<tbody>
				<tr><th colspan="2">ПАСПОРТНАЯ ЧАСТЬ</th></tr>
				<tr><th colspan="2">ЗАКАЗЧИК</th></tr>
				<tr>
					<td class="first_id">ФИО Врача</td>
					<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque provident veritatis ad aut magni, culpa sit a optio perspiciatis deserunt maiores blanditiis labore quasi illum corporis eum laudantium porro placeat.</td>
				</tr>
				<tr>
					<td>Специализация</td>
					<td></td>
				</tr>
				<tr>
					<td>Название Клиники</td>
					<td></td>
				</tr>
				<tr>
					<td>Почтовый адрес</td>
					<td></td>
				</tr>
				<tr>
					<td>Телефон</td>
					<td></td>
				</tr>
				<tr>
					<td>e-mail</td>
					<td></td>
				</tr>
				<tr><th colspan="2">ПАСПОРТНАЯ ЧАСТЬ</th></tr>
				<tr>
					<td class="first_id">ФИО Пациента</td>
					<td></td>
				</tr>
				<tr>
					<td>Дата рождения</td>
					<td></td>
				</tr>
				<tr>
					<td>Пол</td>
					<td></td>
				</tr>
				<tr>
					<th colspan="2">Ретенционная капа/капа для бруксизма (нужное подчеркнуть, указать количество, но не менее 2 на 1 челюсть)</th>
				</tr>
				<tr>
					<td>Верхняя челюсть</td>
					<td></td>
				</tr>
				<tr>
					<td>Нижняя челюсть</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="container">
			<span>ФИО представителя Заказчика_________________ </span>
			<span class="pull-right">Подпись_________________________</span>
			<div class="clearfix"></div><br>
			<span>ФИО представителя Исполнителя ______________</span>
			<span class="pull-right">Подпись_________________________</span>
			<div class="clearfix"></div><br>
			<h5 class="text-center">Лаборатория <strong>«SmartForce»</strong>, 010000, г. Астана,  пр.Туран, 19/1, БЦ "ЭДЕМ", оф.505 Тел.: +7 (717) 246 -96-92, <i>info@ortholiner.kz</i></h5><br>
			<div class="row">
				<div class="col-md-5">
					<strong class="text-center">Исполнитель:</strong><br>
					<strong>Юридический адрес</strong>: Республика Казахстан, г.Астана, 010000,  ул.Сыганак 10, к.481 <br>
					<strong>Фактический адрес</strong>: Республика Казахстан, г. Астана, 010000, район «Есиль», ул. Туран, д 19/1., оф. 505. <br>
					<strong>БИН</strong>: 150 540 012 596 <br>	
					<strong>Филиал АО «Банк RBK»</strong><br>
					<strong>ИИК</strong>: KZ4 182 104 398 121 591 61 <br>	
					<strong>БИК</strong>: KINCKZKA <br><br>

					<p class="text-right"><strong>___________________ Сарбупин Н.С. <br> 
						м.п.
					</strong></p>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-5">
					<p>
						<strong class="text-center">Заказчик:</strong><br>
						<strong>Юридический адрес</strong>: _____________ 	<br>	
						<strong>Фактический адрес</strong>: Республика Казахстан
						010000, г.Астана, район «_______________», 
						___________________ 
					</p>
					<p>
						<strong>
							ИИН: <br> 
							АО « _________БАНК»<br>
							ИИК: ________________________ <br>	
							БИК: ________________________ <br>
						</strong>	
					</p>
					<p class="text-right">__________________ _____________ <br> м.п.</p>
				</div>
			</div><!--end of row-->
		</div><!--end of container-->

		<div class="container">
			<h4 class="text-right">Приложение № </h4>
			<h4 class="text-right">к Договору №____ от «___» _______ 201___г.</h4>
			<h3 class="clearfix"><a class="navbar-brand " href="#">«ORTHOLINER»</a></h3><br>
			<h4><span class="pull-left">ВИРТУАЛЬНЫЙ ПЛАН ЛЕЧЕНИЯ № _____</span>  		<span class="pull-right">«____»_____________ 201___г.</span></h4><br><br>
			<table class="table table-bordered">
				<tbody>
					<tr><th colspan="2">ПАСПОРТНАЯ ЧАСТЬ</th></tr>
					<tr><th colspan="2">ЗАКАЗЧИК</th></tr>
					<tr>
						<td class="first_id">ФИО Врача</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo itaque libero dolorem quidem illo repellat minus fuga provident ducimus atque beatae officiis pariatur repellendus animi tempora asperiores, cumque iste et!</td>
					</tr>
					<tr>
						<td>Специализация</td>
						<td></td>
					</tr>
					<tr>
						<td>Название Клиники</td>
						<td></td>
					</tr>
					<tr>
						<td>Почтовый адрес</td>
						<td></td>
					</tr>
					<tr>
						<td>Телефон</td>
						<td></td>
					</tr>
					<tr>
						<td>e-mail</td>
						<td></td>
					</tr>
					<tr><th colspan="2">ПАСПОРТНАЯ ЧАСТЬ</th></tr>
					<tr>
						<td class="first_id">ФИО Пациента</td>
						<td></td>
					</tr>
					<tr>
						<td>Дата рождения</td>
						<td></td>
					</tr>
					<tr>
						<td>Пол</td>
						<td></td>
					</tr>
					<tr>
						<th colspan="2">ЭТАПЫ ЛЕЧЕНИЯ (изображение, план лечения в приложении)</th>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
				</tbody>
			</table>
			<div class="container">
				<p class="text-center">Виртуальный план лечения подготовил:</p><br>
				<span>ФИО представителя Исполнителя ______________ </span>
				<span class="pull-right">Подпись_________________________</span>
				<div class="clearfix"></div><br><br>
				<p class="text-center">С виртуальным планом лечения ознакомлены. С результатами согласны. </p><br>
				<span>ФИО представителя Заказчика_________________</span>
				<span class="pull-right">Подпись_________________________</span>
				<div class="clearfix"></div><br>
				<span>ФИО пациента______________</span>
				<span class="pull-right">Подпись_________________________</span>
				<div class="clearfix"></div><br>
				<h5 class="text-center">Лаборатория <strong>«SmartForce»</strong>, 010000, г. Астана,  пр.Туран, 19/1, БЦ "ЭДЕМ", оф.505 Тел.: +7 (717) 246 -96-92, <i>info@ortholiner.kz</i></h5><br>
				<div class="row">
					<div class="col-md-5">
						<strong class="text-center">Исполнитель:</strong><br>
						<strong>Юридический адрес</strong>: Республика Казахстан, г.Астана, 010000,  ул.Сыганак 10, к.481 <br>
						<strong>Фактический адрес</strong>: Республика Казахстан, г. Астана, 010000, район «Есиль», ул. Туран, д 19/1., оф. 505. <br>
						<strong>БИН</strong>: 150 540 012 596 <br>	
						<strong>Филиал АО «Банк RBK»</strong><br>
						<strong>ИИК</strong>: KZ4 182 104 398 121 591 61 <br>	
						<strong>БИК</strong>: KINCKZKA <br><br>
						<p class="text-right"><strong>___________________ Сарбупин Н.С. <br> 
							м.п.
						</strong></p>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-5">
						<p>
							<strong class="text-center">Заказчик:</strong><br>
							<strong>Юридический адрес</strong>: _____________ 	<br>	
							<strong>Фактический адрес</strong>: Республика Казахстан
							010000, г.Астана, район «_______________», 
							___________________ 
						</p>
						<p>
							<strong>
								ИИН: <br> 
								АО « _________БАНК»<br>
								ИИК: ________________________ <br>	
								БИК: ________________________ <br>
							</strong>	
						</p>
						<p class="text-right">__________________ _____________ <br> м.п.</p>
					</div>
				</div>
			</div><!--end of container-->

		<?php endif; ?>
