<?php

/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

/* * ***************************Includes********************************* */
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
if (!class_exists('Transmission')) {
	require_once dirname(__FILE__) . '/../../3rdparty/TransmissionRPC.class.php';
}

class jeetransmission extends eqLogic {

	public static $_widgetPossibility = array('custom' => true);

	public function postUpdate() {
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'inprogress');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande inprogress');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Téléchargements en cours', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('inprogress');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'finish');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande finish');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Torrents terminés', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('finish');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'pause');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande pause');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Torrents en pause', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('pause');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'list');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande list');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Liste des torrents', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('list');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('string');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'download');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande download');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Vitesse de download', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('download');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'upload');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande upload');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Vitesse de upload', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('upload');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'limitdown');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande limitdown');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Limite de download', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('limitdown');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'limitup');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande limitup');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Limite de upload', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('limitup');
			$jeetransmissionCmd->setType('info');
			$jeetransmissionCmd->setSubType('numeric');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'setlimitdown');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande setlimitdown');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Fixer la limite de download', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('setlimitdown');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'setlimitup');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande setlimitup');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Fixer la limite de upload', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('setlimitup');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'remove');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande remove');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Enlever un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('remove');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'purge');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande purge');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Purger un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('purge');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'add');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande add');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Ajouter un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('add');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'stop');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande stop');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Arrêter un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('stop');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'start');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande start');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Démarrer un torrent', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('start');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('message');
			$jeetransmissionCmd->save();
		}
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'query');
		if (!is_object($jeetransmissionCmd)) {
			log::add('jeetransmission', 'debug', 'Création de la commande query');
			$jeetransmissionCmd = new jeetransmissionCmd();
			$jeetransmissionCmd->setName(__('Rafraichir les informations de Transmission', __FILE__));
			$jeetransmissionCmd->setEqLogic_id($this->id);
			$jeetransmissionCmd->setEqType('jeetransmission');
			$jeetransmissionCmd->setLogicalId('query');
			$jeetransmissionCmd->setType('action');
			$jeetransmissionCmd->setSubType('other');
			$jeetransmissionCmd->save();
		}
		$this->btStatus();
	}

	public function cronHourly() {
		log::add('jeetransmission', 'debug', 'etat hourly');
		foreach (eqLogic::byType('jeetransmission', true) as $jeetransmission) {
			$jeetransmission->btStatus();
		}
	}

	public function btStatus() {
		$transmission = new TransmissionRPC($this->getConfiguration('url'), $this->getConfiguration('user'), $this->getConfiguration('password'));
		$transmission->return_as_array = true;
		$torrent  = $transmission->sstats(); // inprogress, finish, pause, upload, download
		$active = (array_key_exists('activeTorrentCount',$torrent['arguments'])) ? $torrent['arguments']['activeTorrentCount'] : '0';
		$pause = (array_key_exists('pausedTorrentCount',$torrent['arguments'])) ? $torrent['arguments']['pausedTorrentCount'] : '0';
		$download = (array_key_exists('downloadSpeed',$torrent['arguments'])) ? $torrent['arguments']['downloadSpeed'] : '0';
		$download = round($download / 1024, 2);
		$upload = (array_key_exists('uploadSpeed',$torrent['arguments'])) ? $torrent['arguments']['uploadSpeed'] : '0';
		$upload = round($upload / 1024, 2);

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'inprogress');
		if ($active != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$active);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($active);
		}

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'pause');
		if ($pause != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$pause);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($pause);
		}

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'upload');
		if ($upload != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$upload);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($upload);
		}

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'download');
		if ($download != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$download);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($download);
		}

		//log::add('jeetransmission', 'debug', print_r($torrent));

		$torrent  = $transmission->get(); //list
		$list = '[';
		$finish = 0;
		foreach ($torrent['arguments']['torrents'] as $value) {
			if ($list != '[') {
				$list .= ',';
			}
			$list .= '{"id":"' . $value['id'] . '","name":"' . $value['name'] . '","status":"' . $value['status'] . '"}';
			if ($value['doneDate'] != '0') {
				$finish ++;
			}
		}
		$list .= ']';

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'finish');
		if ($finish != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$finish);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($finish);
		}

		//log::add('jeetransmission', 'debug', print_r($torrent));
		//log::add('jeetransmission', 'debug', $list);
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'list');
		$jeetransmissionCmd->setConfiguration('value',$list);
		$jeetransmissionCmd->save();
		$jeetransmissionCmd->event($list);

		$torrent  = $transmission->sget(); //list
		$down = (array_key_exists('speed-limit-down-enabled',$torrent['arguments'])) ? $torrent['arguments']['speed-limit-down'] : '0';
		$up = (array_key_exists('speed-limit-up-enabled',$torrent['arguments'])) ? $torrent['arguments']['speed-limit-up'] : '0';

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'limitup');
		if ($up != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$up);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($up);
		}

		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'limitdown');
		if ($down != $jeetransmissionCmd->getConfiguration('value')) {
			$jeetransmissionCmd->setConfiguration('value',$down);
			$jeetransmissionCmd->save();
			$jeetransmissionCmd->event($down);
		}

		$this->refreshWidget();
	}

	public function toHtml($_version = 'dashboard') {
		$replace = $this->preToHtml($_version);
		if (!is_array($replace)) {
			return $replace;
		}
		$version = jeedom::versionAlias($_version);
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'inprogress');
		$replace['#torrent#'] = $jeetransmissionCmd->getConfiguration('value');
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'download');
		$replace['#download#'] = $jeetransmissionCmd->getConfiguration('value');
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'upload');
		$replace['#upload#'] = $jeetransmissionCmd->getConfiguration('value');
		$replace['#link#'] = $this->getConfiguration('link');
		$jeetransmissionCmd = jeetransmissionCmd::byEqLogicIdAndLogicalId($this->getId(),'query');
		$replace['#refresh_id#'] = $jeetransmissionCmd->getId();
		$replace['#id#'] = $this->getId();

		return $this->postToHtml($_version, template_replace($replace, getTemplate('core', $version, 'jeetransmission', 'jeetransmission')));
	}

}

