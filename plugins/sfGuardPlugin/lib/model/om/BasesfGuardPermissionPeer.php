<?php


abstract class BasesfGuardPermissionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_permission';

	
	const CLASS_DEFAULT = 'plugins.sfGuardPlugin.lib.model.sfGuardPermission';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_guard_permission.ID';

	
	const NAME = 'sf_guard_permission.NAME';

	
	const DESCRIPTION = 'sf_guard_permission.DESCRIPTION';

	
	const MODULE_NAME = 'sf_guard_permission.MODULE_NAME';

	
	const ACTION_NAME = 'sf_guard_permission.ACTION_NAME';

	
	const SORT_ORDER = 'sf_guard_permission.SORT_ORDER';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Description', 'ModuleName', 'ActionName', 'SortOrder', ),
		BasePeer::TYPE_COLNAME => array (sfGuardPermissionPeer::ID, sfGuardPermissionPeer::NAME, sfGuardPermissionPeer::DESCRIPTION, sfGuardPermissionPeer::MODULE_NAME, sfGuardPermissionPeer::ACTION_NAME, sfGuardPermissionPeer::SORT_ORDER, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'description', 'module_name', 'action_name', 'sort_order', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Description' => 2, 'ModuleName' => 3, 'ActionName' => 4, 'SortOrder' => 5, ),
		BasePeer::TYPE_COLNAME => array (sfGuardPermissionPeer::ID => 0, sfGuardPermissionPeer::NAME => 1, sfGuardPermissionPeer::DESCRIPTION => 2, sfGuardPermissionPeer::MODULE_NAME => 3, sfGuardPermissionPeer::ACTION_NAME => 4, sfGuardPermissionPeer::SORT_ORDER => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'description' => 2, 'module_name' => 3, 'action_name' => 4, 'sort_order' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardPermissionMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardPermissionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfGuardPermissionPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(sfGuardPermissionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardPermissionPeer::ID);

		$criteria->addSelectColumn(sfGuardPermissionPeer::NAME);

		$criteria->addSelectColumn(sfGuardPermissionPeer::DESCRIPTION);

		$criteria->addSelectColumn(sfGuardPermissionPeer::MODULE_NAME);

		$criteria->addSelectColumn(sfGuardPermissionPeer::ACTION_NAME);

		$criteria->addSelectColumn(sfGuardPermissionPeer::SORT_ORDER);

	}

	const COUNT = 'COUNT(sf_guard_permission.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_permission.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardPermissionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = sfGuardPermissionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfGuardPermissionPeer::populateObjects(sfGuardPermissionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfGuardPermissionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfGuardPermissionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfGuardPermissionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(sfGuardPermissionPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(sfGuardPermissionPeer::ID);
			$selectCriteria->add(sfGuardPermissionPeer::ID, $criteria->remove(sfGuardPermissionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += sfGuardPermissionPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(sfGuardPermissionPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(sfGuardPermissionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfGuardPermission) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardPermissionPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += sfGuardPermissionPeer::doOnDeleteCascade($criteria, $con);
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, Connection $con)
	{
				$affectedRows = 0;

				$objects = sfGuardPermissionPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'plugins/sfGuardPlugin/lib/model/sfGuardGroupPermission.php';

						$c = new Criteria();
			
			$c->add(sfGuardGroupPermissionPeer::PERMISSION_ID, $obj->getId());
			$affectedRows += sfGuardGroupPermissionPeer::doDelete($c, $con);

			include_once 'plugins/sfGuardPlugin/lib/model/sfGuardUserPermission.php';

						$c = new Criteria();
			
			$c->add(sfGuardUserPermissionPeer::PERMISSION_ID, $obj->getId());
			$affectedRows += sfGuardUserPermissionPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(sfGuardPermission $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardPermissionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardPermissionPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(sfGuardPermissionPeer::DATABASE_NAME, sfGuardPermissionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardPermissionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(sfGuardPermissionPeer::DATABASE_NAME);

		$criteria->add(sfGuardPermissionPeer::ID, $pk);


		$v = sfGuardPermissionPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(sfGuardPermissionPeer::ID, $pks, Criteria::IN);
			$objs = sfGuardPermissionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfGuardPermissionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardPermissionMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardPermissionMapBuilder');
}
