<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

/**
 * Minecraft: PE multiplayer protocol implementation
 */
namespace pocketmine\network\protocol;


interface Info{

	public const CURRENT_PROTOCOL = self::PROTOCOL_486;

	public const ACCEPTED_PROTOCOLS = [
		self::PROTOCOL_419,
		self::PROTOCOL_422,
		self::PROTOCOL_423,
		self::PROTOCOL_428,
		self::PROTOCOL_431,
		self::PROTOCOL_440,
		self::PROTOCOL_448,
		self::PROTOCOL_465,
		self::PROTOCOL_471,
		self::PROTOCOL_475,
		self::PROTOCOL_486];

	public const PROTOCOL_419  = 419; // 1.16.100.59
	public const PROTOCOL_422  = 422; // 1.16.200.56
	public const PROTOCOL_423  = 423; // 1.16.210.50
	public const PROTOCOL_428  = 428; // 1.16.210.50
	public const PROTOCOL_431  = 431; // 1.16.220.52
	public const PROTOCOL_440  = 440; // 1.17.0
	public const PROTOCOL_448  = 448; // 1.17.10
	public const PROTOCOL_465  = 465; // 1.17.30.25
	public const PROTOCOL_471  = 471; // 1.17.40.06
	public const PROTOCOL_475  = 475; // 1.18.0.27
	public const PROTOCOL_486  = 486; // 1.18.10.28

	/**
	 * Minecraft: PE packets
	 */
	public const LOGIN_PACKET = 0x01;
	public const PLAY_STATUS_PACKET = 0x02;
	public const SERVER_TO_CLIENT_HANDSHAKE_PACKET = 0x03;
	public const CLIENT_TO_SERVER_HANDSHAKE_PACKET = 0x04;
	public const DISCONNECT_PACKET = 0x05;
	public const RESOURCE_PACKS_INFO_PACKET = 0x06;
	public const RESOURCE_PACKS_STACK_PACKET = 0x07;
	public const RESOURCE_PACKS_CLIENT_RESPONSE_PACKET = 0x08;
	public const TEXT_PACKET = 0x09;
	public const SET_TIME_PACKET = 0x0a;
	public const START_GAME_PACKET = 0x0b;
	public const ADD_PLAYER_PACKET = 0x0c;
	public const ADD_ENTITY_PACKET = 0x0d;
	public const REMOVE_ENTITY_PACKET = 0x0e;
	public const ADD_ITEM_ENTITY_PACKET = 0x0f;
	// 0x10 - doesn't exists in client
	public const TAKE_ITEM_ENTITY_PACKET = 0x11;
	public const MOVE_ENTITY_PACKET = 0x12;
	public const MOVE_PLAYER_PACKET = 0x13;
	public const RIDER_JUMP_PACKET = 0x14;
	public const UPDATE_BLOCK_PACKET = 0x15;
	public const ADD_PAINTING_PACKET = 0x16;
	public const TICK_SYNC_PACKET = 0x17;

