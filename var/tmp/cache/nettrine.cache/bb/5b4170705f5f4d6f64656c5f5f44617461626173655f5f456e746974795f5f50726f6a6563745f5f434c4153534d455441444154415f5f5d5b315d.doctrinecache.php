<?php return unserialize('a:2:{s:8:"lifetime";i:0;s:4:"data";O:34:"Doctrine\\ORM\\Mapping\\ClassMetadata":14:{s:19:"associationMappings";a:1:{s:14:"projectManager";a:19:{s:9:"fieldName";s:14:"projectManager";s:11:"joinColumns";a:1:{i:0;a:6:{s:4:"name";s:23:"project_manager_user_id";s:6:"unique";b:0;s:8:"nullable";b:1;s:8:"onDelete";N;s:16:"columnDefinition";N;s:20:"referencedColumnName";s:2:"id";}}s:7:"cascade";a:0:{}s:10:"inversedBy";N;s:12:"targetEntity";s:30:"App\\Model\\Database\\Entity\\User";s:5:"fetch";i:2;s:4:"type";i:2;s:8:"mappedBy";N;s:12:"isOwningSide";b:1;s:12:"sourceEntity";s:33:"App\\Model\\Database\\Entity\\Project";s:15:"isCascadeRemove";b:0;s:16:"isCascadePersist";b:0;s:16:"isCascadeRefresh";b:0;s:14:"isCascadeMerge";b:0;s:15:"isCascadeDetach";b:0;s:24:"sourceToTargetKeyColumns";a:1:{s:23:"project_manager_user_id";s:2:"id";}s:20:"joinColumnFieldNames";a:1:{s:23:"project_manager_user_id";s:23:"project_manager_user_id";}s:24:"targetToSourceKeyColumns";a:1:{s:2:"id";s:23:"project_manager_user_id";}s:13:"orphanRemoval";b:0;}}s:11:"columnNames";a:2:{s:4:"name";s:4:"name";s:2:"id";s:2:"id";}s:13:"fieldMappings";a:2:{s:4:"name";a:8:{s:9:"fieldName";s:4:"name";s:4:"type";s:6:"string";s:5:"scale";N;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";N;s:10:"columnName";s:4:"name";}s:2:"id";a:9:{s:9:"fieldName";s:2:"id";s:4:"type";s:7:"integer";s:5:"scale";N;s:6:"length";N;s:6:"unique";b:0;s:8:"nullable";b:0;s:9:"precision";N;s:2:"id";b:1;s:10:"columnName";s:2:"id";}}s:10:"fieldNames";a:2:{s:4:"name";s:4:"name";s:2:"id";s:2:"id";}s:15:"embeddedClasses";a:0:{}s:10:"identifier";a:1:{i:0;s:2:"id";}s:21:"isIdentifierComposite";b:0;s:4:"name";s:33:"App\\Model\\Database\\Entity\\Project";s:9:"namespace";s:25:"App\\Model\\Database\\Entity";s:5:"table";a:2:{s:4:"name";s:7:"project";s:6:"quoted";b:1;}s:14:"rootEntityName";s:33:"App\\Model\\Database\\Entity\\Project";s:11:"idGenerator";O:33:"Doctrine\\ORM\\Id\\IdentityGenerator":2:{s:65:"' . "\0" . 'Doctrine\\ORM\\Id\\AbstractIdGenerator' . "\0" . 'alreadyDelegatedToGenerateId";b:0;s:47:"' . "\0" . 'Doctrine\\ORM\\Id\\IdentityGenerator' . "\0" . 'sequenceName";N;}s:25:"customRepositoryClassName";s:47:"App\\Model\\Database\\Repository\\ProjectRepository";s:13:"generatorType";i:4;}}');