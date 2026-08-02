import 'package:shared_preferences/shared_preferences.dart';

class TokenStorage {

  static const String keyToken = 'panenku_token';


  static Future<void> saveToken(String token) async {

    final prefs = await SharedPreferences.getInstance();

    await prefs.setString(
      keyToken,
      token,
    );

  }



  static Future<String?> getToken() async {

    final prefs = await SharedPreferences.getInstance();

    return prefs.getString(
      keyToken,
    );

  }



  static Future<void> removeToken() async {

    final prefs = await SharedPreferences.getInstance();

    await prefs.remove(
      keyToken,
    );

  }



  static Future<bool> hasToken() async {

    final token = await getToken();

    return token != null && token.isNotEmpty;

  }


  // Tambahan untuk cek token
  static Future<void> printToken() async {

    final token = await getToken();

    print("TOKEN: $token");

  }

}