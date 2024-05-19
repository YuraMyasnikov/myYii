if( !$this->load($param) && !$this->validate())
{
return $dataProvider;
}

$query->andFilterWhere(['id' => $this->id]);
$query->andFilterWhere(['like', 'name', $this->name]);
$query->andFilterWhere(['like', 'email', $this->email]);
if(!empty($this->startDay)) {
$startTimestamp = $this->startDay;
//            $dateFromDay = new \DateTime($this->startDay);
//            $dateFromDay->setTime(0,0,0);
if(!empty($this->startClock)) {
$startTimestamp .= ' ' . $this->startClock . ':00';
//                $dateFromClock = new \DateTime($this->startDay);
//                $dateFromClock->setTime(0,0,0);
//                $query->andFilterWhere(['>=', 'created_at', $dateFromClock->format('H:i:s')]);
//                $this->startDay .= ' ' . $this->startClock . ':00';
}
$query->andFilterWhere(['>=', 'created_at', $startTimestamp]);

}
if(!empty($this->finishDay)) {
$dateToDay = new \DateTime($this->finishDay);
$dateToDay->setTime(23,59,59);
if($this->finishClock) {
$clock = explode(':', $this->finishClock);
$dateToDay->setTime($clock[0],$clock[1],$clock[2] ?? 59);
}
$query->andFilterWhere(['<=', 'created_at', $dateToDay->format('Y-m-d H:i:s')]);
//dd($query->createCommand()->getRawSql());
}
//        if(!empty($this->finishDay)) {
//            $dateToDay = new \DateTime($this->finishDay);
//            $dateToDay->setTime(23,59,59);
//
//            $query->andFilterWhere(['<=', 'created_at', $dateToDay->format('Y-m-d H:i:s')]);
//        }
//
//
//        if(!empty($this->finishClock)) {
//            $dateToClock = new \DateTime($this->finishDay);
//            $dateToClock->setTime(23,59,59);
//
//            $query->andFilterWhere(['<=', 'created_at', $dateToClock->format('H:i:s')]);
//        }