	public const LEVEL_EVENT_PACKET = 0x19;
	public const TILE_EVENT_PACKET = 0x1a;
	public const ENTITY_EVENT_PACKET = 0x1b;
	public const MOB_EFFECT_PACKET = 0x1c;
	public const UPDATE_ATTRIBUTES_PACKET = 0x1d;
	public const INVENTORY_TRANSACTION_PACKET = 0x1e;				// NEW
	public const MOB_EQUIPMENT_PACKET = 0x1f;
	public const MOB_ARMOR_EQUIPMENT_PACKET = 0x20;
	public const INTERACT_PACKET = 0x21;
	public const BLOCK_PICK_REQUEST_PACKET = 0x22;					// NEW
	public const ENTITY_PICK_REQUEST_PACKET = 0x23;				// NEW
	public const PLAYER_ACTION_PACKET = 0x24;
	public const ENTITY_FALL_PACKET = 0x25;
	public const HURT_ARMOR_PACKET = 0x26;
	public const SET_ENTITY_DATA_PACKET = 0x27;
	public const SET_ENTITY_MOTION_PACKET = 0x28;
	public const SET_ENTITY_LINK_PACKET = 0x29;
	public const SET_HEALTH_PACKET = 0x2a;
	public const SET_SPAWN_POSITION_PACKET = 0x2b;
	public const ANIMATE_PACKET = 0x2c;
	public const RESPAWN_PACKET = 0x2d;
	public const CONTAINER_OPEN_PACKET = 0x2e;
	public const CONTAINER_CLOSE_PACKET = 0x2f;
	public const PLAYER_HOTBAR_PACKET = 0x30;						// NEW
	public const INVENTORY_CONTENT_PACKET = 0x31;					// NEW
	public const INVENTORY_SLOT_PACKET = 0x32;						// NEW
	public const CONTAINER_SET_DATA_PACKET = 0x33;
	public const CRAFTING_DATA_PACKET = 0x34;
	public const CRAFTING_EVENT_PACKET = 0x35;
	public const GUI_DATA_PICK_ITEM_PACKET = 0x36;					// NEW
	public const ADVENTURE_SETTINGS_PACKET = 0x37;
	public const TILE_ENTITY_DATA_PACKET = 0x38;
	public const PLAYER_INPUT_PACKET = 0x39;
	public const FULL_CHUNK_DATA_PACKET = 0x3a;
	public const SET_COMMANDS_ENABLED_PACKET = 0x3b;
	public const SET_DIFFICULTY_PACKET = 0x3c;
	public const CHANGE_DIMENSION_PACKET = 0x3d;
	public const SET_PLAYER_GAMETYPE_PACKET = 0x3e;
	public const PLAYER_LIST_PACKET = 0x3f;
	public const SIMPLE_EVENT_PACKET = 0x40;
	public const TELEMETRY_EVENT_PACKET = 0x41;
	public const SPAWN_EXPERIENCE_ORB_PACKET = 0x42;
	public const CLIENTBOUND_MAP_ITEM_DATA_PACKET = 0x43;
	public const MAP_INFO_REQUEST_PACKET = 0x44;
	public const REQUEST_CHUNK_RADIUS_PACKET = 0x45;
	public const CHUNK_RADIUS_UPDATE_PACKET = 0x46;
	public const ITEM_FRAME_DROP_ITEM_PACKET = 0x47;
	public const GAME_RULES_CHANGED_PACKET = 0x48;
	public const CAMERA_PACKET = 0x49;
	public const BOSS_EVENT_PACKET = 0x4a;
	public const SHOW_CREDITS_PACKET = 0x4b;
	public const AVAILABLE_COMMANDS_PACKET = 0x4c;
	public const COMMAND_REQUEST_PACKET = 0x4d;
	public const COMMAND_BLOCK_UPDATE_PACKET = 0x4e;
	public const COMMAND_OUTPUT_PACKET = 0x4f;						// NEW
	public const UPDATE_TRADE_PACKET = 0x50;
	public const UPDATE_EQUIPMENT_PACKET = 0x51;
	public const RESOURCE_PACK_DATA_INFO_PACKET = 0x52;
	public const RESOURCE_PACK_CHUNK_DATA_PACKET = 0x53;
	public const RESOURCE_PACK_CHUNK_REQUEST_PACKET = 0x54;
	public const TRANSFER_PACKET = 0x55;
	public const PLAY_SOUND_PACKET = 0x56;
	public const STOP_SOUND_PACKET = 0x57;
	public const SET_TITLE_PACKET = 0x58;
	public const ADD_BEHAVIOR_TREE_PACKET = 0x59;
	public const STRUCTURE_BLOCK_UPDATE_PACKET = 0x5a;
	public const SHOW_STORE_OFFER_PACKET = 0x5b;
	public const PURCHASE_RECEIPT_PACKET = 0x5c;
	public const PLAYER_SKIN_PACKET = 0x5d;						// NEW
	public const SUB_CLIENT_LOGIN_PACKET = 0x5e;					// NEW
	public const INITIATE_WEB_SOCKET_CONNECTION_PACKET = 0x5f;		// NEW
	public const SET_LAST_HURT_BY_PACKET = 0x60;					// NEW
	public const BOOK_EDIT_PACKET = 0x61;							// NEW
	public const NPC_REQUEST_PACKET = 0x62;						// NEW
	public const PHOTO_TRANSFER_PACKET = 0x63;						// NEW
	public const MODAL_FORM_REQUEST_PACKET = 0x64;					// NEW
	public const MODAL_FORM_RESPONSE_PACKET = 0x65;				// NEW
	public const SERVER_SETTINGS_REQUEST_PACKET = 0x66;			// NEW
	public const SERVER_SETTINGS_RESPONSE_PACKET = 0x67;			// NEW
	public const SHOW_PROFILE_PACKET = 0x68;						// NEW
	public const SET_DEFAULT_GAME_TYPE_PACKET = 0x69;				// NEW
	public const LEVEL_SOUND_EVENT_PACKET = 0x7b;
	public const PLAYER_ENCHANT_OPTIONS_PACKET = 0x92;				// NEW 406 || 407
	public const ITEM_COMPONENT_PACKET = 0xA2; 					// NEW 419
	public const CREATIVE_CONTENT_PACKET = 0x91; 					// NEW 419
}
