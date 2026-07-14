class ServerException implements Exception {
  const ServerException(this.message);
  final String message;
}

class UnauthorizedException implements Exception {
  const UnauthorizedException();
}

class NetworkException implements Exception {
  const NetworkException();
}