class jeetransmissionCmd extends cmd {
	public function preSave() {
		if ($this->getSubtype() == 'message') {
			$this->setDisplay('message_disable', 1);
		}
	}

	public function execute($_options = null) {
		switch ($this->getType()) {
			case 'info' :
			return $this->getConfiguration('value');
			break;

			case 'action' :
			$eqLogic = $this->getEqLogic();
			$transmission = new TransmissionRPC($eqLogic->getConfiguration('url'), $eqLogic->getConfiguration('user'), $eqLogic->getConfiguration('password'));
			$transmission->return_as_array = true;
			log::add('jeetransmission', 'debug', $this->getLogicalId() . ' ' . $_options['title'] . ' ' . $eqLogic->getConfiguration('url'));
			switch ($this->getLogicalId()) {
				case 'query' :
				$eqLogic->btStatus();
				break;
				case 'remove' :
				try
				{
					$result  = $transmission->remove(intval($_options['title']));
				} catch (Exception $e) {
				  die('[ERROR] ' . $e->getMessage() . PHP_EOL);
				}
				break;
				case 'purge' :
				$result  = $transmission->remove(intval($_options['title']), true);
				break;
				case 'start' :
				$result  = $transmission->start(intval($_options['title']));
				break;
				case 'stop' :
				$result  = $transmission->stop(intval($_options['title']));
				break;
				case 'add' :
				$result  = $transmission->add(intval($_options['title']));
				break;
				case 'setlimitup' :
				if (trim($_options['title']) == '0') {
					$result  = $transmission->sset(array('speed-limit-up-enabled' => 0));
				} else {
					$result  = $transmission->sset(array('speed-limit-up' => intval(trim($_options['title'])),'speed-limit-up-enabled' => 1));
				}
				break;
				case 'setlimitdown' :
				if (trim($_options['title']) == '0') {
					$torrent  = $transmission->sset(array('speed-limit-down-enabled' => 0));
				} else {
					//$torrent  = $transmission->sset(array('speed-limit-down' => trim($_options['title'], 'speed-limit-down-enabled' => 1)));
					$torrent  = $transmission->sset(array('speed-limit-down' => intval(trim($_options['title'])), 'speed-limit-down-enabled' => 1));
				}
				break;
			}
			return true;
			break;
		}
	}

}

?>
