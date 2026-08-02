import '../../core/api/api_client.dart';
import '../models/user_model.dart';

class ProfileRepository{

  Future<UserModel?> getProfile() async{

    final response=await ApiClient.dio.get(
      '/api/profile',
    );

    if(response.data['status']==true){
      return UserModel.fromJson(
        response.data['data'],
      );
    }

    return null;
  }
}